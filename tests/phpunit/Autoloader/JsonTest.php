<?php

declare(strict_types = 1);

namespace PHPUnitAutoProvide\Tests\Autoloader;

use PHPUnitAutoProvide\Tests\TestCaseAbstract;

/**
 * JsonTest
 *
 * @since 1.0.0
 *
 * @package PHPUnitAutoProvide
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
	 * @dataProvider autoProvide
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
	 * @dataProvider autoProvide
	 */

	public function testMethod(string $expect) : void
	{
		$this->assertEquals($expect, 'method-json');
	}
}
