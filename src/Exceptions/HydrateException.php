<?php

namespace Src\Exceptions;

use Exception;


class HydrateException extends Exception
{
    private const CLASS_NOT_EXISTS = "
    \n\033[31m----------HydrateException-------\033[0m\n    
    La clase \033[1m\033[31m\"%s\"\033[0m no existe
    Verifique el namespace o el nombre del fichero
    \n\033[31m----------HydrateException-------\033[0m \n\n";

    public static function create(string $class)
    {
        return new self(
            sprintf(self::CLASS_NOT_EXISTS, $class)
        );
    }

}
