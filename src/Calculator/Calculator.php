<?php

namespace src\Calculator;

/**
 * Class Calculator
 * @package src\Calculator
 */
class Calculator
{
    /**
     * Default Constructor.
     */
    public function __construct(){
        return;
    }

    public function calculate($calculation)
    {
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