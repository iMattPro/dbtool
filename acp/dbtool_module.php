<?php
/**
*
* Database Optimize & Repair Tool
*
* @copyright (c) 2013 Matt Friedman
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace vse\dbtool\acp;

/**
* @package acp
*/
class dbtool_module
{
	/** @var \phpbb\cache\driver\driver_interface */
	protected $cache;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\log\log */
	protected $log;

	/** @var \phpbb\php\ini */
	protected $php_ini;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var string */
	public $u_action;

	/**
	* Constructor
	*/
	public function __construct()
	{
		global $cache, $config, $db, $phpbb_log, $request, $template, $user;

		$this->cache = $cache;
		$this->config = $config;
		$this->db = $db;
		$this->log = $phpbb_log;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
		$this->php_ini = new \phpbb\php\ini();

		$this->user->add_lang_ext('vse/dbtool', 'dbtool_acp');
	}

	/**
	* Main ACP module
	*
	* @param int    $id
	* @param string $mode
	* @access public
	*/
	public function main($id, $mode)
	{
		$this->tpl_name = 'acp_dbtool';
		$this->page_title = 'ACP_OPTIMIZE_REPAIR';

		if (!$this->is_mysql())
		{
			trigger_error($this->user->lang('WARNING_MYSQL'), E_USER_WARNING);
		}

		if ($this->request->is_set_post('submit'))
		{
			$this->run_tool();
		}

		$this->display_tables();
	}

	/**
	* Run database tool
	*
	* @return null
	* @access protected
	*/
	protected function run_tool()
	{
		$operation = $this->request->variable('operation', '');
		$marked = $this->request->variable('mark', array(''));
		$disable_board = (!$this->config['board_disable']) ? $this->request->variable('disable_board', 0) : 0;

		if (confirm_box(true))
		{
			if (!sizeof($marked))
			{
				trigger_error($this->user->lang('TABLE_ERROR') . adm_back_link($this->u_action), E_USER_WARNING);
			}

			$operation = strtoupper($operation);
			$tables = implode(', ', $marked);

			if ($this->is_valid_operation($operation))
			{
				$result = $this->process($operation, $tables, $disable_board);
				trigger_error($this->user->lang($operation . '_SUCCESS') . $result . adm_back_link($this->u_action));
			}
		}
		else
		{
			confirm_box(false, $this->user->lang('CONFIRM_OPERATION'), build_hidden_fields(array(
				'submit'		=> 1,
				'operation'		=> $operation,
				'mark'			=> $marked,
				'disable_board'	=> $disable_board,
			)));
		}
	}

	/**
	* Perform table SQL query and return any messages
	*
	* @param string $operation     OPTIMIZE, REPAIR, or CHECK
	* @param string $tables        Comma delineated string of all tables to be processed
	* @param int    $disable_board The user's option to disable the board during run time
	* @return string Any errors or status information
	* @access protected
	*/
	protected function process($operation, $tables, $disable_board = 0)
	{
		$this->extend_execution_limits();

		$this->disable_board($disable_board, true);

		$message = '<br />';
		$result = $this->db->sql_query($operation . ' TABLE ' . $this->db->sql_escape($tables));
		while ($row = $this->db->sql_fetchrow($result))
		{
			// Build a message only for optimize/repair errors, or if check table is run
			if ((in_array(strtolower($row['Msg_type']), array('error', 'info', 'note', 'warning'))) || $operation == 'CHECK')
			{
				$message .= '<br />' . substr($row['Table'], (strpos($row['Table'], '.') + 1)) . ' ... ' . $row['Msg_type'] . ': ' . $row['Msg_text'];
			}
		}
		$this->db->sql_freeresult($result);

		$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, $operation . '_LOG', time(), array($tables));

		$this->disable_board($disable_board, false);

		// Clear cache to ensure board is re-enabled for all users
		$this->cache->purge();

