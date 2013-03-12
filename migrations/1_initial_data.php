<?php
/**
 *
 * @package Database Optimize & Repair Tool
 * @copyright (c) 2013 Matt Friedman
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

/**
 * @ignore
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
 * Initial data changes needed for Extension installation
 */
class phpbb_ext_vse_dbtool_migrations_1_initial_data extends phpbb_db_migration
{
	/**
	 * @inheritdoc
	 */
	public function update_data()
	{
		return array(
			// Remove previous versions if they exist
			array('if', array(
				($this->config['database_or_version']),
				array('config.remove', array('database_or_version')),
			)),

			// Keep track of the extension version in the DB
			array('config.add', array('dbtool_version', '1.1.0b1')),

			// Add ACP module
			array('module.add', array('acp', 'ACP_CAT_DATABASE', array(
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