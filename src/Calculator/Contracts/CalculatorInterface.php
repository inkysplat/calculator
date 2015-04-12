<?php
namespace src\Calculator\Contracts;

/**
 * Interface CalculatorInterface
 * @package src\Calculator\Contracts
 */
interface CalculatorInterface
{
    /**
     * @param integer $number
     * @return Calculator
     */
    public function number($number);

    /**
     * @return Calculator
     */
    public function add();

    /**
     * @return Calculator
     */
    public function substract();

    /**
     * @return Calculator
     */
    public function divide();

    /**
     * @return Calculator
     */
    public function multiply();

    /**
     * @return mixed
     */
    public function equals();
}