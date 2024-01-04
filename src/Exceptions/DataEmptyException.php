<?php

namespace Src\Exceptions;

use Exception;

class DataEmptyException extends Exception
{
    public const BODY = "
    \n\033[31m----------DataEmptyException-------\033[0m\n
    El array de datos \033[1m\033[31m\"%s\"\033[0m 
    \n\033[31m----------DataEmptyException-------\033[0m \n\n";

    public static function create(string $class)
    {
        return new self(
            sprintf(self::BODY, $class)
        );
    }

}
