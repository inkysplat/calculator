<?php

namespace src\Calculator\Models;

use src\Calculator\Contracts\OperatorInterface;

/**
 * Class Multiply
 * @package src\Calculator\Models
 */
class Multiply extends Operand implements OperatorInterface
{
    /**
     * @var string
     */
    protected $operand = '*';
}