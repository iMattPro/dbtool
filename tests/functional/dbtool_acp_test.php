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

use phpbb_functional_test_case;
use Symfony\Component\DomCrawler\Crawler;

/**
 * @group functional
 */
class dbtool_acp_test extends phpbb_functional_test_case
{
	protected static function setup_extensions(): array
	{
		return ['vse/dbtool'];
	}

	public function test_acp_pages(): Crawler
	{
		self::login();
		self::admin_login();

		self::add_lang_ext('vse/dbtool', 'dbtool_acp');

		$crawler = self::request('GET', 'adm/index.php?i=\vse\dbtool\acp\dbtool_module&amp;mode=view&sid=' . $this->sid);
		self::assertContainsLang('ACP_OPTIMIZE_REPAIR', $crawler->text());
		self::assertContainsLang('OPTIMIZE_REPAIR_OPTIONS', $crawler->text());

		return $crawler;
	}

	public static function operation_test_data(): array
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
	public function test_operation($operation, $expected, $crawler): void
	{
		self::login();
		self::admin_login();

		self::add_lang_ext('vse/dbtool', 'dbtool_acp');

		$form = $crawler->selectButton(self::lang('SUBMIT'))->form();
		$form['disable_board']->select(1);
		if ($operation !== 'error')
		{
			$form['operation']->select($operation);
			$form['mark'][0]->tick();
		}
		$crawler = self::submit($form);

		$form = $crawler->selectButton(self::lang('YES'))->form();
		self::submit($form);

		self::assertContainsLang($expected, static::get_content());
	}
}
