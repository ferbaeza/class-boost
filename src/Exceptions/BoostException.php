<?php

namespace Src\Exceptions;

use Src\Exceptions\Base\BaseException;

class BoostException extends BaseException
{
    protected static $messages = [
        ClaseException::class => ClaseException::MESSAGE,
    ];


}
