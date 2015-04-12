<?php

namespace src\Calculator;
use src\Calculator\Exceptions\InvalidNumberException;

/**
 * Class Calculator
 * @package src\Calculator
 */
class Calculator
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
     * @param Integer $number
     * @return $this
     */
    public function number($number)
    {
        if (!is_numeric($number))
        {
            throw new InvalidNumberException("Invalid Number Provided. Expecting an Integer or Double.");
        }

        $this->calculation[] = $number;
        return $this;
    }

    public function add()
    {
        $this->calculation[] = '+';
        return $this;
    }

    public function substract()
    {
        $this->calculation[] = '-';
        return $this;
    }

    public function multiply()
    {
        $this->calculation[] = '*';
        return $this;
    }

    public function divide()
    {
        $this->calculation[] = '/';
        return $this;
    }

    public function getCalculation()
    {
        return implode('', $this->calculation);
    }

    public function calculate()
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