<?php

namespace Src\Exceptions\BodyExceptions;

use Src\Exceptions\Base\MainException;

class EntityConstructorException extends MainException
{
    public const BODY = "
    \n\033[31m----------Entity Constructor Exception-------\033[0m\n
    La entidad debe contener atributos en CamelCase \033[1m\033[31m\"%s\"\033[0m 
    \n\033[31m----------Entity Constructor Exception-------\033[0m \n\n";

    protected static array $messages = [
        self::class => self::BODY
    ];


}
