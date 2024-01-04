<?php

namespace Tests\One;

use Src\Boost\Boost;
use Src\Test\Clases\Uno;
use Src\Test\Clases\Old;
use PHPUnit\Framework\TestCase;
use Src\Exceptions\DataEmptyException;

class ClasesTest extends TestCase
{
    /** @test*/
    public function comprobar_clase_uno()
    {
        $uno = new Old("nombre", "apellido", "email", "direccion", "nickname");
        $this->assertEquals("nombre", $uno->nombre);
    }

    /** @test*/
    public function comprobar_clase_uno_from_array()
    {
        $data = [
            "nombre" => "nombre",
            "apellido" => "apellido",
            "email" => "email",
            "direccion" => "direccion",
            "nickname" => "nickname",
        ];
        $check = new Old(...array_values($data));
        $this->assertEquals("apellido", $check->apellido);
    }

    /** @test*/
    public function comprobar_clase_uno_from_boost()
    {
        $data = [
            "nombre_propio" => "Fernando",
            "apellido_uno" => "Baeza",
            "apellido_dos" => "Hurtado",
            "email" => "eee@mail.com",
            "direccion" => "mi direccion",
            "direccion_completa" => "mi direccion completa",
            "nickname" => "baezeta",
            "private_nickname" => "baezeta",
            "edad" => 41,
        ];
        $check = Boost::hydrate(Uno::class, $data);
        $this->assertEquals("Baeza", $check->apellidoUno);
    }

    /** @test*/
    public function comprobar_clase_uno_from_boost_con_array_vacio()
    {
        $this->expectException(DataEmptyException::class);
        $data = [];
        $check = Boost::hydrate(Uno::class, $data);
        $this->assertEquals("apellido", $check->apellido);
    }
}