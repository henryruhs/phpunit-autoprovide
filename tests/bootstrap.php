<?php

declare(strict_types = 1);

namespace PHPUnitAutoProvide;

use function error_reporting;

error_reporting(E_DEPRECATED | E_WARNING | E_ERROR | E_PARSE);

include_once('.' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');
include_once('TestCaseAbstract.php');
