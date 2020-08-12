<?php

namespace Tests\Unit\Utils;

use \PayExpresse\Utils\Serializer;

/**
 * 
 * @author PapiHack
 * @since 08/2020
 * 
 */

it('Should return a String', function() {
    $this->assertIsString((new Serializer(['nom' => 'papi', 'job' => 'coder']))->toQueryString());
 });

 it('Should return a JSON', function() {
    $this->assertJsonStringEqualsJsonString(json_encode(['nom' => 'papi', 'job' => 'coder']), (new Serializer(['nom' => 'papi', 'job' => 'coder']))->toJSONString());
 });

 it('Should return a XML', function() {
    $this->assertXmlStringEqualsXmlString("<custom_field><nom>papi</nom><job>coder</job></custom_field>", 
    (new Serializer(['nom' => 'papi', 'job' => 'coder']))->toXMLString());
 });