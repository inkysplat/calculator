<?php

namespace src\Calculator;

use src\Calculator\Contracts\CalculatorInterface;
use src\Calculator\Contracts\OperatorInterface;
use src\Calculator\Exceptions\InvalidCalculationException;
use src\Calculator\Exceptions\InvalidNumberException;
use src\Calculator\Models\Add;
use src\Calculator\Models\Divide;
use src\Calculator\Models\Multiply;
use src\Calculator\Models\Number;
use src\Calculator\Models\Subtract;

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
        if(count($this->calculation) > 0 && !(end($this->calculation) instanceof OperatorInterface)){
            throw new InvalidCalculationException("Expecting Operand Next");
        }

        $this->calculation[] = new Number($number);
        return $this;
    }

    /**
     * Will add an Addition Operand into the Calculation.
     * @return $this
     */
    public function add()
    {
        if(count($this->calculation) > 0 && !(end($this->calculation) instanceof Number)){
            throw new InvalidCalculationException("Expecting Number Next");
        }

        $this->calculation[] = OperandFactory::create('Add');
        return $this;
    }

    /**
     * Will add a Substraction Operand into the Calculation.
     * @return $this
     */
    public function substract()
    {
        if(count($this->calculation) > 0 && !(end($this->calculation) instanceof Number)){
            throw new InvalidCalculationException("Expecting Number Next");
        }

        $this->calculation[] = OperandFactory::create('Subtract');
        return $this;
    }

    /**
     * Will add a Multiplication Operand into the Calculation.
     * @return $this
     */
    public function multiply()
    {
        if(count($this->calculation) > 0 && !(end($this->calculation) instanceof Number)){
            throw new InvalidCalculationException("Expecting Number Next");
        }

        $this->calculation[] = OperandFactory::create('Multiply');
        return $this;
    }

    /**
     * Will add a Division Operand into the Calculation.
     * @return $this
     */
    public function divide()
    {
        if(count($this->calculation) > 0 && !(end($this->calculation) instanceof Number)){
            throw new InvalidCalculationException("Expecting Number Next");
        }

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
        foreach ($this->calculation as $part) {
            if ($part instanceof Number) {
                $calculation .= $part->getNumber();
            }

            if ($part instanceof OperatorInterface) {
                $calculation .= $part->getOperand();
            }
        }
        return $calculation;
    }

    /**
     * Finds Previous Item in the Array
     * @param array $calculations
     * @param integer $prev
     * @return mixed
     */
    private function findPrev($calculations, $prev)
    {
        $prev = ($prev - 1);
        while ($prev > 0 && $calculations[$prev] == '') {
            $prev = ($prev - 1);
            if ($prev < 0) {
                return false;
            }
        }
        return $prev;
    }

    /**
     * Finds Next Item in the Array
     * @param array $calculations
     * @param integer $next
     * @return bool
     */
    private function findNext($calculations, $next)
    {
        $next = ($next + 1);
        if (isset($calculations[$next])) {
            return $next;
        }
        return false;
    }

    /**
     * Will strip out any empty values from the array that we may have spliced out...
     * @param array $calculations
     * @return array
     */
    private function filterCalculations($calculations)
    {
        $temp = [];
        foreach ($calculations as $calc) {
            if ($calc !== '') {
                $temp[] = $calc;
            }
        }
        return $temp;
    }


    /**
     * Will Calculate the Calculation provided.
     * @return Integer
     */
    public function equals()
    {
        $i = 0;
        $calculations = $this->calculation;
        while (count($calculations) > 1) {
            for ($j = 0; $j < count($calculations); $j++) {
                if ($calculations[$j] instanceof OperatorInterface) {

                    $result = false;
                    $next = $this->findNext($calculations, $j);
                    $prev = $this->findPrev($calculations, $j);

                    if ($prev !== false && $next !== false) {
                        $number1 = $calculations[$prev]->getNumber();
                        $number2 = $calculations[$next]->getNumber();

                        if ($i == 0) {
                            if ($calculations[$j] instanceof Multiply) {
                                $result = $number1 * $number2;
                            }
                            if ($calculations[$j] instanceof Divide) {
                                $result = $number1 / $number2;
                            }
                        } else {
                            if ($calculations[$j] instanceof Add) {
                                $result = $number1 + $number2;
                            }
                            if ($calculations[$j] instanceof Subtract) {
                                $result = $number1 - $number2;
                            }
                        }
                    }

                    //we have to use a strict type comparison here because dividing
                    //by 0 results in false as a result of the calculation
                    if ($result !== false) {
                        $calculations[$j] = '';
                        if (isset($calculations[$next]))
                            $calculations[$next] = '';
                        $number = new Number($result);
                        $calculations[$prev] = $number;
                        $calculations = $this->filterCalculations($calculations);
                    }
                }
            }

            //filter our calculation array so there's no blank values left in it...
            //this is a weird way of working but array_filter() wasn't working.
            $calculations = $this->filterCalculations($calculations);
            $i++;
        }

        //we can assume we've got 1 number left!
        return $calculations[0]->getNumber();
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