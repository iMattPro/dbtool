<?php
/**
*
* @package testing
* @copyright (c) 2014 Matt Friedman
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

/**
* @group functional
*/
class phpbb_functional_dbtool_acp_test extends \vse\dbtool\tests\testframework\functional_test_case
{
	public function setUp()
	{
		parent::setUp();
		$this->login();
		$this->admin_login();
		$this->enable_dbtool_ext();
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
		$crawler = self::request('GET', 'adm/index.php?i=\vse\dbtool\acp\dbtool_module&amp;mode=' . $mode . '&sid=' . $this->sid);
	}
}
