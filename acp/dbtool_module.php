<?php
/**
*
* @package Database Optimize & Repair Tool
* @copyright (c) 2013 Matt Friedman
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace vse\dbtool\acp;

/**
* @package acp
*/
class dbtool_module
{
	public $u_action;

	protected $db;
	protected $cache;
	protected $user;
	protected $template;
	protected $request;
	protected $config;

	public function main($id, $mode)
	{
		global $db, $cache, $user, $template, $request, $config;

		$this->db = $db;
		$this->cache = $cache;
		$this->user = $user;
		$this->template = $template;
		$this->request = $request;
		$this->config = $config;

		$this->tpl_name = 'acp_dbtool';
		$this->page_title = 'ACP_OPTIMIZE_REPAIR';

		$form_name = 'acp_dbtool';
		add_form_key($form_name);

		// Check to make sure only MySQL users can proceed
		if ($this->db->sql_layer != 'mysql4' && $this->db->sql_layer != 'mysqli')
		{
			trigger_error($this->user->lang('WARNING_MYSQL'), E_USER_WARNING);
		}

		// Get vars from the form
		$action = $this->request->variable('action', '');
		$type = $this->request->variable('type', '');
		$table_ary = $this->request->variable('mark', array(''));
		$disable_board = (!$this->config['board_disable']) ? $this->request->variable('disable_board', 0) : 0;

		if ($this->request->is_set_post('submit'))
		{
			if (!check_form_key($form_name))
			{
				trigger_error('FORM_INVALID');
			}

			if (!sizeof($table_ary))
			{
				trigger_error($this->user->lang('TABLE_ERROR') . adm_back_link($this->u_action), E_USER_WARNING);
			}

			// Make sure Safe Mode is disabled during this script execution
			if (@ini_get('safe_mode') || @strtolower(ini_get('safe_mode')) == 'on')
			{
				@ini_set('safe_mode', 'Off');
			}

			// Extend or disable script execution timeout (copied this from acp_database.php)
			@set_time_limit(1200);
			@set_time_limit(0);

			$tables = implode(', ', $table_ary);
			unset($table_ary);

			switch ($type)
			{
				case 'optimize':

					$optimize = $this->table_maintenance('OPTIMIZE TABLE', $tables, $disable_board);

					add_log('admin', 'OPTIMIZE_LOG', $tables);

					trigger_error($this->user->lang('OPTIMIZE_SUCCESS') . $optimize . adm_back_link($this->u_action));

				break;

				case 'repair':

					$repair = $this->table_maintenance('REPAIR TABLE', $tables, $disable_board);

					add_log('admin', 'REPAIR_LOG', $tables);

					trigger_error($this->user->lang('REPAIR_SUCCESS') . $repair . adm_back_link($this->u_action));

				break;

				case 'check':

					$check = $this->table_maintenance('CHECK TABLE', $tables, $disable_board);

					trigger_error($this->user->lang('CHECK_SUCCESS') . $check . adm_back_link($this->u_action));

				break;
			}
		}

		// Generate Show Table Data
		$total_data_size = $total_data_free = 0;
		$overhead = '';

		$tables = $this->db->sql_query('SHOW TABLE STATUS');

		while ($table = $this->db->sql_fetchrow($tables))
		{
			/**
			* NOTE: Only MyISAM, InnoDB and Archive storage engines can be used
			* Check    supports MyISAM, InnoDB and Archive
			* Optimize supports MyISAM, InnoDB and (as of MySQL 5.0.16) Archive
			* Repair   supports MyISAM, Archive
			*/
			$table['Engine'] = (!empty($table['Type']) ? $table['Type'] : $table['Engine']);
			if (in_array(strtolower($table['Engine']), array('myisam', 'innodb', 'archive')))
			{
				// Data_free should always be 0 for InnoDB tables
				if (strtolower($table['Engine']) == 'innodb')
				{
					$table['Data_free'] = 0;
				}

				$data_size = ($table['Data_length'] + $table['Index_length']);
				$total_data_size = $total_data_size + $data_size;
				$total_data_free = $total_data_free + $table['Data_free'];

				$this->template->assign_block_vars('tables', array(
					'TABLE_NAME'	=> $table['Name'],
					'TABLE_TYPE'	=> $table['Engine'],
					'DATA_SIZE'		=> $this->file_size($data_size),
					'DATA_FREE'		=> $this->file_size($table['Data_free']),
					'S_OVERHEAD'	=> $table['Data_free'] ? true : false,
				));
			}
		}
		$this->db->sql_freeresult($tables);

		$this->template->assign_vars(array(
			'TOTAL_DATA_SIZE' => $this->file_size($total_data_size),
			'TOTAL_DATA_FREE' => $this->file_size($total_data_free),
			'U_ACTION' => $this->u_action,
		));
	}

	/**
	* Perform table SQL query and return any messages
	*
	* @param string $query	should either be OPTIMIZE TABLE, REPAIR TABLE, or CHECK TABLE
	* @param string $tables comma delinieated string of all tables to be processed
	* @param bool $disable_board the users option to disable the board during run time
	* @return string $message any errors or status information
	* @access private
	*/
	private function table_maintenance($query, $tables, $disable_board = 0)
	{
		// Disable the board if admin selected this option
		if ($disable_board)
		{
			$this->config->set('board_disable', 1);
		}

		$message = '';
		$result = $this->db->sql_query($query . ' ' . $this->db->sql_escape($tables));
		while ($row = $this->db->sql_fetchrow($result))
		{
			// Build a message only for optimize/repair errors, or if check table is run
			if ((in_array(strtolower($row['Msg_type']), array('error', 'info', 'note', 'warning'))) || $query == 'CHECK TABLE')
			{
				$message .= '<br />' . substr($row['Table'], (strpos($row['Table'], '.') + 1)) . ' ... ' . $row['Msg_type'] . ': ' . $row['Msg_text'];
			}
		}
		$this->db->sql_freeresult($result);

		// Enable the board again if admin selected this option
		if ($disable_board)
		{
			$this->config->set('board_disable', 0);
		}

		// Clear cache to ensure board is re-enabled for all users
		$this->cache->purge();

		// Let's add an extra line break if there are messages, it looks better
		$message = !empty($message) ? '<br />' . $message : '';

		return $message;
	}

	/**
	* Display filesize in the proper units
	*
	* @param int $size number representing bytes
	* @return string $size with the correct units symbol appended
	* @access private
	*/
	private function file_size($size)
	{
		$file_size_units = array(' B', ' KB', ' MB', ' GB', ' TB', ' PB', ' EB', ' ZB', ' YB');
		return $size ? round($size / pow(1024, ($i = floor(log($size) / log(1024)))), 1) . $file_size_units[$i] : '0 B';
	}
}
