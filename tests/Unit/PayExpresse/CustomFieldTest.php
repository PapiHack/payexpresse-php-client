<?php

namespace Tests\Unit\PayExpresse;

use \PayExpresse\CustomField;

/**
 * 
 * @author PapiHack
 * @since 08/2020
 * 
 */

 it('Shoud have a static property named data', function () {
     $this->assertClassHasStaticAttribute('data', CustomField::class);
});

test('The data property should be an empty Array', function () {
    $this->assertIsArray(CustomField::retrieve()->getData());
    $this->assertEmpty(CustomField::retrieve()->getData());
});

test('data property should be an empty Array', function () {
    CustomField::push(['test' => 'this is a test']);
    $this->assertNotEmpty(CustomField::retrieve()->getData());
});

it('Shoud have an entry named test', function () {
    CustomField::push(['test' => 'this is a test']);
    $this->assertTrue(array_key_exists('test', CustomField::retrieve()->getData()));
});

it('Shoud have an entry named test & price', function () {
    CustomField::push(['test' => 'this is a test']);
    CustomField::set('price', 500);
    $this->assertTrue(array_key_exists('test', CustomField::retrieve()->getData()));
    $this->assertTrue(array_key_exists('price', CustomField::retrieve()->getData()));
    $this->assertEquals(2, count(CustomField::retrieve()->getData()));
});

it('Shoud set an dummy entry', function () {
    CustomField::set('dummy', 'test');
    $this->assertTrue(array_key_exists('dummy', CustomField::retrieve()->getData()));
    $this->assertEquals(3, count(CustomField::retrieve()->getData()));
});

it('Shoud get dummy value', function () {
    $this->assertIsString(CustomField::find('dummy'));
});

it('Should raise an exception when an entry not exist', function () {
    $this->expectException(\Exception::class);
    CustomField::find('nothin');
});