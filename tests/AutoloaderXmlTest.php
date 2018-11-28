<?php
namespace PHPUnitProviderAutoloader\Tests;

/**
 * AutoloaderXmlTest
 *
 * @since 1.0.0
 *
 * @package PHPUnitProviderAutoloader
 * @category Tests
 * @author Henry Ruhs
 */

class AutoloaderXmlTest extends TestCaseAbstract
{
	/**
	 * testGeneral
	 *
	 * @since 1.0.0
	 *
	 * @param string $expect
	 *
	 * @dataProvider providerAutoloader
	 */

	public function testGeneral(string $expect = null)
	{
		$this->assertEquals($expect, 'general');
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

	public function testMethod(string $expect = null)
	{
		$this->assertEquals($expect, 'method');
	}
}
