<?php

namespace Src\Test\Entidades;

class Uno
{
    public function __construct(
        public string $nombrePropio,
        public string $apellidoUno,
        public string $apellidoDos,
        public string $email,
        public string $direccion,
        public string $direccionCompleta,
        public string $nickname,
        public string $privateNickname,
    )
        {
    }
}