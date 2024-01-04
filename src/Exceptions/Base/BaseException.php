<?php

namespace Src\Exceptions\Base;

use Exception;


class BaseException extends Exception
{
    protected static $messages = [];

    public static function create()
    {
        return new static(static::$messages[static::class]);
    }
}