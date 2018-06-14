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
	 * testDataProvider
	 *
	 * @since 1.0.0
	 *
	 * @param string $expect
	 *
	 * @dataProvider providerAutoloader
	 */

	public function testDataProvider(string $expect = null)
	{
		$this->assertEquals($expect, 'test');
	}
}
