<?php

declare(strict_types = 1);

namespace PHPUnitAutoProvide\Tests\Autoloader;

use PHPUnitAutoProvide\Tests\TestCaseAbstract;

/**
 * XmlTest
 *
 * @since 2.0.0
 *
 * @package PHPUnitAutoProvide
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
	 * @dataProvider providerAutoloader
	 */

	public function testClass(string $expect) : void
	{
		$this->assertEquals($expect, 'class-xml');
	}

	/**
	 * testMethod
	 *
	 * @since 2.0.0
	 *
	 * @dataProvider providerAutoloader
	 */

	public function testMethod(string $expect) : void
	{
		$this->assertEquals($expect, 'method-xml');
	}
}
