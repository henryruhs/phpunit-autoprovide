<?php
namespace PHPUnitProviderAutoloader;

use KzykHys\CsvParser\CsvParser;
use PHPUnit;
use Symfony\Component\Yaml\Yaml as YamlParser;
use function debug_backtrace;
use function file_exists;
use function file_get_contents;
use function json_decode;
use function json_encode;
use function simplexml_load_string;
use function str_replace;

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

	protected $_testNamespace;

	/**
	 * provider autoloader
	 *
	 * @since 2.0.0
	 *
	 * @return array|null
	 */

	public function providerAutoloader() : ?array
	{
		$debugArray = debug_backtrace();
		$searchArray =
		[
			$this->_testNamespace . '\\',
			'\\'
		];
		$replaceArray =
		[
			null,
			DIRECTORY_SEPARATOR
		];
		$className = str_replace($searchArray, $replaceArray, $debugArray[2]['args'][1]);
		$method = $debugArray[2]['args'][2];

		/* load as needed */

		$json = $this->_loadJSON($className, $method);
		if ($json)
		{
			return $json;
		}
		$xml = $this->_loadXML($className, $method);
		if ($xml)
		{
			return $xml;
		}
		$yaml = $this->_loadYAML($className, $method);
		if ($yaml)
		{
			return $yaml;
		}
		$csv = $this->_loadCSV($className, $method);
		if ($csv)
		{
			return $csv;
		}
		return null;
	}

	/**
	 * load csv from path
	 *
	 * @since 2.0.0
	 *
	 * @param string $className name of the class
	 * @param string $method name of the method
	 *
	 * @return array|null
	 */

	protected function _loadCSV(string $className = null, string $method = null) : ?array
	{
		$content = $this->_loadContent($className, $method, 'csv');
		if ($content)
		{
			return CsvParser::fromString($content)->parse();
		}
		return null;
	}

	/**
	 * load json from path
	 *
	 * @since 2.0.0
	 *
	 * @param string $className name of the class
	 * @param string $method name of the method
	 *
	 * @return array|null
	 */

	protected function _loadJSON(string $className = null, string $method = null) : ?array
	{

		$content = $this->_loadContent($className, $method, 'json');
		if ($content)
		{
			return json_decode($content, true);
		}
		return null;
	}

	/**
	 * load xml from path
	 *
	 * @since 2.0.0
	 *
	 * @param string $className name of the class
	 * @param string $method name of the method
	 *
	 * @return array|null
	 */

	protected function _loadXML(string $className = null, string $method = null) : ?array
	{
		$content = $this->_loadContent($className, $method, 'xml');
		if ($content)
		{
			return json_decode(json_encode(simplexml_load_string($content)), true);
		}
		return null;
	}

	/**
	 * load yaml from path
	 *
	 * @since 2.0.0
	 *
	 * @param string $className name of the class
	 * @param string $method name of the method
	 *
	 * @return array|null
	 */

	protected function _loadYAML(string $className = null, string $method = null) : ?array
	{
		$content = $this->_loadContent($className, $method, 'yml');
		if ($content)
		{
			return YamlParser::parse($content);
		}
		return null;
	}

	/**
	 * load content from path
	 *
	 * @since 2.0.0
	 *
	 * @param string $className name of the class
	 * @param string $method name of the method
	 * @param string $fileExtension extension of the file
	 *
	 * @return string|null
	 */

	protected function _loadContent(string $className = null, string $method = null, string $fileExtension = null) : ?string
	{
		$fileClassName = $this->_providerDirectory . DIRECTORY_SEPARATOR . $className . '.' . $fileExtension;
		$fileMethod = $this->_providerDirectory . DIRECTORY_SEPARATOR . $className . '_' . $method . '.' . $fileExtension;

		/* load as needed */

		if (file_exists($fileMethod))
		{
			return file_get_contents($fileMethod);
		}
		if (file_exists($fileClassName))
		{
			return file_get_contents($fileClassName);
		}
		return null;
	}
}
