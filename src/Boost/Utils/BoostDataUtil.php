<?php

namespace Src\Boost\Utils;

class BoostDataUtil
{
    public static function arrayData(array $data)
    {
        return self::verifyArrayData($data);
    }

    protected static function verifyArrayData(string|array $data)
    {
        $newData = [];
        foreach ($data as $key => $value) {
            $newkey = self::verifyKey($key);
            $newData[$newkey] = $value;
        }
        return $newData;
    }

    protected static function verifyKey(string &$key)
    {
        if (!is_string($key)) {
            throw new \Exception("Key {$key} is not a string");
        }
        $key = ucwords($key, " \t\r\n\f\v-_");
        $key = str_replace(['-', '_'], '', $key);
        $key = lcfirst($key);

        return $key;
    }

    public static function jsonVerify(string $data)
    {
        dd($data);
    }
}
