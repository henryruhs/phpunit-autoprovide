<?php

declare(strict_types = 1);

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
	 *
	 * @dataProvider providerAutoloader
	 */

	public function testClass(string $expect) : void
	{
		$this->assertEquals($expect, 'class-json');
	}

	/**
	 * testMethod
	 *
	 * @since 1.0.0
	 *
	 *
	 * @dataProvider providerAutoloader
	 */

	public function testMethod(string $expect) : void
	{
		$this->assertEquals($expect, 'method-json');
	}
}
