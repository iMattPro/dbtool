<?php
/**
 *
 * Database Optimize & Repair Tool
 *
 * @copyright (c) 2013, 2019 Matt Friedman
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace vse\dbtool\migrations;

class install_1_2_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return $this->config->offsetExists('dbtool_lock');
	}

	public static function depends_on()
	{
		return ['\vse\dbtool\migrations\install_1_1_0'];
	}

	public function update_data()
	{
		return [
			['config.add', ['dbtool_lock', 0, true]],

			['if', [
				$this->config->offsetExists('dbtool_version'),
				['config.remove', ['dbtool_version']],
			]],
		];
	}
}
