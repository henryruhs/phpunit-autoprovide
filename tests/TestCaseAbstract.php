<?php

declare(strict_types = 1);
namespace PHPUnitAutoProvide\Tests;

use PHPUnitAutoProvide;

abstract class TestCaseAbstract extends PHPUnitAutoProvide\TestCaseAbstract
{
	protected string $_testNamespace = __NAMESPACE__;
}
