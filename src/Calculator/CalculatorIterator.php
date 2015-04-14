<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 14/04/15
 * Time: 20:56
 */

namespace src\Calculator;

/**
 * Class CalculatorIterator
 * @package src\Calculator
 */
class CalculatorIterator implements \Iterator
{
    /**
     * @var int
     */
    private $cursor = 0;

    /**
     * @var array
     */
    public $calculation = [];

    /**
     * @param array $calculation
     */
    public function __construct(array $calculation)
    {
        $this->calculation = $calculation;
    }

    /**
     * @return Number|OperatorInterface
     */
    public function current()
    {
        if (!$this->valid()) {
            return false;
        }

        return $this->calculation[$this->cursor];
    }

    /**
     * @return Number|OperatorInterface
     */
    public function next()
    {
        $i = $this->cursor+1;
        if(!isset($this->calculation[$i])){
            return false;
        }
        return $this->calculation[$i];
    }

    /**
     * @return int
     */
    public function count() {
        return count($this->calculation);
    }

    /**
     * @return Number|OperatorInterface
     */
    public function forward()
    {
        $this->cursor++;
        return $this->current();
    }

    /**
     * @return Number|OperatorInterface
     */
    public function prev()
    {
        $i = $this->cursor-1;
        if(!isset($this->calculation[$i])){
            return false;
        }
        return $this->calculation[$i];
    }

    /**
     * @return Number|OperatorInterface
     */
    public function rewind()
    {
        $this->cursor = 0;
        return $this->current();
    }

    public function setPrev($object){
        $i = $this->cursor-1;
        if(!isset($this->calculation[$i])){
            return false;
        }
        $this->calculation[$i] = $object;
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return isset($this->calculation[$this->cursor]) ? true : false;
    }

    /**
     * @return mixed
     */
    public function key()
    {
        return $this->cursor;
    }
}