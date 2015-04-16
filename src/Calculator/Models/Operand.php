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

    /**
     * @return string
     */
    public function getName()
    {
        return get_class($this);
    }
}