PHPUnit AutoProvide
===================

> Magic helper to autoload CSV, JSON, PHP, XML and YAML data provider in PHPUnit.

[![Build Status](https://img.shields.io/github/workflow/status/henryruhs/phpunit-autoprovide/ci.svg)](https://github.com/henryruhs/phpunit-autoprovide/actions?query=workflow:ci)
[![Packagist Version](https://img.shields.io/packagist/v/henryruhs/phpunit-autoprovide.svg)](https://packagist.org/packages/henryruhs/phpunit-autoprovide)
[![License](https://img.shields.io/packagist/l/henryruhs/phpunit-autoprovide.svg)](https://packagist.org/packages/henryruhs/phpunit-autoprovide)


Installation
------------

```
composer require henryruhs/phpunit-autoprovide
```


Setup
-----

Create the `TestCaseAbstract` for your testing suite:

```php
<?php
namespace ExampleProject\Tests;

use PHPUnitAutoProvide;

/**
 * TestCaseAbstract
 *
 * @package ExampleProject
 * @category Tests
 */

abstract class TestCaseAbstract extends PHPUnitAutoProvide\TestCaseAbstract
{
	/**
	 * directory of the provider
	 */

	protected $_providerDirectory = 'tests' . DIRECTORY_SEPARATOR . 'provider';

	/**
	 * namespace of the testing suite
	 */

	protected $_testNamespace = __NAMESPACE__;
}
```


Usage
-----

Extend `ExampleTest` from `TestCaseAbstract` and set `@dataProvider` as needed:

```php
<?php
namespace ExampleProject\Tests;

/**
 * ExampleTest
 *
 * @package ExampleProject
 * @category Tests
 */

class ExampleTest extends TestCaseAbstract
{
	/**
	 * testMethod
	 *
	 * @param string $expect
	 *
	 * @dataProvider autoProvide
	 */

	public function testMethod(string $expect) : void
	{
		$this->assertEquals($expect, 'test');
	}
}
```

Create the `ExampleTest{_testMethod}.{csv|json|php|xml|yml}` file:

```json
[
	[
		"test"
	]
]
```
