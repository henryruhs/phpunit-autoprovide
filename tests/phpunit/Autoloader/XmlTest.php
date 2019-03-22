<?php
namespace PHPUnitProviderAutoloader\Tests\Autoloader;

use PHPUnitProviderAutoloader\Tests\TestCaseAbstract;

/**
 * XmlTest
 *
 * @since 2.0.0
 *
 * @package PHPUnitProviderAutoloader
 * @category Tests
 * @author Henry Ruhs
 */

class XmlTest extends TestCaseAbstract
{
	/**
	 * testClass
	 *
	 * @since 2.0.0
	 *
	 * @param string $expect
	 *
	 * @dataProvider providerAutoloader
	 */

	public function testClass(string $expect = null) : void
	{
		$this->assertEquals($expect, 'class-xml');
	}

	/**
	 * testMethod
	 *
	 * @since 2.0.0
	 *
	 * @param string $expect
	 *
	 * @dataProvider providerAutoloader
	 */

	public function testMethod(string $expect = null) : void
	{
		$this->assertEquals($expect, 'method-xml');
	}
}
