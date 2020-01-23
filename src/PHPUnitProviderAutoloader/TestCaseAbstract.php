<?php
namespace PHPUnitProviderAutoloader;

use PHPUnit;
use Symfony;
use function debug_backtrace;
use function file_exists;
use function file_get_contents;
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
		$className = str_replace($searchArray, $replaceArray, $debugArray[4]['args'][0]);
		$method = $debugArray[4]['args'][1];

		/* load as needed */

		$php = $this->_loadPHP($className, $method);
		if ($php)
		{
			return $php;
		}
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
		$serializer = new Symfony\Component\Serializer\Serializer(
		[
			new Symfony\Component\Serializer\Normalizer\ObjectNormalizer()
		],
		[
			new Symfony\Component\Serializer\Encoder\CsvEncoder()
		]);
		$content = $this->_loadContent($className, $method, 'csv');
		if ($content)
		{
			return $serializer->decode($content, 'csv');
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
		$serializer = new Symfony\Component\Serializer\Serializer(
		[
			new Symfony\Component\Serializer\Normalizer\ObjectNormalizer()
		],
		[
			new Symfony\Component\Serializer\Encoder\JsonEncoder()
		]);
		$content = $this->_loadContent($className, $method, 'json');
		if ($content)
		{
			return $serializer->decode($content, 'json');
		}
		return null;
	}

	/**
	 * load php from path
	 *
	 * @since 2.1.0
	 *
	 * @param string $className name of the class
	 * @param string $method name of the method
	 *
	 * @return array|null
	 */

	protected function _loadPHP(string $className = null, string $method = null) : ?array
	{
		$content = $this->_loadArray($className, $method, 'php');
		if ($content)
		{
			return $content;
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
		$serializer = new Symfony\Component\Serializer\Serializer(
		[
			new Symfony\Component\Serializer\Normalizer\ObjectNormalizer()
		],
		[
			new Symfony\Component\Serializer\Encoder\XmlEncoder()
		]);
		$content = $this->_loadContent($className, $method, 'xml');
		if ($content)
		{
			return $serializer->decode($content, 'xml');
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
		$serializer = new Symfony\Component\Serializer\Serializer(
		[
			new Symfony\Component\Serializer\Normalizer\ObjectNormalizer()
		],
		[
			new Symfony\Component\Serializer\Encoder\YamlEncoder()
		]);
		$content = $this->_loadContent($className, $method, 'yml');
		if ($content)
		{
			return $serializer->decode($content, 'yml');
		}
		return null;
	}

	/**
	 * load content from path
	 *
	 * @since 2.0.0
	 *
	 * @param string $className name of the class
	 * @param string $methodName name of the method
	 * @param string $fileExtension extension of the file
	 *
	 * @return string|null
	 */

	protected function _loadContent(string $className = null, string $methodName = null, string $fileExtension = null) : ?string
	{
		$fileMethod = $this->_providerDirectory . DIRECTORY_SEPARATOR . $className . '_' . $methodName . '.' . $fileExtension;
		$fileClassName = $this->_providerDirectory . DIRECTORY_SEPARATOR . $className . '.' . $fileExtension;

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

	/**
	 * load array from path
	 *
	 * @since 2.1.0
	 *
	 * @param string $className name of the class
	 * @param string $methodName name of the method
	 * @param string $fileExtension extension of the file
	 *
	 * @return array|null
	 */

	protected function _loadArray(string $className = null, string $methodName = null, string $fileExtension = null) : ?array
	{
		$fileMethod = $this->_providerDirectory . DIRECTORY_SEPARATOR . $className . '_' . $methodName . '.' . $fileExtension;
		$fileClassName = $this->_providerDirectory . DIRECTORY_SEPARATOR . $className . '.' . $fileExtension;

		/* load as needed */

		if (file_exists($fileMethod))
		{
			return include($fileMethod);
		}
		if (file_exists($fileClassName))
		{
			return include($fileClassName);
		}
		return null;
	}
}
