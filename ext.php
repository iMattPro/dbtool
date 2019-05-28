<?php
/**
 *
 * Database Optimize & Repair Tool
 *
 * @copyright (c) 2013, 2019 Matt Friedman
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace vse\dbtool;

use phpbb\extension\base;

class ext extends base
{
	const CHECK = 'CHECK';
	const REPAIR = 'REPAIR';
	const OPTIMIZE = 'OPTIMIZE';

	/**
	 * {@inheritDoc}
	 */
	public function is_enableable()
	{
		return phpbb_version_compare(PHPBB_VERSION, '3.2.0', '>=');
	}
}
