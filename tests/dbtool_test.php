<?php
/**
*
* Database Optimize & Repair Tool
*
* @copyright (c) 2015 Matt Friedman
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace vse\dbtool\tests;

require_once dirname(__FILE__) . '/../../../../includes/functions.php';

class dbtool_test extends \phpbb_test_case
{
	/** @var \vse\dbtool\acp\dbtool_module */
	protected $dbtool;

	/** @var \phpbb\config\config */
	protected $config;

	/**
	* Setup test environment
	*
	* @access public
	*/
	public function setUp()
	{
		parent::setUp();

		global $config, $user, $phpbb_extension_manager, $phpbb_root_path;

		$config = $this->config = new \phpbb\config\config(array('board_disable' => 0));

		// Must mock extension manager for the user class
		$phpbb_extension_manager = new \phpbb_mock_extension_manager($phpbb_root_path);

		$user = new \phpbb\user(array('\phpbb\datetime'));

		$this->dbtool = new \vse\dbtool\acp\dbtool_module();
	}

	/**
	* Data set for test_is_innodb
	*
	* @return array Array of test data
	* @access public
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
	* @access public
	*/
	public function test_is_innodb($engine, $expected)
	{
		$this->assertEquals($expected, $this->dbtool->is_innodb($engine));
	}

	/**
	 * Data set for test_is_valid_engine
	 *
	 * @return array Array of test data
	 * @access public
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
	 * @access public
	 */
	public function test_is_valid_engine($engine, $expected)
	{
		$this->assertEquals($expected, $this->dbtool->is_valid_engine($engine));
	}

	/**
	 * Data set for test_is_valid_operation
	 *
	 * @return array Array of test data
	 * @access public
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
	 * @access public
	 */
	public function test_is_valid_operation($operation, $expected)
	{
		$this->assertEquals($expected, $this->dbtool->is_valid_operation($operation));
	}

	/**
	 * Data set for test_file_size
	 *
	 * @return array Array of test data
	 * @access public
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
	 * @access public
	 */
	public function test_file_size($value, $expected)
	{
		$this->assertEquals($expected, $this->dbtool->file_size($value));
	}

	/**
	 * Data set for test_disable_board
	 *
	 * @return array Array of test data
	 * @access public
	 */
	public function disable_board_data()
	{
		return array(
			array(true, true, false, true),
			array(true, false, false, false),
			array(true, true, true, true),
			array(true, false, true, false),
			array(false, true, false, false),
			array(false, false, false, false),
			array(false, true, true, true),
			array(false, false, true, true),
		);
	}

	/**
	 * Test the disable_board method
	 *
	 * @dataProvider disable_board_data
	 * @access public
	 */
	public function test_disable_board($disable_board, $switch, $current_state, $expected_state)
	{
		$this->config->set('board_disable', $current_state);

		$this->dbtool->disable_board($disable_board, $switch);

		$this->assertEquals($expected_state, $this->config['board_disable']);
	}
}
