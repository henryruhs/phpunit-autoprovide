<?php
namespace PHPUnitProviderAutoloader\Tests\Autoloader;

use PHPUnitProviderAutoloader\Tests\TestCaseAbstract;

/**
 * XmlTest
 *
 * @since 1.0.0
 *
 * @package PHPUnitProviderAutoloader
 * @category Tests
 * @author Henry Ruhs
 */

class XmlTest extends TestCaseAbstract
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
