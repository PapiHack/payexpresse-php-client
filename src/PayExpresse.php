<?php

namespace PayExpresse;

use PayExpresse\Invoice\InvoiceItem;
use PayExpresse\Utils\MakeRequest;

/**
 * 
 * @author PapiHack
 * @since 08/2020
 * 
 */
abstract class PayExpresse 
{
    const VERSION      = "1.0.0";
    const VERSION_NAME = "PayExpresse PHP SDK Client v1 aka Sasuke";

    public static function send(InvoiceItem $invoiceItem) 
    {
        $response = MakeRequest::post(Config::ROOT_URL_BASE . Config::PAYMENT_REQUEST_PATH, [
            'item_name'    => $invoiceItem->getName(),
            'item_price'   => $invoiceItem->getPrice(),
            'command_name' => $invoiceItem->getCommandName(),
            'ref_command'  => $invoiceItem->getRefCommand(),
            'env'          => Config::getEnv(),
            'currency'     => Config::getCurrency(),
            'ipn_url'      => Config::getIpnUrl(),
            'success_url'  => Config::getIsMobile() ? Config::MOBILE_SUCCESS_URL : Config::getSuccessUrl(),
            'cancel_url'   => Config::getIsMobile() ? Config::MOBILE_CANCEL_URL : Config::getCancelUrl(),
            'custom_field' => CustomField::retrieve()->toJSONString()
        ], []);

        // @codeCoverageIgnoreStart
        if (array_key_exists('token', $response)) 
        {
            ApiResponse::setSuccess(1);
            ApiResponse::setToken($response['token']);
            ApiResponse::setRedirectUrl(Config::ROOT_URL_BASE . Config::PAYMENT_REDIRECT_PATH . $response['token']);
        }
        else if (array_key_exists('error', $response)) 
        {
            ApiResponse::setSuccess(-1);
            ApiResponse::setErrors($response['error']);
        }
        else if (array_key_exists('message', $response)) 
        {
            ApiResponse::setSuccess(-1);
            ApiResponse::setErrors($response['message']);
        }
        else 
        {
            ApiResponse::setSuccess(-1);
            ApiResponse::setErrors(['Internal Error']);
        }
        // @codeCoverageIgnoreEnd

    }
}