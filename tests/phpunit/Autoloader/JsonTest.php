<?php
namespace PHPUnitProviderAutoloader\Tests\Autoloader;

use PHPUnitProviderAutoloader\Tests\TestCaseAbstract;

/**
 * JsonTest
 *
 * @since 1.0.0
 *
 * @package PHPUnitProviderAutoloader
 * @category Tests
 * @author Henry Ruhs
 */

class JsonTest extends TestCaseAbstract
{
	/**
	 * testClass
	 *
	 * @since 1.0.0
	 *
	 * @param string $expect
	 *
	 * @dataProvider providerAutoloader
	 */

	public function testClass(string $expect = null) : void
	{
		$this->assertEquals($expect, 'class-json');
	}

	/**
	 * testMethod
	 *
	 * @since 1.0.0
	 *
	 * @param string $expect
	 *
	 * @dataProvider providerAutoloader
	 */

	public function testMethod(string $expect = null) : void
	{
		$this->assertEquals($expect, 'method-json');
	}
}
