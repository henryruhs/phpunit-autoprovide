<?php
namespace PHPUnitProviderAutoloader;

use PHPUnit;

/**
 * TestCaseAbstract
 *
 * @since 1.0.0
 *
 * @package PHPUnitProviderAutoloader
 * @category Tests
 * @author Henry Ruhs
 */

abstract class TestCaseAbstract extends PHPUnit\Framework\TestCase
{
	/**
	 * directory of the provider
	 *
	 * @var string
	 */

	protected $_providerDirectory = 'tests' . DIRECTORY_SEPARATOR . 'provider';

	/**
	 * namespace of the testing suite
	 *
	 * @var string
	 */

	protected $_testNamespace = __NAMESPACE__;

	/**
	 * provider autoloader
	 *
	 * @since 4.0.0
	 *
	 * @return array
	 */

	public function providerAutoloader() : array
	{
		$debugArray = debug_backtrace();
		$searchArray =
		[
			$this->_testNamespace,
			'\\'
		];
		$replaceArray =
		[
			null,
			DIRECTORY_SEPARATOR
		];
		$className = str_replace($searchArray, $replaceArray, $debugArray[3]['args'][0]);
		$method = $debugArray[3]['args'][1];

		/* load as needed */

		$path = $this->_providerDirectory . DIRECTORY_SEPARATOR . $className . '_' . $method . '.json';
		if (file_exists($path))
		{
			$content = file_get_contents($path);
			return json_decode($content, true);
		};
	}
}
