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

require_once __DIR__ . '/../../../../includes/functions.php';
require_once __DIR__ . '/../../../../includes/functions_acp.php';

class dbtool_test extends \phpbb_test_case
{
	public static $confirm = false;

	/** @var \vse\dbtool\acp\dbtool_module */
	protected $dbtool;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\db\driver\driver_interface|\PHPUnit_Framework_MockObject_MockObject */
	protected $db;

	/** @var \phpbb\request\request|\PHPUnit_Framework_MockObject_MockObject */
	protected $request;

	/** @var \phpbb\template\template|\PHPUnit_Framework_MockObject_MockObject */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	public function setUp()
	{
		parent::setUp();

		global $cache, $config, $db, $phpbb_log, $request, $template, $user, $phpbb_extension_manager, $phpbb_root_path;

		// Must mock extension manager for the user class
		$phpbb_extension_manager = new \phpbb_mock_extension_manager($phpbb_root_path);

		$cache     = $this->getMock('\phpbb\cache\driver\driver_interface');
		$config    = new \phpbb\config\config(array('board_disable' => 0));
		$db        = $this->getMock('\phpbb\db\driver\driver_interface');
		$phpbb_log = $this->getMock('\phpbb\log\log_interface');
		$request   = $this->getMock('\phpbb\request\request');
		$template  = $this->getMock('\phpbb\template\template');
		$user      = new \phpbb\user(array('\phpbb\datetime'));

		$this->config   = $config;
		$this->db       = $db;
		$this->request  = $request;
		$this->template = $template;
		$this->user     = $user;

		$this->dbtool = new \vse\dbtool\acp\dbtool_module();
	}

	/**
	 * Data set for test_main_display
	 */
	public function main_display_test_data()
	{
		return array(
			array('mysqli', true),
			array('mysql4', true),
			array('sqlite', false),
			array('', false),
			array(null, false),
		);
	}

	/**
	 * Test the main module displays table data
	 *
	 * @dataProvider main_display_test_data
	 */
	public function test_main_display($sql_layer, $valid)
	{
		$this->db->expects($this->any())
			->method('get_sql_layer')
			->will($this->returnValue($sql_layer));

		if ($valid)
		{
			// Expect to display results of SHOW TABLE STATUS
			$this->setExpectedDisplayTables();
		}
		else
		{
			// Expect trigger_error() on error
			$this->setExpectedTriggerError(E_USER_WARNING, $this->user->lang('WARNING_MYSQL'));
		}

		$this->dbtool->main();
		$this->assertInstanceOf('\vse\dbtool\acp\dbtool_module', $this->dbtool);
	}

	/**
	 * Data set for test_main_run_tool
	 */
	public function main_run_tool_test_data()
	{
		return array(
			// user confirmed
			array('optimize', array('foo_bar'), true),
			array('OPTIMIZE', array('foo_bar', 'bar_foo'), false),
			array('repair', array('foo_bar'), true),
			array('REPAIR', array('foo_bar', 'bar_foo'), false),
			array('check', array('foo_bar'), true),
			array('CHECK', array('foo_bar', 'bar_foo'), false),
			// user did not confirm
			array('optimize', array('foo_bar'), true, false),
			array('OPTIMIZE', array('foo_bar', 'bar_foo'), false, false),
			// user did not mark tables
			array('optimize', array()),
		);
	}

	/**
	 * Test the main module runs the tool correctly
	 *
	 * @dataProvider main_run_tool_test_data
	 */
	public function test_main_run_tool($operation, $tables, $disable_board = true, $confirmed = true)
	{
		// Set expected request variables
		$this->request->expects($this->any())
			->method('is_set_post')
			->with($this->equalTo('submit'))
			->will($this->returnValue(true));
		$this->request->expects($this->any())
			->method('variable')
			->will($this->returnValueMap(array(
				array('operation', '', false, \phpbb\request\request_interface::REQUEST, $operation),
				array('mark', array(''), false, \phpbb\request\request_interface::REQUEST, $tables),
				array('disable_board', 0, false, \phpbb\request\request_interface::REQUEST, $disable_board),
			)));

		// Convert table array to expected string
		$marked_tables = "'" . implode(', ', $tables) . "'";

		// Set expected db
		$this->db->expects($this->any())
			->method('get_sql_layer')
			->will($this->returnValue('mysqli'));
		$this->db->expects($this->any())
			->method('sql_escape')
			->will($this->returnValue($marked_tables));

		if (self::$confirm = $confirmed === true)
		{
			if (empty($tables) || $marked_tables == '')
			{
				// Expect a trigger_error if no tables were marked
				$this->setExpectedTriggerError(E_USER_WARNING, $this->user->lang('TABLE_ERROR'));
			}
			else
			{
				// Check that the expected sql query is made
				$this->db->expects($this->once())
					->method('sql_query')
					->with($this->equalTo(strtoupper($operation) . ' TABLE ' . $marked_tables));

				// Expect a trigger_error at completion of task
				$this->setExpectedTriggerError(E_USER_NOTICE);
			}
		}
		else
		{
			// Expect displaying all tables if not confirmed
			$this->setExpectedDisplayTables();
		}

		$this->dbtool->main();
		$this->assertInstanceOf('\vse\dbtool\acp\dbtool_module', $this->dbtool);
	}

