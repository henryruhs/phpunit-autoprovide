<?php

declare(strict_types = 1);

namespace PHPUnitAutoProvide\Tests\Autoloader;

use PHPUnitAutoProvide\Tests\TestCaseAbstract;

/**
 * CsvTest
 *
 * @since 2.0.0
 *
 * @package PHPUnitAutoProvide
 * @category Tests
 * @author Henry Ruhs
 */

class CsvTest extends TestCaseAbstract
{
	/**
	 * testClass
	 *
	 * @since 2.0.0
	 *
	 * @dataProvider autoProvide
	 */

	public function testClass(string $expect) : void
	{
		$this->assertEquals($expect, 'class-csv');
	}

	/**
	 * testMethod
	 *
	 * @since 2.0.0
	 *
	 * @dataProvider autoProvide
	 */

	public function testMethod(string $expect) : void
	{
		$this->assertEquals($expect, 'method-csv');
	}
}
