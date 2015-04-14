<?php

namespace src\Calculator\Exceptions;

/**
 * Class InvalidOperandException
 * @package src\Calculator\Exceptions
 */
class InvalidOperandException extends \Exception
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