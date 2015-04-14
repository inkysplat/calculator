<?php

namespace src\Calculator\Models;

/**
 * Class Operand
 * @package src\Calculator\Models
 */
abstract class Operand
{
    /**
     * Returns the Operand Symbol
     * @return string
     */
    public function getOperand()
    {
        return $this->operand;
    }
}