# PayExpresse - PHP API Client

This is a simple `SDK Client` or `API Client` for `PayExpresse Online Payment Gateway`.

Check out [PayExpresse Website](https://payexpresse.com/).

## How to use it

First of all, install the package or library via composer

- `composer require papihack/payexpresse-php-client`

After that, setup the API config with your parameters like this :

```php
    \PayExpresse\Config::setApiKey('your_api_key');
    \PayExpresse\Config::setApiSecret('your_api_secret');

    /*
     * you can set one of this two environment TEST or PROD
     * you can just set the env mode via \PayExpresse\Enums\Env::TEST or \PayExpresse\Enums\Env::PROD
     * Like the following example
     * !!! By default env is PROD !!!
     * You can also directly set test or prod as a string if you want
     * Like \PayExpresse\Config::setEnv('test') or \PayExpresse\Config::setEnv('prod')
    */

    \PayExpresse\Config::setEnv(\PayExpresse\Enums\Env::PROD);

    /*
     * The PayExpresse\Enums\Currency class defined authorized currencies
     * You can change XOF (in the following example) by USD, CAD or another currency
     * All allowed currencies are in \PayExpresse\Enums\Currency class
     * !!! Notice that XOF is the default currency !!!
    */

    \PayExpresse\Config::setCurrency(\PayExpresse\Enums\Currency::XOF);

    /* !!! Note that if you decide to set the ipn_url, it must be in https !!! */

    \PayExpresse\Config::setIpnUrl('your_ipn_url');
    \PayExpresse\Config::setSuccessUrl('your_success_url');
    \PayExpresse\Config::setCanceUrl('your_cancel_url');

    /*
     * if you want the mobile success or cancel page, you can set
     * the following parameter
    */

    \PayExpresse\Config::setIsMobile(true);
```

Then you can proceed with :

```php
    $article_price = 15000;
    $article = new \PayExpresse\Invoice\InvoiceItem('article_name', $article_price, 'command_name', 'ref_command');

    /* You can also add custom data or fields like this */

    \PayExpresse\CustomField::set('your_field_name', 'your_field_value');

    /* Make the payment request demand to the API */

    \PayExpresse\PayExpresse::send($article);

    /* Get the API Response */

    $response = [
        'success'      => \PayExpresse\ApiResponse::getSuccess(),
        'errors'       => \PayExpresse\ApiResponse::getErrors(),
        'token'        => \PayExpresse\ApiResponse::getToken(),
        'redirect_url' => \PayExpresse\ApiResponse::getRedirectUrl(),
    ];
```

After that, if you have a success response, you can redirect your user to the `$response['redirect_url']` so that he can make the payment.  
You can process the response as you wish by directly manipulating `\PayExpresse\ApiResponse`.

## TODO

- tests: cover all use cases ✅
- get the support team at [PayExpresse](https://payexpresse.com/) to clarify certain points

## Contributing

Feel free to make a PR or report an issue 😃

Regarding the tests, I use the elegant PHP Testing Framework  [Pest](https://pestphp.com/) 😎

Oh, one more thing, please do not forget to put a description when you make your PR 🙂

## Contributors

- [M.B.C.M](https://itdev.herokuapp.com)
[![My Twitter Link](https://img.shields.io/twitter/follow/the_it_dev?style=social)](https://twitter.com/the_it_dev)
