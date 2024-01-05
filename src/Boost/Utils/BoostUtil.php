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
        $constructor = self::verificarConstructor($class, $data);
        dd(self::$constructor, $constructor, 20);
        // return $entidad;
    }

    protected static function verificarConstructor(object|string $class, array|string $data)
    {
        $reflection = new ReflectionClass($class);
        $constructor = $reflection->getConstructor();
        $errorConstructor = self::verificarAtributosConstructor($constructor);

        if($errorConstructor){
            throw EntityConstructorException::create($errorConstructor);
        }
        self::getConstructorParameters($constructor, $data);
    }
    
    protected static function getConstructorParameters(object $constructor, array|string $data)
    {
        foreach ($constructor->getParameters() as $parameter) {
            $className = end(explode('\\',$constructor->class));
            // dd($parameter->getName(), $parameter->getType(), end(explode('\\',$constructor->class)));
            $type = $parameter->getType();
            if ($type->isBuiltin()) {
                self::$constructor[$className][$parameter->getName()] = $data[$parameter->getName()];
            }
            if(!$type->isBuiltin()){
                if(class_exists(ucfirst($type->getName()))){
                    self::create($type->getName(), $data[$parameter->getName()]);
                }
            }
        }
    }
        
        
    protected static function verificarAtributosConstructor(object $constructor)
    {
        $errors = null;
        foreach ($constructor->getParameters() as $parameter) {
            if(str_contains($parameter->getName(), '_')){
                $errors .= "{$parameter->getName()} ";
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
