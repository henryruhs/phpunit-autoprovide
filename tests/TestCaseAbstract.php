<?php
namespace PHPUnitProviderAutoloader\Tests;

use PHPUnitProviderAutoloader;

/**
 * TestCaseAbstract
 *
 * @since 1.0.0
 *
 * @package PHPUnitProviderAutoloader
 * @category Tests
 * @author Henry Ruhs
 */

abstract class TestCaseAbstract extends PHPUnitProviderAutoloader\TestCaseAbstract
{
	/**
	 * namespace of the testing suite
	 *
	 * @var string
	 */

	protected $_testNamespace = __NAMESPACE__;
}
