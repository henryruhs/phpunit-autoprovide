<?php

declare(strict_types = 1);

namespace PHPUnitAutoProvide\Tests\Autoloader;

use PHPUnitAutoProvide\Tests\TestCaseAbstract;

/**
 * YamlTest
 *
 * @since 2.0.0
 *
 * @package PHPUnitAutoProvide
 * @category Tests
 * @author Henry Ruhs
 */

class YamlTest extends TestCaseAbstract
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
		$this->assertEquals($expect, 'class-yaml');
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
		$this->assertEquals($expect, 'method-yaml');
	}
}
