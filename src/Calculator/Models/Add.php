<?php

namespace src\Calculator\Models;

use src\Calculator\Contracts\OperatorInterface;

/**
 * Class Add
 * @package src\Calculator\Models
 */
class Add extends Operand implements OperatorInterface
{
    /**
     * @var string
     */
    private $operand = '+';
}