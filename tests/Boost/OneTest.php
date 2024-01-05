<?php

namespace Tests\One;

use Src\Test\Entidades\Old;
use PHPUnit\Framework\TestCase;

class OneTest extends TestCase
{
    /** @test */
    public function testOne(): void
    {
        $fun = hello("Mundo");
        $this->assertEquals("Hello, Mundo!", $fun);
    }

    /** @test*/
    public function comprobar_clase_uno()
    {
        $uno = new Old("nombre", "apellido", "email", "direccion", "nickname");
        $this->assertEquals("nombre", $uno->nombre);
    }

    /** @test*/
    public function comprobar_variable()
    {
        $test = "test";
        $defined = get_defined_vars();
        $this->assertArrayHasKey("test", $defined);
    }
}
