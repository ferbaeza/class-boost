<?php

namespace Src\Exceptions;

use Exception;

class EntityConstructorException extends Exception
{
    public const BODY = "
    \n\033[31m----------Entity Constructor Exception-------\033[0m\n
    La entidad debe contener atributos en CamelCase \033[1m\033[31m\"%s\"\033[0m 
    \n\033[31m----------Entity Constructor Exception-------\033[0m \n\n";

    public static function create(string $class)
    {
        return new self(
            sprintf(self::BODY, $class)
        );
    }

}
