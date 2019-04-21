<?php
/**
 *
 * Database Optimize & Repair Tool
 *
 * @copyright (c) 2015 Matt Friedman
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace vse\dbtool\acp;

use phpbb\config\config;
use phpbb\language\language;
use phpbb\language\language_file_loader;
use phpbb\request\request_interface;
use phpbb\user;
use vse\dbtool\tool\tool;

require_once __DIR__ . '/../../../../includes/functions_acp.php';

class dbtool_test extends \phpbb_test_case
{
	public static $confirm = false;

	/** @var \vse\dbtool\acp\dbtool_module */
	protected $dbtool_module;

	/** @var \vse\dbtool\tool\tool */
	protected $tool;

	/** @var \phpbb\cache\driver\driver_interface|\PHPUnit_Framework_MockObject_MockObject */
	protected $cache;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\db\driver\driver_interface|\PHPUnit_Framework_MockObject_MockObject */
	protected $db;

	/** @var \phpbb\language\language */
	protected $lang;

	/** @var \phpbb\log\log_interface|\PHPUnit_Framework_MockObject_MockObject */
	protected $log;

	/** @var \phpbb\request\request|\PHPUnit_Framework_MockObject_MockObject */
	protected $request;

	/** @var \phpbb\template\template|\PHPUnit_Framework_MockObject_MockObject */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	public function setUp()
	{
		parent::setUp();

		global $phpbb_container, $phpbb_root_path, $phpEx;

		$this->cache    = $this->getMockBuilder('\phpbb\cache\driver\driver_interface')->getMock();
		$this->config   = new config(['board_disable' => 0]);
		$this->db       = $this->getMockBuilder('\phpbb\db\driver\driver_interface')->getMock();
		$this->log      = $this->getMockBuilder('\phpbb\log\log_interface')->getMock();
		$this->request  = $this->getMockBuilder('\phpbb\request\request')->getMock();
		$this->template = $this->getMockBuilder('\phpbb\template\template')->getMock();
		$this->lang     = new language(new language_file_loader($phpbb_root_path, $phpEx));
		$this->user     = new user($this->lang, '\phpbb\datetime');
		$this->tool     = new tool($this->cache, $this->config, $this->db, $this->log, $this->user);

		$phpbb_container = new \phpbb_mock_container_builder;
		$phpbb_container->set('dbal.conn', $this->db);
		$phpbb_container->set('language', $this->lang);
		$phpbb_container->set('request', $this->request);
		$phpbb_container->set('template', $this->template);
		$phpbb_container->set('vse.dbtool.tool', $this->tool);

		$this->dbtool_module = new dbtool_module();
	}

	/**
	 * Data set for test_module_display
	 */
	public function module_display_test_data()
	{
		return [
			['mysqli', true],
			['mysql4', true],
			['sqlite', false],
			['', false],
			[null, false],
		];
	}

	/**
	 * Test the main module displays table data
	 *
	 * @dataProvider module_display_test_data
	 * @param mixed $sql_layer
	 * @param bool  $valid
	 */
	public function test_module_display($sql_layer, $valid)
	{
		$this->db->expects($this->atMost(2))
			->method('get_sql_layer')
			->willReturn($sql_layer);

		if ($valid)
		{
			// Expect to display results of SHOW TABLE STATUS
			$this->setExpectedDisplayTables();
		}
		else
		{
			// Expect trigger_error() on error
			$this->setExpectedTriggerError(E_USER_WARNING, $this->lang->lang('WARNING_MYSQL'));
		}

		$this->dbtool_module->main();
		$this->assertInstanceOf('\vse\dbtool\acp\dbtool_module', $this->dbtool_module);
	}

	/**
	 * Data set for test_module_run_tool
	 */
	public function module_run_tool_test_data()
	{
		return [
			// user confirmed
			['optimize', ['foo_bar'], true],
			['OPTIMIZE', ['foo_bar', 'bar_foo'], false],
			['repair', ['foo_bar'], true],
			['REPAIR', ['foo_bar', 'bar_foo'], false],
			['check', ['foo_bar'], true],
			['CHECK', ['foo_bar', 'bar_foo'], false],
			// user did not confirm
			['optimize', ['foo_bar'], true, false],
			['OPTIMIZE', ['foo_bar', 'bar_foo'], false, false],
			// user did not mark tables
			['optimize', []],
		];
	}

	/**
	 * Test the main module runs the tool correctly
	 *
	 * @dataProvider module_run_tool_test_data
	 * @param string $operation
	 * @param array  $tables
	 * @param bool   $disable_board
	 * @param bool   $confirmed
	 */
	public function test_module_run_tool($operation, $tables, $disable_board = true, $confirmed = true)
	{
		// Set expected request variables
		$this->request->expects($this->once())
			->method('is_set_post')
			->with($this->equalTo('submit'))
			->willReturn(true);
		$this->request->expects($this->exactly(3))
			->method('variable')
			->willReturnMap([
				['operation', '', false, request_interface::REQUEST, $operation],
				['mark', [''], false, request_interface::REQUEST, $tables],
				['disable_board', 0, false, request_interface::REQUEST, $disable_board],
			]);

		// Convert table array to expected string
		$marked_tables = "'" . implode(', ', $tables) . "'";

		// Set expected db
		$this->db->expects($this->atMost(2))
			->method('get_sql_layer')
			->willReturn('mysqli');
		$this->db->expects($this->atMost(1))
			->method('sql_escape')
			->willReturn($marked_tables);

		if (self::$confirm = ($confirmed === true))
		{
			if (empty($tables) || $marked_tables === '')
			{
				// Expect a trigger_error if no tables were marked
				$this->setExpectedTriggerError(E_USER_WARNING, $this->lang->lang('TABLE_ERROR'));
			}
			else
			{
				// Check that the expected sql query is made
				$this->setExpectedOperationResponse($operation, $marked_tables);

				// Expect a trigger_error at completion of task
				$this->setExpectedTriggerError(E_USER_NOTICE, $this->lang->lang(strtoupper($operation) . '_SUCCESS'));
			}
		}
		else
		{
			// Expect displaying all tables if not confirmed
			$this->setExpectedDisplayTables();
		}

		$this->dbtool_module->main();
		$this->assertInstanceOf('\vse\dbtool\acp\dbtool_module', $this->dbtool_module);
	}

	/**
	 * Data set for test_is_innodb
	 */
	public function is_innodb_data()
	{
		return [
			['INNODB', true],
			['InnoDB', true],
			['innodb', true],
			['myisam', false],
			['archive', false],
			['foobar', false],
			['', false],
			[null, false],
		];
	}

	/**
	 * Test the is_innodb method
	 *
	 * @dataProvider is_innodb_data
	 * @param mixed $engine
	 * @param bool  $expected
	 */
	public function test_is_innodb($engine, $expected)
	{
		$this->assertEquals($expected, $this->tool->is_innodb($engine));
	}

	/**
	 * Data set for test_is_valid_engine
	 */
	public function is_valid_engine_data()
	{
		return [
			['INNODB', true],
			['InnoDB', true],
			['innodb', true],
			['MYISAM', true],
			['MyISAM', true],
			['myisam', true],
			['ARCHIVE', true],
			['Archive', true],
			['archive', true],
			['foobar', false],
			['', false],
			[null, false],
		];
	}

	/**
	 * Test the is_valid_engine method
	 *
	 * @dataProvider is_valid_engine_data
	 * @param mixed $engine
	 * @param bool  $expected
	 */
	public function test_is_valid_engine($engine, $expected)
	{
		$this->assertEquals($expected, $this->tool->is_valid_engine($engine));
	}

	/**
	 * Data set for test_is_valid_operation
	 */
	public function is_valid_operation_data()
	{
		return [
			['OPTIMIZE', true],
			['optimize', false],
			['REPAIR', true],
			['repair', false],
			['CHECK', true],
			['check', false],
			['foobar', false],
			['', false],
			[null, false],
		];
	}

	/**
	 * Test the is_valid_operation method
	 *
	 * @dataProvider is_valid_operation_data
	 * @param mixed $operation
	 * @param bool   $expected
	 */
	public function test_is_valid_operation($operation, $expected)
	{
		$this->assertEquals($expected, $this->tool->is_valid_operation($operation));
	}

	/**
	 * Data set for test_file_size
	 */
	public function file_size_data()
	{
		return [
			[0, '0 B'],
			[1, '1 B'],
			[111, '111 B'],
			[1024, '1 KB'],
			[1048576, '1 MB'],
			[1073741824, '1 GB'],
			[1099511627776, '1 TB'],
			[1125899906842624, '1 PB'],
			[1152921504606846976, '1 EB'],
			['foobar', '0 B'],
			['', '0 B'],
			[null, '0 B'],
		];
	}

	/**
	 * Test the file_size method
	 *
	 * @dataProvider file_size_data
	 * @param mixed  $value
	 * @param string $expected
	 */
	public function test_file_size($value, $expected)
	{
		$this->assertEquals($expected, $this->dbtool_module->file_size($value));
	}

	/**
	 * Data set for test_disable_board
	 */
	public function disable_board_data()
	{
		return [
			[true, false, true, false], // this tests toggling disabled state when users wants it
			[true, true, true, true], // this tests that board should always remain disabled
			[false, true, true, true], // this tests that board should always remain disabled
			[false, false, false, false], // this tests that board should always remain enabled
		];
	}

	/**
	 * Test the disable_board method
	 *
	 * @dataProvider disable_board_data
	 * @param bool $disable_board
	 * @param bool $current_state
	 * @param bool $expected_state1
	 * @param bool $expected_state2
	 */
	public function test_disable_board($disable_board, $current_state, $expected_state1, $expected_state2)
	{
		$this->config->set('board_disable', $current_state);

		// Pass 1, based on current state
		$state = $this->tool->disable_board($disable_board, $current_state);
		$this->assertEquals($expected_state1, $this->config['board_disable']);

		// Pass 2, based on state resulting from pass 1
		$this->tool->disable_board($disable_board, $state);
		$this->assertEquals($expected_state2, $this->config['board_disable']);
	}

	/**
	 * Assertions when calling SHOW TABLE STATUS and displaying the result
	 */
	protected function setExpectedDisplayTables()
	{
		$db = $this->db;
		$this->db->expects($this->once())
			->method('sql_query')
			->with($this->equalTo('SHOW TABLE STATUS'))
			->willReturn('result');
		$this->db->expects($this->exactly(2))
			->method('sql_fetchrow')
			->with($this->equalTo('result'))
			->willReturnCallback( // prevents infinite while looping
				static function () use ($db) {
					if (isset($db->imported))
					{
						return false;
					}
					$db->imported = true;
					return [
						'Name'         => 'phpbb_zebra',
						'Engine'       => 'InnoDB',
						'Data_length'  => '0',
						'Index_length' => '0',
						'Data_free'    => '0',
					];
				}
			)
		;

		$this->template->expects($this->once())
			->method('assign_vars')
			->with([
				'TABLE_DATA'		=> [0 => [
					'TABLE_NAME'	=> 'phpbb_zebra',
					'TABLE_TYPE'	=> 'InnoDB',
					'DATA_SIZE'		=> '0 B',
					'DATA_FREE'		=> '0 B',
					'S_OVERHEAD'	=> false,
				]],
				'TOTAL_DATA_SIZE'	=> '0 B',
				'TOTAL_DATA_FREE'	=> '0 B',
				'U_ACTION'			=> null,
			])
		;
	}

	/**
	 * Assertions when running the optimize, check and repair operations
	 *
	 * @param string $operation
	 * @param string $tables
	 */
	protected function setExpectedOperationResponse($operation, $tables)
	{
		$db = $this->db;
		$this->db->expects($this->once())
			->method('sql_query')
			->with($this->equalTo(strtoupper($operation) . ' TABLE ' . $tables))
			->willReturn('operation');
		$this->db->expects($this->exactly(2))
			->method('sql_fetchrow')
			->with($this->equalTo('operation'))
			->willReturnCallback( // prevents infinite while looping
				static function () use ($db) {
					if (isset($db->imported))
					{
						return false;
					}
					$db->imported = true;
					return [
						'Table'    => 'db.phpbb_zebra',
						'Msg_type' => 'info',
						'Msg_text' => 'foo',
					];
				}
			)
		;
	}
}

function confirm_box()
{
	return dbtool_test::$confirm;
}
