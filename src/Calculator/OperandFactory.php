<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 14/04/15
 * Time: 20:44
 */

namespace src\Calculator;

use src\Calculator\Exceptions\InvalidOperandException;

/**
 * Class OperandFactory
 * @package src\Calculator
 */
class OperandFactory
{
    /**
     * Cache the Object creation.
     *
     * @var array
     */
    private static $cache = [];

    /**
     * Will create a new Operand to be added to the calculation
     *
     * @param string $operand
     * @return mixed
     * @throws InvalidOperandException
     */
    public static function create($operand)
    {
        if (isset(self::$cache[$operand])) {
            return self::$cache[$operand];
        }

        $class = 'src\Calculator\Models\\'.ucfirst($operand);
        if (!class_exists($class)) {
            throw new InvalidOperandException(__METHOD__ . '::Invalid Operand Provided..."'.$class.'""');
        }

        $object = new $class();

        self::$cache[$operand] = $object;
        return self::$cache[$operand];
    }
}