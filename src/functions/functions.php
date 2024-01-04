<?php

use Src\Boost\Boost;

if(!function_exists('hello')) {
    function hello(string $name)
    {
        return "Hello, $name!";
    }
}

if(!function_exists('hydrate')) {
    function hydrate(object|string $class, string|array $data)
    {
        return Boost::hydrate($class, $data);
    }
}
