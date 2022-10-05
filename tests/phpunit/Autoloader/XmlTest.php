<?php

declare(strict_types = 1);
namespace PHPUnitAutoProvide\Tests\Autoloader;

use PHPUnitAutoProvide\Tests\TestCaseAbstract;

class XmlTest extends TestCaseAbstract
{
	public function testClass(string $expect) : void
	{
		$this->assertEquals($expect, 'class-xml');
	}

	public function testMethod(string $expect) : void
	{
		$this->assertEquals($expect, 'method-xml');
	}
}
