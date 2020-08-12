<?php

namespace Tests\Unit\PayExpresse;

use \PayExpresse\ApiResponse;

/**
 * 
 * @author PapiHack
 * @since 08/2020
 * 
 */

 it('Should have token, success, errors & redirectUrl static attributes', function () {
     $this->assertClassHasStaticAttribute('success', ApiResponse::class);
     $this->assertClassHasStaticAttribute('token', ApiResponse::class);
     $this->assertClassHasStaticAttribute('errors', ApiResponse::class);
     $this->assertClassHasStaticAttribute('redirectUrl', ApiResponse::class);
 });


 it('Shoud set dummy values', function () {
     ApiResponse::setErrors('Fatal Error');
     ApiResponse::setSuccess(1);
     ApiResponse::setToken('dumytoken54545a4s5a');
     ApiResponse::setRedirectUrl('http://localhost');
     $this->assertIsInt(ApiResponse::getSuccess());
     $this->assertIsString(ApiResponse::getToken());
     $this->assertIsString(ApiResponse::getErrors());
     $this->assertIsString(ApiResponse::getRedirectUrl());
 });
