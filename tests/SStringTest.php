<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PhpHelpers\Tests;

use PhpHelpers\Library\SString;
/**
 * Description of SStringTest
 *
 * @author can.ngo
 */
final class SStringTest extends TestCase {
    
    public $string1 = null;
    public $string2 = null;
    
    function setUp(): void
    {
        $this->string1 = 'Bonjour le monde ! Bonjour la vie ! Bonjour les autres !';
        $this->string2 = 'Il fait de plus en plus chaud ...';
    }
    /* ************************************************* */
    /* ************ SString::str_replace_last ********** */
    /* ************************************************* */
    /**
     *
     */
    public function testCanReplaceLast()
    {
        $test = SString::str_replace_last('Bonjour', 'Hello', $this->string1);
        $this->assertIsString($test);
        $this->assertStringContainsString('Hello', $test);
    }
    /**
     *
     */
    public function testCannotReplaceLast()
    {
        $test = SString::str_replace_last('Au revoir', 'Hello', $this->string1);
        $this->assertIsString($test);
        $this->assertStringNotContainsString('Hello', $test);
    }
    /* ************************************************* */
    /* *************** SString::starts_with ************ */
    /* ************************************************* */
    /**
     *
     */
    public function testCanSartWith()
    {
        $test = SString::starts_with($this->string1, 'Bonjour');
        $this->assertIsBool($test);
        $this->assertTrue($test);
    }
    /**
     *
     */
    public function testCannotSartWith()
    {
        $test = SString::starts_with($this->string1, 'Au revoir');
        $this->assertIsBool($test);
        $this->assertFalse($test);
    }
    /* ************************************************* */
    /* *************** SString::ends_with ************** */
    /* ************************************************* */
    /**
     *
     */
    public function testCanEndWith()
    {
        $test = SString::ends_with($this->string1, 'les autres !');
        $this->assertIsBool($test);
        $this->assertTrue($test);
    }
    /**
     *
     */
    public function testCannotEndWith()
    {
        $test = SString::ends_with($this->string1, 'les autres');
        $this->assertIsBool($test);
        $this->assertFalse($test);
    }
}
