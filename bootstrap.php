<?php

error_reporting(-1);
ini_set('display_errors', 1);

define("ROOT_PATH", realpath(dirname(__FILE__)));

/**
 * In an ideal world I would've created an Autoloader.
 */

require_once ROOT_PATH.'/src/Calculator/Contracts/OperatorInterface.php';
require_once ROOT_PATH.'/src/Calculator/Contracts/CalculatorInterface.php';
require_once ROOT_PATH.'/src/Calculator/Exceptions/InvalidCalculationException.php';
require_once ROOT_PATH.'/src/Calculator/Exceptions/InvalidNumberException.php';
require_once ROOT_PATH.'/src/Calculator/Exceptions/InvalidOperandException.php';
require_once ROOT_PATH.'/src/Calculator/Models/Operand.php';
require_once ROOT_PATH.'/src/Calculator/Models/Add.php';
require_once ROOT_PATH.'/src/Calculator/Models/Subtract.php';
require_once ROOT_PATH.'/src/Calculator/Models/Multiply.php';
require_once ROOT_PATH.'/src/Calculator/Models/Divide.php';
require_once ROOT_PATH.'/src/Calculator/Models/Number.php';
require_once ROOT_PATH.'/src/Calculator/OperandFactory.php';
require_once ROOT_PATH.'/src/Calculator/Calculator.php';


