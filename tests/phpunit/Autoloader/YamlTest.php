<?php
namespace PHPUnitProviderAutoloader\Tests\Autoloader;

use PHPUnitProviderAutoloader\Tests\TestCaseAbstract;

/**
 * YamlTest
 *
 * @since 2.0.0
 *
 * @package PHPUnitProviderAutoloader
 * @category Tests
 * @author Henry Ruhs
 */

class YamlTest extends TestCaseAbstract
{
	/**
	 * testGeneral
	 *
	 * @since 2.0.0
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
	 * @since 2.0.0
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
