<?php

declare(strict_types = 1);

namespace PHPUnitAutoProvide\Tests\Autoloader;

use PHPUnitAutoProvide\Tests\TestCaseAbstract;

/**
 * CsvTest
 *
 * @since 2.1.0
 *
 * @package PHPUnitAutoProvide
 * @category Tests
 * @author Henry Ruhs
 */

class PhpTest extends TestCaseAbstract
{
	/**
	 * testClass
	 *
	 * @since 2.1.0
	 *
	 * @dataProvider providerAutoloader
	 */

	public function testClass(string $expect) : void
	{
		$this->assertEquals($expect, 'class-php');
	}

	/**
	 * testMethod
	 *
	 * @since 2.1.0
	 *
	 * @dataProvider providerAutoloader
	 */

	public function testMethod(string $expect) : void
	{
		$this->assertEquals($expect, 'method-php');
	}
}
