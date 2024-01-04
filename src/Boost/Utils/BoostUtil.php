<?php

namespace Src\Boost\Utils;

use ReflectionClass;
use Src\Boost\Entity\Entidad;
use Src\Exceptions\BodyExceptions\DataEmptyException;
use Src\Exceptions\BodyExceptions\EntityConstructorException;

class BoostUtil
{
    private const DATA_EMPTY = "is empty";
    private static array $constructor = [];


    public static function create(object|string $class, array|string $data)
    {
        $data = self::verify($data);
        $constructor = self::verificarConstructor($class);

        $dataObject =[];
        foreach($constructor as $value){
            $dataObject[$value] = $data[$value];
        }
        return $dataObject;
    }

    protected static function verificarConstructor(object|string $class)
    {
        self::getConstructorParameters($class);
        $errorConstructor = self::verificarAtributosConstructor();
        if($errorConstructor){
            throw EntityConstructorException::create($errorConstructor);
        }
        return self::$constructor;
    }
    
    protected static function getConstructorParameters(object|string $class)
    {
        $reflection = new ReflectionClass($class);
        $constructor = $reflection->getConstructor();
        foreach ($constructor->getParameters() as $parameter) {
            self::$constructor[] = $parameter->getName();
        }
    }


    protected static function verificarAtributosConstructor()
    {
        $errors = null;
        foreach (self::$constructor as $value) {
            if(str_contains($value, '_')){
                $errors .= "{$value} ";
            }
        }
        return $errors;
    }


    public static function verify(string|array $data)
    {
        if (is_array($data)) {
            if (empty($data)) {
                throw DataEmptyException::create(self::DATA_EMPTY);
            }
            return BoostDataUtil::arrayData($data);
        }
        if (is_string($data)) {
            $isJson = BoostDataUtil::jsonVerify($data);
            if ($isJson) {
                $data = json_decode($data, true);
                if (empty($data)) {
                    throw DataEmptyException::create(self::DATA_EMPTY);
                }
                return BoostDataUtil::arrayData($data);
            }
        }
    }
}
