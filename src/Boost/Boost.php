<?php

namespace Src\Boost;

use Src\Boost\Utils\BoostUtil;
use Src\Exceptions\HydrateException;

class Boost
{
    public static function hydrate(object|string $class, string|array $data)
    {
        if(!is_object($class) && !class_exists($class)){
            throw HydrateException::create($class);
        }

        $dataFromConstructor = BoostUtil::create($class, $data);
        return new $class(...$dataFromConstructor);
    }
}