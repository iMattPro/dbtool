<?php
/**
*
* Database Optimize & Repair Tool
*
* @copyright (c) 2014 Matt Friedman
* @license GNU General Public License, version 2 (GPL-2.0)
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

		$this->add_lang_ext('vse/dbtool', 'dbtool_acp');

		$crawler = self::request('GET', 'adm/index.php?i=\vse\dbtool\acp\dbtool_module&amp;mode=' . $mode . '&sid=' . $this->sid);
		$this->assertContainsLang('ACP_OPTIMIZE_REPAIR', $crawler->text());
		$this->assertContainsLang('OPTIMIZE_REPAIR_OPTIONS', $crawler->text());
	}
}
