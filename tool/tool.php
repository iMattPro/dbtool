<?php
/**
 *
 * Database Optimize & Repair Tool
 *
 * @copyright (c) 2013, 2019 Matt Friedman
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace vse\dbtool\tool;

use phpbb\cache\driver\driver_interface as cache;
use phpbb\config\config;
use phpbb\db\driver\driver_interface as db;
use phpbb\log\log_interface as log;
use phpbb\user;
use vse\dbtool\ext;

class tool implements tool_interface
{
	/** @var \phpbb\cache\driver\driver_interface */
	protected $cache;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var log */
	protected $log;

	/** @var \phpbb\user */
	protected $user;

	/**
	 * tool constructor
	 *
	 * @param \phpbb\cache\driver\driver_interface $cache
	 * @param \phpbb\config\config                 $config
	 * @param \phpbb\db\driver\driver_interface    $db
	 * @param \phpbb\log\log_interface             $log
	 * @param \phpbb\user                          $user
	 */
	public function __construct(cache $cache, config $config, db $db, log $log, user $user)
	{
		$this->cache   = $cache;
		$this->config  = $config;
		$this->db      = $db;
		$this->log     = $log;
		$this->user    = $user;
	}

	/**
	 * Perform table SQL query and return any messages
	 *
	 * @param string $operation     OPTIMIZE, REPAIR, or CHECK
	 * @param array  $tables        Array of all tables to be processed
	 * @param int    $disable_board The users option to disable the board during run time
	 * @return array Any errors or status information, otherwise the array of tables processed
	 * @access public
	 */
	public function run($operation, $tables, $disable_board = 0)
	{
		$this->extend_execution_limits();

		$tablestr = implode(', ', $tables);
		$disabled = $this->disable_board($disable_board, $this->config->offsetGet('board_disable'));

		$output = [];
		$result = $this->db->sql_query($operation . ' TABLE ' . $this->db->sql_escape($tablestr));
		while ($row = $this->db->sql_fetchrow($result))
		{
			// Build a message only for optimize/repair errors, or if check table is run
			if ($operation === ext::CHECK || in_array(strtolower($row['Msg_type']), ['error', 'info', 'note', 'warning']))
			{
				$output[] = substr($row['Table'], strpos($row['Table'], '.') + 1) . ' ... ' . $row['Msg_type'] . ': ' . $row['Msg_text'];
			}
		}
		$this->db->sql_freeresult($result);

		$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, $operation . '_LOG', time(), [$tablestr]);

		$this->disable_board($disable_board, $disabled);

		// Clear cache to ensure board is re-enabled for all users
		$this->cache->purge();

		return $output ?: $tables;
	}

	/**
	 * Set disable board config state
	 *
	 * @param int $disable  The users option to disable the board during run time
	 * @param int $disabled The current disabled state
	 * @return int The original disabled state of the board
	 * @access public
	 */
	public function disable_board($disable, $disabled)
	{
		if ($disable && !$disabled)
		{
			$this->config->set('board_disable', !$this->config->offsetGet('board_disable'));
		}

		return $disabled;
	}

	/**
	 * Is the database using MySQL
	 *
	 * @return bool True if MySQL, false otherwise
	 * @access public
	 */
	public function is_mysql()
	{
		return $this->db->get_sql_layer() === 'mysql4' || $this->db->get_sql_layer() === 'mysqli';
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
		return in_array($operation, [ext::OPTIMIZE, ext::REPAIR, ext::CHECK]);
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
		return in_array(strtolower($engine), ['myisam', 'innodb', 'archive']);
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
		return strtolower($engine) === 'innodb';
	}

	/**
	 * Extend execution limits to mitigate timeouts
	 *
	 * @access protected
	 */
	protected function extend_execution_limits()
	{
		@set_time_limit(1200);
		@set_time_limit(0);
	}
}
