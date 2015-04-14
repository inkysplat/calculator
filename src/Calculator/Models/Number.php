<?php

namespace src\Calculator\Models;

use src\Calculator\Exceptions\InvalidNumberException;

/**
 * Class Number
 * @package src\Calculator\Models
 */
class Number
{
    /**
     * @var int
     */
    private $number;

    /**
     * @param $number
     * @throws InvalidNumberException
     */
    public function __construct($number)
    {
        if (!is_numeric($number) || !is_int($number)) {
            throw new InvalidNumberException("Invalid Number Provided. Expecting an Integer or Double.");
        }

        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'Number';
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

}