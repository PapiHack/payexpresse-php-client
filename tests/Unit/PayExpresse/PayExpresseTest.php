<?php

namespace Tests\Unit\PayExpresse;

use PayExpresse\PayExpresse;

/**
 * 
 * @author PapiHack
 * @since 08/2020
 * 
 */

 it('Should send data', function () {
     PayExpresse::send(new \PayExpresse\Invoice\InvoiceItem('HP Pavillon 15', 260000, 'commande n°1', 'test-ref'));
     $this->assertIsNumeric(\PayExpresse\ApiResponse::getSuccess());
 });

 it('Should have response after sending data', function () {
    $this->assertIsInt(\PayExpresse\ApiResponse::getSuccess());
 });