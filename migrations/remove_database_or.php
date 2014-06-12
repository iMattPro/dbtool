<?php
/**
*
* @package migration
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace vse\dbtool\migrations;

class remove_database_or extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return !isset($this->config['database_or_version']);
	}

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\beta4');
	}

	public function update_data()
	{
		return array(
			array('if', array(
				array('module.exists', array('acp', false, 'ACP_DATABASE_OR')),
				array('module.remove', array('acp', false, 'ACP_DATABASE_OR')),
			)),

			array('if', array(
				($this->config['database_or_version']),
				array('config.remove', array('database_or_version')),
			)),
		);
	}
}
