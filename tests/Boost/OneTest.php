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
}
