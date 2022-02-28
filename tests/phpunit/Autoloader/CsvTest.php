<?php

declare(strict_types = 1);

namespace PHPUnitProviderAutoloader\Tests\Autoloader;

use PHPUnitProviderAutoloader\Tests\TestCaseAbstract;

/**
 * CsvTest
 *
 * @since 2.0.0
 *
 * @package PHPUnitProviderAutoloader
 * @category Tests
 * @author Henry Ruhs
 */

class CsvTest extends TestCaseAbstract
{
	/**
	 * testClass
	 *
	 * @since 2.0.0
	 *
	 *
	 * @dataProvider providerAutoloader
	 */

	public function testClass(string $expect) : void
	{
		$this->assertEquals($expect, 'class-csv');
	}

	/**
	 * testMethod
	 *
	 * @since 2.0.0
	 *
	 *
	 * @dataProvider providerAutoloader
	 */

	public function testMethod(string $expect) : void
	{
		$this->assertEquals($expect, 'method-csv');
	}
}
