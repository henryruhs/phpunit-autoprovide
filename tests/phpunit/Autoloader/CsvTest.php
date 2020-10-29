<?php
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
	 * @param string|null $expect
	 *
	 * @dataProvider providerAutoloader
	 */

	public function testClass(string $expect = null) : void
	{
		$this->assertEquals($expect, 'class-csv');
	}

	/**
	 * testMethod
	 *
	 * @since 2.0.0
	 *
	 * @param string|null $expect
	 *
	 * @dataProvider providerAutoloader
	 */

	public function testMethod(string $expect = null) : void
	{
		$this->assertEquals($expect, 'method-csv');
	}
}
