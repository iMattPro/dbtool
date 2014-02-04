<?php
/**
*
* @package Database Optimize & Repair Tool Testing
* @copyright (c) 2013 Matt Friedman
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace vse\dbtool\tests\testframework;

abstract class functional_test_case extends \phpbb_functional_test_case
{
	protected $dbtool_enabled = false;

	public function enable_vse_dbtool_ext()
	{
		$enable_dbtool = false;

		if ($this->dbtool_enabled === true)
		{
			return;
		}

		$crawler = self::request('GET', 'adm/index.php?i=acp_extensions&mode=main&sid=' . $this->sid);
		$disabled_extensions = $crawler->filter('tr.ext_disabled')->extract(array('_text'));
		foreach ($disabled_extensions as $extension)
		{
			if (strpos($extension, 'Database Optimize') !== false)
			{
				$enable_dbtool = true;
			}
		}

		if ($enable_dbtool)
		{
			$crawler = self::request('GET', 'adm/index.php?i=acp_extensions&mode=main&action=enable_pre&ext_name=vse%2Fdbtool&sid=' . $this->sid);
			$form = $crawler->selectButton('Enable')->form();
			$crawler = self::submit($form);
			$this->assertContains('The extension was enabled successfully', $crawler->text());
			$this->dbtool_enabled = true;
		}
	}
}
