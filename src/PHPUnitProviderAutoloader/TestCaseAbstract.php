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
	 * @return array|null
	 */

	public function providerAutoloader() : ?array
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
		$fileClassName = $this->_providerDirectory . DIRECTORY_SEPARATOR . $className . '.json';
		$fileMethod = $this->_providerDirectory . DIRECTORY_SEPARATOR . $className . '_' . $method . '.json';

		/* load as needed */

		if (file_exists($fileMethod))
		{
			$content = file_get_contents($fileMethod);
			return json_decode($content, true);
		}
		if (file_exists($fileClassName))
		{
			$content = file_get_contents($fileClassName);
			return json_decode($content, true);
		}
		return null;
	}
}
