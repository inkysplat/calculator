<?php

namespace src\Calculator\Exceptions;

/**
 * Class InvalidCalculationException
 * @package src\Calculator\Exceptions
 */
class InvalidCalculationException extends \Exception
{

    /**
     * Triggers a native PHP Exception
     *
     * @param string $message
     * @param int $code
     * @param null|Exception $previous
     */
    public function __construct($message = '', $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}