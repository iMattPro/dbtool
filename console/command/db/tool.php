<?php
/**
 *
 * Database Optimize & Repair Tool
 *
 * @copyright (c) 2013, 2019 Matt Friedman
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace vse\dbtool\console\command\db;

use phpbb\console\command\command;
use phpbb\db\driver\driver_interface as db;
use phpbb\db\tools\tools_interface as phpbb_db_tools;
use phpbb\language\language;
use phpbb\lock\db as db_lock;
use phpbb\user;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use vse\dbtool\ext;
use vse\dbtool\tool\tool_interface as db_tool;

class tool extends command
{
	/** @var InputInterface */
	protected $input;

	/** @var OutputInterface */
	protected $output;

	/** @var db */
	protected $db;

	/** @var phpbb_db_tools */
	protected $phpbb_db_tools;

	/** @var db_tool */
	protected $db_tool;

	/** @var db_lock */
	protected $db_lock;

	/** @var language */
	protected $language;

	/**
	 * Constructor
	 *
	 * @param \phpbb\user                       $user
	 * @param \phpbb\db\driver\driver_interface $db
	 * @param \phpbb\db\tools\tools_interface   $phpbb_db_tools
	 * @param \vse\dbtool\tool\tool_interface   $db_tool
	 * @param \phpbb\lock\db                    $db_lock
	 * @param \phpbb\language\language          $language
	 */
	public function __construct(user $user, db $db, phpbb_db_tools $phpbb_db_tools, db_tool $db_tool, db_lock $db_lock, language $language)
	{
		$this->db = $db;
		$this->phpbb_db_tools = $phpbb_db_tools;
		$this->db_tool = $db_tool;
		$this->db_lock = $db_lock;
		$this->language = $language;

		$this->language->add_lang('dbtool_acp', 'vse/dbtool');
		parent::__construct($user);
	}

	/**
	 * {@inheritdoc}
	 */
	protected function configure()
	{
		$this
			->setName('db:tool')
			->setDescription($this->language->lang('CLI_DBTOOL_EXPLAIN'))
			->addArgument(
				'table',
				InputArgument::OPTIONAL,
				$this->language->lang('CLI_DBTOOL_ARG_TABLE')
			)
			->addOption(
				'disable-board',
				'D',
				InputOption::VALUE_NONE,
				$this->language->lang('DISABLE_BOARD_EXPLAIN')
			)
		;
	}

	/**
	 * Execute the DB Tool command
	 *
	 * @param InputInterface  $input  An InputInterface instance
	 * @param OutputInterface $output An OutputInterface instance
	 *
	 * @return int 0 if all is well, 1 if any errors occurred
	 */
	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$io = new SymfonyStyle($input, $output);

		if (!$this->db_tool->is_mysql())
		{
			$io->error($this->language->lang('WARNING_MYSQL'));
			return 1;
		}

		$io->note($this->br2nl($this->language->lang('WARNING_EXPLAIN')));

		if ($io->confirm($this->language->lang('CLI_DBTOOL_CONTINUE')))
		{
			$operation = $io->choice($this->language->lang('CLI_DBTOOL_OPERATION'), [ext::OPTIMIZE, ext::REPAIR, ext::CHECK], ext::CHECK);
			$disable_board = (int) $input->getOption('disable-board');
			$table = $input->getArgument('table');
			$tables = ($table !== null) ? [$table] : $this->phpbb_db_tools->sql_list_tables();

			if ($this->db_tool->is_valid_operation($operation))
			{
				if (!$this->db_lock->acquire())
				{
					$io->error($this->language->lang('CLI_DBTOOL_LOCK_ERROR'));
					return 1;
				}

				$results = $this->db_tool->run($operation, $tables, $disable_board);

				$this->db_lock->release();

				$io->success($this->br2nl($this->language->lang($operation . '_SUCCESS')));
				$io->table([$this->language->lang('TH_NAME'), $this->language->lang('CLI_DBTOOL_RESULTS', $operation)], array_map(function ($row) {
					return explode(' ... ', $row);
				}, $results));
			}
		}

		return 0;
	}

	/**
	 * Replace HTML break tags with newlines.
	 * Formats lang strings used in the ACP for the CLI.
	 *
	 * @param string $text
	 * @return string|null
	 */
	protected function br2nl($text)
	{
		return preg_replace('/<br(?:\s+)?\/?>/i', "\n", $text);
	}
}
