<?php

namespace Src\Test\Entidades;

class Persona
{
    public function __construct(
        public string $id,
        public string $nombre,
        public DatosPersonales $datosPersonales,
        public DatosProfesionales $datosProfesionales,
    )
        {
    }

}
