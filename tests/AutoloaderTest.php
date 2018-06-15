<?php
namespace PHPUnitProviderAutoloader\Tests;

/**
 * AutoloaderTest
 *
 * @since 1.0.0
 *
 * @package PHPUnitProviderAutoloader
 * @category Tests
 * @author Henry Ruhs
 */

class AutoloaderTest extends TestCaseAbstract
{
	/**
	 * testAutoloadGeneral
	 *
	 * @since 1.0.0
	 *
	 * @param string $expect
	 *
	 * @dataProvider providerAutoloader
	 */

	public function testAutoloadGeneral(string $expect = null)
	{
		$this->assertEquals($expect, 'general');
	}

	/**
	 * testAutoloadMethod
	 *
	 * @since 1.0.0
	 *
	 * @param string $expect
	 *
	 * @dataProvider providerAutoloader
	 */

	public function testAutoloadMethod(string $expect = null)
	{
		$this->assertEquals($expect, 'method');
	}
}
