<?php
/**
 *
 * @package Database Optimize & Repair Tool
 * @copyright (c) 2013 Matt Friedman
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

class phpbb_ext_vse_dbtool_migrations_1_base extends phpbb_db_migration
{
	public function effectively_installed()
	{
		return isset($this->config['database_or_version']) && version_compare($this->config['database_or_version'], '1.0.2', '>=');
	}

	public function update_data()
	{
		return array(
			array('module.add', array(
				'acp',
				'ACP_CAT_DATABASE',
				array(
					'module_basename'	=> 'phpbb_ext_vse_dbtool_acp_dbtool_module',
					'module_langname'	=> 'ACP_OPTIMIZE_REPAIR',
					'module_mode'		=> 'view',
					'module_auth'		=> 'acl_a_backup',
					'after'				=> 'ACP_RESTORE', // Will be placed after ACP_RESTORE
				)
			)),
		);
	}
}
