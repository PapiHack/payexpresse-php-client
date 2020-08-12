<?php

namespace PayExpresse;

/**
 * 
 * @author PapiHack
 * @since 08/2020
 * 
 */
abstract class ApiResponse extends PayExpresse
{
    private static $success;
    private static $token;
    private static $errors;
    private static $redirectUrl;

    public static function getSuccess() 
    {
        return self::$success;
    }

    public static function getToken() 
    {
        return self::$token;
    }

    public static function getErrors() 
    {
        return self::$errors;
    }

    public static function getRedirectUrl() 
    {
        return self::$redirectUrl;
    }

    public static function setSuccess($success) 
    {
        self::$success = $success;
    }

    public static function setToken($token) 
    {
        self::$token = $token;
    }

    public static function setErrors($errors) 
    {
        self::$errors = $errors;
    }

    public static function setRedirectUrl($redirectUrl) 
    {
        self::$redirectUrl = $redirectUrl;
    }
} 