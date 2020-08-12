<?php

namespace PayExpresse\Exceptions;

use Exception;

/**
 * 
 * @author PapiHack
 * @since 08/2020
 * 
 */
class CurrencyException extends Exception
{

    public function __construct($message, $code = 0)
    {
        parent::__construct($message, $code);
    }

    public function __toString()
    {
        return 'The message => '. $this->message;
    }
}
