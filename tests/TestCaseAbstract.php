<?php

declare(strict_types = 1);

namespace PHPUnitAutoProvide\Tests;

use PHPUnitAutoProvide;

/**
 * TestCaseAbstract
 *
 * @since 1.0.0
 *
 * @package PHPUnitAutoProvide
 * @category Tests
 * @author Henry Ruhs
 */

abstract class TestCaseAbstract extends PHPUnitAutoProvide\TestCaseAbstract
{
	/**
	 * namespace of the testing suite
	 */

	protected string $_testNamespace = __NAMESPACE__;
}
