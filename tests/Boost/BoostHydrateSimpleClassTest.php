<?php

namespace Tests\Boost;

use Src\Boost\Boost;
use Src\Test\Entidades\Old;
use Src\Test\Entidades\Uno;
use PHPUnit\Framework\TestCase;
use Src\Exceptions\BodyExceptions\DataEmptyException;

class BoostHydrateSimpleClassTest extends TestCase
{
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
        $spectedEntity = new Old(...array_values($data));
        $this->assertInstanceOf(Old::class, $spectedEntity);
        $this->assertEquals("apellido", $spectedEntity->apellido);
    }

    /** @test*/
    public function hidratar_clase_desde_array_datos()
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
        $spectedEntity = hydrate(Uno::class, $data);
        $this->assertInstanceOf(Uno::class, $spectedEntity);
        $this->assertEquals("Baeza", $spectedEntity->apellidoUno);
    }

    /** @test*/
    public function hidratar_clase_desde_json_datos()
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
        $data = json_encode($data);
        $spectedEntity = hydrate(Uno::class, $data);
        $this->assertInstanceOf(Uno::class, $spectedEntity);
        $this->assertEquals("Baeza", $spectedEntity->apellidoUno);
    }

    /** @test*/
    public function intentar_hidratar_una_clase_n_numero_de_veces()
    {
        $data = [
            "nombre" => "fer",
            "apellido" => "baeza",
            "email" => "email@mail.com",
            "direccion" => "Villena",
            "nickname" => "baezeta",
        ];
        $start = microtime(true);
        for ($i = 0; $i < 10000; $i++) {
            $spectedEntity = hydrate(Old::class, $data);
            $this->assertInstanceOf(Old::class, $spectedEntity);
        }
        $end = microtime(true);
        $time = $end - $start;
        dd($time);
    }

    /** @test*/
    public function error_al_intentar_hidratar_una_clase_con_un_array_vacio()
    {
        $this->expectException(DataEmptyException::class);

        $data = [];
        $check = Boost::hydrate(Uno::class, $data);
    }
}