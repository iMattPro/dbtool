<?php
/**
*
* @package Database Optimize & Repair Tool testing
* @copyright (c) 2014 Matt Friedman
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace vse\dbtool\tests\functional;

/**
* @group functional
*/
class dbtool_acp_test extends \phpbb_functional_test_case
{
	static protected function setup_extensions()
	{
		return array('vse/dbtool');
	}

	public function acp_pages_data()
	{
		return array(
			array('view'),
		);
	}

	/**
	* @dataProvider acp_pages_data
	*/
	public function test_acp_pages($mode)
	{
		$this->login();
		$this->admin_login();
		self::request('GET', 'adm/index.php?i=\vse\dbtool\acp\dbtool_module&amp;mode=' . $mode . '&sid=' . $this->sid);
	}
}
