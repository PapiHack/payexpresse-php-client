<?php

namespace PayExpresse\Utils;

use Requests;

/**
 * 
 * @author PapiHack
 * @since 08/2020
 * 
 */
abstract class MakeRequest 
{

    private static $headers = [];

    private static $timeout = 15;

    public static function getHeaders() 
    {
        return self::$headers;
    }

    public static function getTimeout() 
    {
        return self::$timeout;
    }

    public static function setHeaders($headers) 
    {
        self::$headers = $headers;
    }

    public static function setTimeout($timeout) 
    {
        self::$timeout = $timeout;
    }

    public static function json($url, $data = [], $headers = []) 
    {
        self::setHeaders([
            'Content-Type' => 'application/json;charset=utf-8',
            'API_KEY'      => \PayExpresse\Config::getApiKey(),
            'API_SECRET'   => \PayExpresse\Config::getApiSecret()
        ]);

        array_merge(self::$headers, $headers);

        $jsonPayload = json_encode($data);

        $response = Requests::post($url, self::$headers, $jsonPayload, ['timeout' => self::$timeout]);

        return json_decode($response->body, true);
    }

    public static function post($url, $data = [], $headers = []) 
    {
        self::setHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded;charset=utf-8',
            'API_KEY'      => \PayExpresse\Config::getApiKey(),
            'API_SECRET'   => \PayExpresse\Config::getApiSecret()
        ]);

        array_merge(self::$headers, $headers);

        $response = Requests::post($url, self::$headers, $data, ['timeout' => self::$timeout]);

        return json_decode($response->body, true);
    }

    public static function get($url, $headers = []) 
    {
        self::setHeaders([
            'API_KEY'     => \PayExpresse\Config::getApiKey(),
            'API_SECRET'  => \PayExpresse\Config::getApiSecret()
        ]);

        array_merge(self::$headers, $headers);

        $response = Requests::get($url, self::$headers, ['timeout' => self::$timeout]);

        return json_decode($response->body, true);
    }
    
}