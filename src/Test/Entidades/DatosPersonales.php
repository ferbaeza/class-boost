<?php

namespace Src\Test\Entidades;

class DatosPersonales
{
    public function __construct(
        public string $nombre,
        public string $apellido,
        public string $email,
        public string $direccion,
        public string $nickname,
    )
    {
    }

}
