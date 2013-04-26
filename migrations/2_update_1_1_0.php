<?php
/**
 *
 * @package Database Optimize & Repair Tool
 * @copyright (c) 2013 Matt Friedman
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

class phpbb_ext_vse_dbtool_migrations_2_update_1_1_0 extends phpbb_db_migration
{
	public function effectively_installed()
	{
		return isset($this->config['dbtool_version']) && version_compare($this->config['dbtool_version'], '1.1.0', '>=');
	}

	static public function depends_on()
	{
		return array('phpbb_ext_vse_dbtool_migrations_1_base');
	}

	public function update_data()
	{
		return array(
			array('if', array(
				($this->config['database_or_version']),
				array('config.remove', array('database_or_version')),
			)),

			array('custom', array(array($this, 'update_module'))),

			array('config.add', array('dbtool_version', '1.1.0')),
		);
	}

	public function update_module()
	{
		$sql = 'UPDATE ' . $this->table_prefix . "modules
			SET module_basename = 'phpbb_ext_vse_dbtool_acp_dbtool_module', module_langname = 'ACP_OPTIMIZE_REPAIR'
			WHERE module_class = 'acp'
				AND module_basename = 'acp_database_or'
				AND module_langname = 'ACP_DATABASE_OR'";
		$this->db->sql_query($sql);
	}
}
