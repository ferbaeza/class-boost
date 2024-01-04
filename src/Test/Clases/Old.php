<?php

namespace Src\Test\Clases;

class Old
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