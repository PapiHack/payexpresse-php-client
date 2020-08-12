<?php

namespace PayExpresse\Utils;

use PayExpresse\Enums\Currency;
use PayExpresse\Enums\Environment;

/**
 * 
 * @author PapiHack
 * @since 08/2020
 * 
 */
abstract class Check
{ 
    public static function isCurrencyAllowed($currency) 
    {
        return defined(Currency::class .'::'. strtoupper($currency));
    }

    public static function isEnvAllowed($env)
    {
        return defined(Environment::class .'::'. strtoupper($env));
    }
}