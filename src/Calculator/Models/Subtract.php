<?php

namespace src\Calculator\Models;

use src\Calculator\Contracts\OperatorInterface;

/**
 * Class Subtract
 * @package src\Calculator\Models
 */
class Subtract extends Operand implements OperatorInterface
{
    /**
     * @var string
     */
    protected $operand = '-';
}