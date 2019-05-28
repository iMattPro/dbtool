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
	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\language\language */
	protected $language;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \vse\dbtool\tool\tool_interface */
	protected $db_tool;

	/** @var string */
	public $page_title;

	/** @var string */
	public $tpl_name;

	/** @var string */
	public $u_action;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		global $phpbb_container;

		try
		{
			$this->db       = $phpbb_container->get('dbal.conn');
			$this->language = $phpbb_container->get('language');
			$this->request  = $phpbb_container->get('request');
			$this->template = $phpbb_container->get('template');
			$this->db_tool  = $phpbb_container->get('vse.dbtool.tool');
		}
		catch (\Exception $e)
		{
			trigger_error($e->getMessage(), E_USER_WARNING);
		}

		$this->language->add_lang('dbtool_acp', 'vse/dbtool');
	}

	/**
	 * Main ACP module
	 *
	 * @access public
	 */
	public function main()
	{
		$this->tpl_name = 'acp_dbtool';
		$this->page_title = 'ACP_OPTIMIZE_REPAIR';

		if (!$this->db_tool->is_mysql())
		{
			trigger_error($this->language->lang('WARNING_MYSQL'), E_USER_WARNING);
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
	 * @access protected
	 */
	protected function run_tool()
	{
		$operation = strtoupper($this->request->variable('operation', ''));
		$tables = $this->request->variable('mark', ['']);
		$disable_board = $this->request->variable('disable_board', 0);

		if (confirm_box(true))
		{
			if (!count($tables))
			{
				trigger_error($this->language->lang('TABLE_ERROR') . adm_back_link($this->u_action), E_USER_WARNING);
			}

			if ($this->db_tool->is_valid_operation($operation))
			{
				$results = $this->db_tool->run($operation, $tables, $disable_board);
				$results = '<br />' . implode('<br />', $results);
				trigger_error($this->language->lang($operation . '_SUCCESS') . $results . adm_back_link($this->u_action));
			}
		}
		else
		{
			confirm_box(false, $this->language->lang('CONFIRM_OPERATION'), build_hidden_fields([
				'submit'		=> 1,
				'operation'		=> $operation,
				'mark'			=> $tables,
				'disable_board'	=> $disable_board,
			]), 'confirm_dbtool.html');
		}
	}

	/**
	 * Generate Show Table Data
	 *
	 * @access protected
	 */
	protected function display_tables()
	{
		$table_data = [];
		$total_data_size = $total_data_free = 0;

		$tables = $this->db->sql_query('SHOW TABLE STATUS');

		while ($table = $this->db->sql_fetchrow($tables))
		{
			$table['Engine'] = (!empty($table['Type']) ? $table['Type'] : $table['Engine']);
			if ($this->db_tool->is_valid_engine($table['Engine']))
			{
				// Data_free should always be 0 for InnoDB tables
				if ($this->db_tool->is_innodb($table['Engine']))
				{
					$table['Data_free'] = 0;
				}

				$data_size = $table['Data_length'] + $table['Index_length'];
				$total_data_size += $data_size;
				$total_data_free += $table['Data_free'];

				$table_data[] = [
					'TABLE_NAME'	=> $table['Name'],
					'TABLE_TYPE'	=> $table['Engine'],
					'DATA_SIZE'		=> get_formatted_filesize($data_size),
					'DATA_FREE'		=> get_formatted_filesize($table['Data_free']),
					'S_OVERHEAD'	=> (bool) $table['Data_free'],
				];
			}
		}
		$this->db->sql_freeresult($tables);

		$this->template->assign_vars([
			'TABLE_DATA'		=> $table_data,
			'TOTAL_DATA_SIZE'	=> get_formatted_filesize($total_data_size),
			'TOTAL_DATA_FREE'	=> get_formatted_filesize($total_data_free),
			'U_ACTION'			=> $this->u_action,
		]);
	}
}
