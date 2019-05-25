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

interface tool_interface
{
	/**
	 * Perform table SQL query and return any messages
	 *
	 * @param string $operation     OPTIMIZE, REPAIR, or CHECK
	 * @param array  $tables        Array of all tables to be processed
	 * @param int    $disable_board The users option to disable the board during run time
	 * @return array Any errors or status information
	 * @access public
	 */
	public function run($operation, $tables, $disable_board = 0);

	/**
	 * Set disable board config state
	 *
	 * @param int $disable  The users option to disable the board during run time
	 * @param int $disabled The current disabled state
	 * @return int The original disabled state of the board
	 * @access public
	 */
	public function disable_board($disable, $disabled);

	/**
	 * Is the database using MySQL
	 *
	 * @return bool True if MySQL, false otherwise
	 * @access public
	 */
	public function is_mysql();

	/**
	 * Is requested operation to optimize, repair or check tables
	 *
	 * @param string $operation The name of the operation
	 * @return bool True if valid operation, false otherwise
	 * @access public
	 */
	public function is_valid_operation($operation);

	/**
	 * Only allow tables using MyISAM, InnoDB or Archive storage engines
	 *
	 * @param string $engine The name of the engine
	 * @return bool True if valid engine, false otherwise
	 * @access public
	 */
	public function is_valid_engine($engine);

	/**
	 * Is the storage engine InnoDB
	 *
	 * @param string $engine The name of the engine
	 * @return bool True if InnoDB engine, false otherwise
	 * @access public
	 */
	public function is_innodb($engine);
}
