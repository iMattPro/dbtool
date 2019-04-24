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
	protected static function setup_extensions()
	{
		return ['vse/dbtool'];
	}

	public function test_acp_pages()
	{
		$this->login();
		$this->admin_login();

		$this->add_lang_ext('vse/dbtool', 'dbtool_acp');

		$crawler = self::request('GET', 'adm/index.php?i=\vse\dbtool\acp\dbtool_module&amp;mode=view&sid=' . $this->sid);
		$this->assertContainsLang('ACP_OPTIMIZE_REPAIR', $crawler->text());
		$this->assertContainsLang('OPTIMIZE_REPAIR_OPTIONS', $crawler->text());

		return $crawler;
	}

	public function operation_test_data()
	{
		return [
			['optimize', 'OPTIMIZE_SUCCESS'],
			['repair', 'REPAIR_SUCCESS'],
			['check', 'CHECK_SUCCESS'],
			['error', 'TABLE_ERROR'],
		];
	}

	/**
	 * @depends      test_acp_pages
	 * @dataProvider operation_test_data
	 */
	public function test_operation($operation, $expected, $crawler)
	{
		$this->add_lang_ext('vse/dbtool', 'dbtool_acp');

		$form = $crawler->selectButton($this->lang('SUBMIT'))->form();
		$form['disable_board']->select(1);
		if ($operation !== 'error')
		{
			$form['operation']->select($operation);
			$form['mark'][0]->tick();
		}
		$crawler = self::submit($form);

		$form = $crawler->selectButton('Yes')->form();
		self::submit($form);

		$this->assertContainsLang($expected, static::get_content());
	}
}
