<?php

namespace Src\Exceptions\BodyExceptions;


use Src\Exceptions\Base\MainException;

class DataException extends MainException
{

    public const BODY = "
    \n\033[31m----------Data--Exception-------\033[0m\n
    El array de datos \033[1m\033[31m\"%s\"\033[0m 
    \n\033[31m----------Data--Exception-------\033[0m \n\n";

    protected static array $messages = [
        self::class => self::BODY,
        DataEmptyException::class => DataEmptyException::BODY
    ];

}
