<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 14/04/15
 * Time: 19:44
 */

namespace src\Calculator\Contracts;

/**
 * Interface OperatorInterface
 * @package src\Calculator\Contracts
 */
interface OperatorInterface {

    /**
     * @return string
     */
    public function getOperand();
}