<?php

namespace src\Calculator;

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

    public function calculate()
    {
        $calculation = implode('', $this->calculation);
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