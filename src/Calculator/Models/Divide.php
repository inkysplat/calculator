<?php

namespace src\Calculator\Models;

use src\Calculator\Contracts\OperatorInterface;

/**
 * Class Divide
 * @package src\Calculator\Models
 */
class Divide extends Operand implements OperatorInterface
{
    /**
     * @var string
     */
    protected $operand = '/';
}