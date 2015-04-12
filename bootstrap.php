<?php

define("ROOT_PATH", realpath(dirname(__FILE__)));

/**
 * In an ideal world I would've created an Autoloader.
 */

require_once ROOT_PATH.'/src/Calculator/Contracts/CalculatorInterface.php';
require_once ROOT_PATH.'/src/Calculator/Exceptions/InvalidNumberException.php';
require_once ROOT_PATH.'/src/Calculator/Calculator.php';