	/**
	* Data set for test_is_innodb
	*/
	public function is_innodb_data()
	{
		return array(
			array('INNODB', true),
			array('InnoDB', true),
			array('innodb', true),
			array('myisam', false),
			array('archive', false),
			array('foobar', false),
			array('', false),
			array(null, false),
		);
	}

	/**
	* Test the is_innodb method
	*
	* @dataProvider is_innodb_data
	*/
	public function test_is_innodb($engine, $expected)
	{
		$this->assertEquals($expected, $this->dbtool->is_innodb($engine));
	}

	/**
	 * Data set for test_is_valid_engine
	 */
	public function is_valid_engine_data()
	{
		return array(
			array('INNODB', true),
			array('InnoDB', true),
			array('innodb', true),
			array('MYISAM', true),
			array('MyISAM', true),
			array('myisam', true),
			array('ARCHIVE', true),
			array('Archive', true),
			array('archive', true),
			array('foobar', false),
			array('', false),
			array(null, false),
		);
	}

	/**
	 * Test the is_valid_engine method
	 *
	 * @dataProvider is_valid_engine_data
	 */
	public function test_is_valid_engine($engine, $expected)
	{
		$this->assertEquals($expected, $this->dbtool->is_valid_engine($engine));
	}

	/**
	 * Data set for test_is_valid_operation
	 */
	public function is_valid_operation_data()
	{
		return array(
			array('OPTIMIZE', true),
			array('optimize', false),
			array('REPAIR', true),
			array('repair', false),
			array('CHECK', true),
			array('check', false),
			array('foobar', false),
			array('', false),
			array(null, false),
		);
	}

	/**
	 * Test the is_valid_operation method
	 *
	 * @dataProvider is_valid_operation_data
	 */
	public function test_is_valid_operation($operation, $expected)
	{
		$this->assertEquals($expected, $this->dbtool->is_valid_operation($operation));
	}

	/**
	 * Data set for test_file_size
	 */
	public function file_size_data()
	{
		return array(
			array(0, '0 B'),
			array(1, '1 B'),
			array(111, '111 B'),
			array(1024, '1 KB'),
			array(1048576, '1 MB'),
			array(1073741824, '1 GB'),
			array(1099511627776, '1 TB'),
			array(1125899906842624, '1 PB'),
			array(1152921504606846976, '1 EB'),
			array('foobar', '0 B'),
			array('', '0 B'),
			array(null, '0 B'),
		);
	}

	/**
	 * Test the file_size method
	 *
	 * @dataProvider file_size_data
	 */
	public function test_file_size($value, $expected)
	{
		$this->assertEquals($expected, $this->dbtool->file_size($value));
	}

	/**
	 * Data set for test_disable_board
	 */
	public function disable_board_data()
	{
		return array(
			array(true, false, true, false), // this tests toggling disabled state when users wants it
			array(true, true, true, true), // this tests that board should always remain disabled
			array(false, true, true, true), // this tests that board should always remain disabled
			array(false, false, false, false), // this tests that board should always remain enabled
		);
	}

	/**
	 * Test the disable_board method
	 *
	 * @dataProvider disable_board_data
	 */
	public function test_disable_board($disable_board, $current_state, $expected_state1, $expected_state2)
	{
		$this->config->set('board_disable', $current_state);

		// Pass 1, based on current state
		$state = $this->dbtool->disable_board($disable_board, $current_state);
		$this->assertEquals($expected_state1, $this->config['board_disable']);

		// Pass 2, based on state resulting from pass 1
		$this->dbtool->disable_board($disable_board, $state);
		$this->assertEquals($expected_state2, $this->config['board_disable']);
	}

	protected function setExpectedDisplayTables()
	{
		// Expect to call SHOW TABLE STATUS
		$this->db->expects($this->once())
			->method('sql_query')
			->with($this->equalTo('SHOW TABLE STATUS'))
			->will($this->returnValue(true));

		// Expect to output data to the template
		$this->template->expects($this->once())
			->method('assign_vars');
	}
}

function confirm_box()
{
	return \vse\dbtool\acp\dbtool_test::$confirm;
}
