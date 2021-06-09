<?php
namespace PHPUnitProviderAutoloader\Tests\Autoloader;

use PHPUnitProviderAutoloader\Tests\TestCaseAbstract;

/**
 * CsvTest
 *
 * @since 2.1.0
 *
 * @package PHPUnitProviderAutoloader
 * @category Tests
 * @author Henry Ruhs
 */

class PhpTest extends TestCaseAbstract
{
	/**
	 * testClass
	 *
	 * @since 2.1.0
	 *
	 * @param string $expect
	 *
	 * @dataProvider providerAutoloader
	 */

	public function testClass(string $expect) : void
	{
		$this->assertEquals($expect, 'class-php');
	}

	/**
	 * testMethod
	 *
	 * @since 2.1.0
	 *
	 * @param string $expect
	 *
	 * @dataProvider providerAutoloader
	 */

	public function testMethod(string $expect) : void
	{
		$this->assertEquals($expect, 'method-php');
	}
}
