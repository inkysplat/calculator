<?php

namespace src\Calculator;

use src\Calculator\Contracts\CalculatorInterface;
use src\Calculator\Exceptions\InvalidNumberException;

/**
 * Class Calculator
 * @package src\Calculator
 */
class Calculator implements CalculatorInterface
{
    /**
     * Stores our calculation in Array parts.
     * @var array
     */
    private $calculation = [];

    /**
     * Default Constructor.
     */
    public function __construct(){
        return;
    }

    /**
     * Let's add a number to our Calculation.
     *
     * @throws src\Calculator\Exceptions\InvalidNumberException
     * @param Integer $number
     * @return $this
     */
    public function number($number)
    {
        if (!is_numeric($number) || !is_int($number))
        {
            throw new InvalidNumberException("Invalid Number Provided. Expecting an Integer or Double.");
        }

        $this->calculation[] = $number;
        return $this;
    }

    /**
     * Will add an Addition Operand into the Calculation.
     * @return $this
     */
    public function add()
    {
        $this->calculation[] = '+';
        return $this;
    }

    /**
     * Will add a Substraction Operand into the Calculation.
     * @return $this
     */
    public function substract()
    {
        $this->calculation[] = '-';
        return $this;
    }

    /**
     * Will add a Multiplication Operand into the Calculation.
     * @return $this
     */
    public function multiply()
    {
        $this->calculation[] = '*';
        return $this;
    }

    /**
     * Will add a Division Operand into the Calculation.
     * @return $this
     */
    public function divide()
    {
        $this->calculation[] = '/';
        return $this;
    }

    /**
     * Will generate our Calculation
     * @return string
     */
    public function getCalculation()
    {
        return implode('', $this->calculation);
    }

    /**
     * Will Calculate the Calculation provided.
     * @return Integer
     */
    public function equals()
    {
        $calculation = $this->getCalculation();
        $eval = '$result = '.$calculation.';';
        eval($eval);
        return $result;
    }

    /**
     * A __toString() kind of method.
     * @return string
     */
    public function getName()
    {
        return __CLASS__;
    }

}