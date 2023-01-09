<?php
namespace Framework;

use Laminas\Code\Reflection\ClassReflection;

class Service
{
    public static function make(string $class, array $methodParameters = []): object
    {
        $classReflection = new ClassReflection($class);



        return $classReflection;
    }
}
