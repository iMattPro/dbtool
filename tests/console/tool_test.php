<?php
/**
 *
 * Database Optimize & Repair Tool
 *
 * @copyright (c) 2026 Matt Friedman
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace vse\dbtool\tests\console;

use phpbb\language\language;
use phpbb\language\language_file_loader;
use phpbb\user;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use vse\dbtool\console\command\db\tool;

class tool_test extends \phpbb_test_case
{
	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\db\tools\tools_interface */
	protected $db_tools;

	/** @var \PHPUnit\Framework\MockObject\MockObject|\vse\dbtool\tool\tool_interface */
	protected $db_tool;

	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\lock\db */
	protected $db_lock;

	/** @var language */
	protected $language;

	/** @var user */
	protected $user;

	protected function setUp(): void
	{
		parent::setUp();

		global $phpbb_root_path, $phpEx;

		$lang_loader = new language_file_loader($phpbb_root_path, $phpEx);
		$lang_loader->set_extension_manager(new \phpbb_mock_extension_manager($phpbb_root_path));
		$this->language = new language($lang_loader);

		$this->user     = new user($this->language, '\phpbb\datetime');
		$this->db       = $this->createMock('\phpbb\db\driver\driver_interface');
		$this->db_tools = $this->createMock('\phpbb\db\tools\tools_interface');
		$this->db_tool  = $this->createMock('\vse\dbtool\tool\tool_interface');
		$this->db_lock  = $this->createMock('\phpbb\lock\db');
	}

	protected function get_command_tester(): CommandTester
	{
		$application = new Application();
		$application->add(new tool(
			$this->user,
			$this->db,
			$this->db_tools,
			$this->db_tool,
			$this->db_lock,
			$this->language
		));

		$command = $application->find('db:tool');
		return new CommandTester($command);
	}

	public function test_not_mysql()
	{
		$this->db_tool->method('is_mysql')->willReturn(false);

		$command_tester = $this->get_command_tester();
		$exit_code = $command_tester->execute(['command' => 'db:tool']);

		$this->assertStringContainsString($this->language->lang('WARNING_MYSQL'), $command_tester->getDisplay());
		$this->assertSame(1, $exit_code);
	}

	public function test_user_declines()
	{
		$this->db_tool->method('is_mysql')->willReturn(true);

		$command_tester = $this->get_command_tester();
		$command_tester->setInputs(['no']);
		$exit_code = $command_tester->execute(['command' => 'db:tool']);

		$this->assertSame(0, $exit_code);
	}

	/**
	 * Data for test_run_operation
	 * Choice indices match [0 => OPTIMIZE, 1 => REPAIR, 2 => CHECK]
	 */
	public function run_operation_data()
	{
		return [
			['CHECK', '2', false],
			['OPTIMIZE', '0', false],
			['REPAIR', '1', false],
			['CHECK', '2', true],
		];
	}

	/**
	 * @dataProvider run_operation_data
	 */
	public function test_run_operation(string $operation, string $choice, bool $disable_board)
	{
		$tables = ['phpbb_users', 'phpbb_posts'];

		$this->db_tool->method('is_mysql')->willReturn(true);
		$this->db_tool->method('is_valid_operation')->willReturn(true);
		$this->db_tool->method('run')->willReturn(['phpbb_users ... OK', 'phpbb_posts ... OK']);
		$this->db_tools->method('sql_list_tables')->willReturn($tables);
		$this->db_lock->method('acquire')->willReturn(true);

		$command_tester = $this->get_command_tester();
		$command_tester->setInputs(['yes', $choice]);

		$options = ['command' => 'db:tool'];
		if ($disable_board)
		{
			$options['--disable-board'] = true;
		}

		$exit_code = $command_tester->execute($options);
		$display = $command_tester->getDisplay();
		$success_lang = preg_replace('/<br(?:\s+)?\/?>/i', "\n", $this->language->lang($operation . '_SUCCESS'));
		$expected = explode("\n", $success_lang)[0];

		$this->assertSame(0, $exit_code);
		$this->assertStringContainsString($expected, $display);
	}

	public function test_run_operation_with_table_argument()
	{
		$this->db_tool->method('is_mysql')->willReturn(true);
		$this->db_tool->method('is_valid_operation')->willReturn(true);
		$this->db_tool->method('run')->willReturn(['phpbb_users ... OK']);
		$this->db_tools->expects(self::never())->method('sql_list_tables');
		$this->db_lock->method('acquire')->willReturn(true);

		$command_tester = $this->get_command_tester();
		$command_tester->setInputs(['yes', '2']);
		$exit_code = $command_tester->execute(['command' => 'db:tool', 'table' => 'phpbb_users']);

		$this->assertSame(0, $exit_code);
	}

	public function test_lock_acquire_fails()
	{
		$this->db_tool->method('is_mysql')->willReturn(true);
		$this->db_tool->method('is_valid_operation')->willReturn(true);
		$this->db_tools->method('sql_list_tables')->willReturn(['phpbb_users']);
		$this->db_lock->method('acquire')->willReturn(false);

		$command_tester = $this->get_command_tester();
		$command_tester->setInputs(['yes', '2']);
		$exit_code = $command_tester->execute(['command' => 'db:tool']);

		$expected = substr($this->language->lang('CLI_DBTOOL_LOCK_ERROR'), 0, 40);
		$this->assertStringContainsString($expected, $command_tester->getDisplay());
		$this->assertSame(1, $exit_code);
	}

	public function test_invalid_operation_skips_run()
	{
		$this->db_tool->method('is_mysql')->willReturn(true);
		$this->db_tool->method('is_valid_operation')->willReturn(false);
		$this->db_tools->method('sql_list_tables')->willReturn(['phpbb_users']);
		$this->db_tool->expects(self::never())->method('run');

		$command_tester = $this->get_command_tester();
		$command_tester->setInputs(['yes', '2']);
		$exit_code = $command_tester->execute(['command' => 'db:tool']);

		$this->assertSame(0, $exit_code);
	}
}
