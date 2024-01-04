<?php

namespace Src\Exceptions\Base;

use Exception;

class MainException extends Exception
{
    protected static array $messages =[];

    public static function create($str = '')
    {
        $message = static::$messages[static::class];
        $finalMessage = str_replace('%s', $str, $message);
        return new static($finalMessage);

    }

}
