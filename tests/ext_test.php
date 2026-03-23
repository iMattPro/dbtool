<?php
/**
 *
 * Database Optimize & Repair Tool
 *
 * @copyright (c) 2015 Matt Friedman
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace vse\dbtool\tests\system;

use phpbb\db\migrator;
use phpbb\finder\finder;
use phpbb_test_case;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\DependencyInjection\ContainerInterface;
use vse\dbtool\ext;

class ext_test extends phpbb_test_case
{
	/** @var ContainerInterface|MockObject */
	protected ContainerInterface|MockObject $container;

	/** @var MockObject|finder */
	protected MockObject|finder $extension_finder;

	/** @var MockObject|migrator */
	protected MockObject|migrator $migrator;

	/**
	 * @inheritdoc
	 */
	protected function setUp(): void
	{
		parent::setUp();

		// Stub the container
		$this->container = $this->createMock(ContainerInterface::class);

		// Stub the ext finder and disable its constructor
		$this->extension_finder = $this->createMock(finder::class);

		// Stub the migrator and disable its constructor
		$this->migrator = $this->createMock(migrator::class);
	}

	/**
	 * Test the extension can only be enabled when the minimum
	 * phpBB version requirement is satisfied.
	 */
	public function test_ext(): void
	{
		$ext = new ext($this->container, $this->extension_finder, $this->migrator, 'vse/dbtool', '');

		self::assertTrue($ext->is_enableable());
	}
}
