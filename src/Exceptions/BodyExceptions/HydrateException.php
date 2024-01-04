<?php

namespace Src\Exceptions\BodyExceptions;

use Src\Exceptions\Base\MainException;

class HydrateException extends MainException
{
    private const CLASS_NOT_EXISTS = "
    \n\033[31m----------HydrateException-------\033[0m\n    
    La clase \033[1m\033[31m\"%s\"\033[0m no existe
    Verifique el namespace o el nombre del fichero
    \n\033[31m----------HydrateException-------\033[0m \n\n";

    protected static array $messages = [
        self::class => self::CLASS_NOT_EXISTS
    ];

}
