<?php

namespace Src\Exceptions\BodyExceptions;


class DataEmptyException extends DataException
{
    public const BODY = "
    \n\033[31m----------Data-Empty-Exception-------\033[0m\n
    El array de datos \033[1m\033[31m\"%s\"\033[0m 
    \n\033[31m----------Data-Empty-Exception-------\033[0m \n\n";

}
