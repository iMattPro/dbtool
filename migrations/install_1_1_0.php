<?php
/**
*
* Database Optimize & Repair Tool
*
* @copyright (c) 2013 Matt Friedman
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace vse\dbtool\migrations;

class install_1_1_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['dbtool_version']) && version_compare($this->config['dbtool_version'], '1.1.0', '>=');
	}

	static public function depends_on()
	{
		return array('\vse\dbtool\migrations\remove_database_or');
	}

	public function update_data()
	{
		return array(
			array('module.add', array(
				'acp',
				'ACP_CAT_DATABASE',
				array(
					'module_basename'	=> '\vse\dbtool\acp\dbtool_module',
					'module_langname'	=> 'ACP_OPTIMIZE_REPAIR',
					'module_mode'		=> 'view',
					'module_auth'		=> 'ext_vse/dbtool && acl_a_backup',
					'after'				=> 'ACP_RESTORE', // Will be placed after ACP_RESTORE
				)
			)),

			array('config.add', array('dbtool_version', '1.1.0')),
		);
	}
}
