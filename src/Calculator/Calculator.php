<?php

namespace src\Calculator;

use src\Calculator\Contracts\CalculatorInterface;
use src\Calculator\Contracts\OperatorInterface;
use src\Calculator\Exceptions\InvalidCalculationException;
use src\Calculator\Exceptions\InvalidNumberException;
use src\Calculator\Models\Number;

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
    public function __construct()
    {
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
        $this->calculation[] = new Number($number);
        return $this;
    }

    /**
     * Will add an Addition Operand into the Calculation.
     * @return $this
     */
    public function add()
    {
        $this->calculation[] = OperandFactory::create('Add');
        return $this;
    }

    /**
     * Will add a Substraction Operand into the Calculation.
     * @return $this
     */
    public function substract()
    {
        $this->calculation[] = OperandFactory::create('Subtract');
        return $this;
    }

    /**
     * Will add a Multiplication Operand into the Calculation.
     * @return $this
     */
    public function multiply()
    {
        $this->calculation[] = OperandFactory::create('Multiply');
        return $this;
    }

    /**
     * Will add a Division Operand into the Calculation.
     * @return $this
     */
    public function divide()
    {
        $this->calculation[] = OperandFactory::create('Divide');
        return $this;
    }

    /**
     * Will generate our Calculation as a String
     * @return string
     */
    public function getCalculation()
    {
        $calculation = '';
        foreach($this->calculation as $part){
            if($part instanceof Number){
                $calculation.= $part->getNumber();
            }

            if($part instanceof OperatorInterface){
                $calculation.= $part->getOperand();
            }
        }
        return $calculation;
    }

    /**
     * Will Calculate the Calculation provided.
     * @return Integer
     */
    public function equals()
    {


        //some error handling.
        if (!isset($result)) {
            throw new InvalidCalculationException("Invalid Calculation. Please try again.");
        }

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