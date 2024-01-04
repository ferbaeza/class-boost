<?php

namespace Src\Test\Entidades;

class DatosProfersionales
{
    public function __construct(
        public string $profesion,
        public string $cargo,
        public string $empresa,
        public string $direccion,
        public string $telefono,
    )
    {
    }
}