		return $message;
	}

	/**
	* Generate Show Table Data
	*
	* @return null
	* @access protected
	*/
	protected function display_tables()
	{
		$table_data = array();
		$total_data_size = $total_data_free = 0;

		$tables = $this->db->sql_query('SHOW TABLE STATUS');

		while ($table = $this->db->sql_fetchrow($tables))
		{
			$table['Engine'] = (!empty($table['Type']) ? $table['Type'] : $table['Engine']);
			if ($this->is_valid_engine($table['Engine']))
			{
				// Data_free should always be 0 for InnoDB tables
				if ($this->is_innodb($table['Engine']))
				{
					$table['Data_free'] = 0;
				}

				$data_size = $table['Data_length'] + $table['Index_length'];
				$total_data_size = $total_data_size + $data_size;
				$total_data_free = $total_data_free + $table['Data_free'];

				$table_data[] = array(
					'TABLE_NAME'	=> $table['Name'],
					'TABLE_TYPE'	=> $table['Engine'],
					'DATA_SIZE'		=> $this->file_size($data_size),
					'DATA_FREE'		=> $this->file_size($table['Data_free']),
					'S_OVERHEAD'	=> (bool) $table['Data_free'],
				);
			}
		}
		$this->db->sql_freeresult($tables);

		$this->template->assign_vars(array(
			'TABLE_DATA'		=> $table_data,
			'TOTAL_DATA_SIZE'	=> $this->file_size($total_data_size),
			'TOTAL_DATA_FREE'	=> $this->file_size($total_data_free),
			'U_ACTION'			=> $this->u_action,
		));
	}

	/**
	* Is the database using MySQL
	*
	* @return bool True if MySQL, false otherwise
	* @access protected
	*/
	protected function is_mysql()
	{
		return $this->db->get_sql_layer() == 'mysql4' || $this->db->get_sql_layer() == 'mysqli';
	}

	/**
	* Is requested operation to optimize, repair or check tables
	*
	* @param string $operation The name of the operation
	* @return bool True if valid operation, false otherwise
	* @access public
	*/
	public function is_valid_operation($operation)
	{
		return in_array($operation, array('OPTIMIZE', 'REPAIR', 'CHECK'));
	}

	/**
	* Only allow tables using MyISAM, InnoDB or Archive storage engines
	*
	* @param string $engine The name of the engine
	* @return bool True if valid engine, false otherwise
	* @access public
	*/
	public function is_valid_engine($engine)
	{
		return in_array(strtolower($engine), array('myisam', 'innodb', 'archive'));
	}

	/**
	* Is the storage engine InnoDB
	*
	* @param string $engine The name of the engine
	* @return bool True if InnoDB engine, false otherwise
	* @access public
	*/
	public function is_innodb($engine)
	{
		return strtolower($engine) == 'innodb';
	}

	/**
	* Set disable board config state
	*
	* @param int  $disable The users option to disable the board during run time
	* @param bool $switch  True to disable board, false to enable board
	* @return null
	* @access public
	*/
	public function disable_board($disable, $switch = true)
	{
		if ($disable)
		{
			$this->config->set('board_disable', (int) $switch);
		}
	}

	/**
	* Display file size in the proper units
	*
	* @param int $size Number representing bytes
	* @return string $size with the correct units symbol appended
	* @access public
	*/
	public function file_size($size)
	{
		$file_size_units = array(' B', ' KB', ' MB', ' GB', ' TB', ' PB', ' EB', ' ZB', ' YB');
		return (intval($size)) ? round($size / pow(1024, ($i = floor(log($size) / log(1024)))), 1) . $file_size_units[(int) $i] : '0 B';
	}

	/**
	* Extend execution limits to mitigate timeouts
	*
	* @return null
	* @access protected
	*/
	protected function extend_execution_limits()
	{
		// Disable safe mode to allow set_time_limit to work
		if ($this->php_ini->get_bool('safe_mode'))
		{
			@ini_set('safe_mode', 'Off');
		}

		// Extend or disable script execution timeout (copied from acp_database.php)
		@set_time_limit(1200);
		@set_time_limit(0);
	}
}
