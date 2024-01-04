<?php

namespace Tests\Boost;

use Src\Test\Entidades\Uno;
use PHPUnit\Framework\TestCase;
use Src\Test\Entidades\Persona;

class BoostHydrateComplexClassTest extends TestCase
{
    /** @test*/
    public function hidratar_clase_compleja()
    {
        $this->markTestIncomplete("No se ha implementado aun");
        $data = [
            "id" => "id",
            "nombre" => "Fernando",
            "datosPersonales" => $this->DatosPersonales(),
            "datosProfesionales" => $this->DatosProfesionales(),
        ];
        $spectedEntity = hydrate(Persona::class, $data);
        $this->assertInstanceOf(Persona::class, $spectedEntity);
        $this->assertEquals("Fernando", $spectedEntity->nombre);
        $this->assertEquals("Baeza", $spectedEntity->datosPersonales->apellido);
        $this->assertEquals("junior", $spectedEntity->datosProfesionales->cargo);
    }
    
    public function DatosPersonales()
    {
        return [
            "nombre" => "Fernando",
            "apellido" => "Baeza",
            "email" => "fer@mail.com",
            "direccion" => "mi direccion",
            "nickname" => "baezeta",
        ];
    }

    public function DatosProfesionales()
    {
        return [
            "profesion" => "programador",
            "cargo" => "junior",
            "empresa" => "zataca",
            "direccion" => "mi direccion",
            "telefono" => "mi telefono",
        ];
    }
}