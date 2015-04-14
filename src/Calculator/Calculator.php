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

    private function log($message){
        echo "\n".$message;
    }

    /**
     * Will Calculate the Calculation provided.
     * @return Integer
     */
    public function equals()
    {
        $i = 0;
        $calculation = [];
        $iterator = new CalculatorIterator($this->calculation);
        while ($iterator->count() > 1) {
            $this->log("COUNT ".$iterator->count());
            $calculation[$i] = [];
            while ($iterator->valid()) {

                if ($iterator->current() instanceof Number) {
                    $this->log("Adding Number ".$iterator->current()->getNumber());
                    array_push($calculation[$i], $iterator->current());
                }

                if ($iterator->current() instanceof OperatorInterface) {
                    $number1 = $iterator->prev();
                    $number2 = $iterator->next();
                    $result = false;
                    switch ($i) {
                        case 0:
                            if ($iterator->current() instanceof Multiply) {
                                $result = $number1->getNumber() * $number2->getNumber();
                                $this->log($result." = ".$number1->getNumber().' x '.$number2->getNumber());
                            } elseif ($iterator->current() instanceof Divide) {
                                $result = $number1->getNumber() / $number2->getNumber();
                                $this->log($result." = ".$number1->getNumber().' / '.$number2->getNumber());
                            }
                            break;
                        default:
                            if ($iterator->current() instanceof Add) {
                                $result = $number1->getNumber() + $number2->getNumber();
                                $this->log($result." = ".$number1->getNumber().' + '.$number2->getNumber());
                            } elseif ($iterator->current() instanceof Subtract) {
                                $result = $number1->getNumber() - $number2->getNumber();
                                $this->log($result." = ".$number1->getNumber().' - '.$number2->getNumber());
                            }
                            break;
                    }

                    if($result){
                        $this->log("Adding Result ".$result);
                        $result = new Number($result);
                        $iterator->setPrev($result);
                        if(count($calculation[$i]) > 0) {
                            array_pop($calculation[$i]);
                           //$this->log("Removing last item ".$last);
                        }
                        var_dump($iterator->calculation);
                        array_push($calculation[$i], $result);
                        $this->log("Moving Forward");
                        $iterator->forward();
                    }else{
                        $this->log("Adding Operand ".$iterator->current()->getOperand());
                        array_push($calculation[$i], $iterator->current());
                    }
                }
                var_dump(($calculation[$i]));
                $iterator->forward();

            }
            $iterator = new CalculatorIterator($calculation[$i]);
            $i++;
        }

        var_dump($calculation);
        die();
        //some error handling.
        if (!isset($result)) {
            //throw new InvalidCalculationException("Invalid Calculation. Please try again.");
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