<?php

namespace Framework;

use ReflectionClass;

class Container{
    private array $bindings = [];
    public function set($class , $value){
      $this->bindings[$class]= $value;
    }
    public function get ($class){
        if(array_key_exists($class,$this->bindings)){
             return $this->bindings[$class]();
        }
        $reflectionClass= new ReflectionClass($class);
          // dump($reflectionClass);
          if($reflectionClass->getConstructor() === null){
            return new $class;
          }
          $paramsArray = $reflectionClass->getConstructor()->getParameters();
          $newArray = [];
           foreach($paramsArray as $param ){
            // dump($param->getType());
            if($param->getType() === null){
              exit("You must have to add the type of the parameter {$param->getName()} arguments");
            }
            $subClass = (string) $param->getType();
            $newArray[] = $this->get($subClass);
           }
          //  dump($newArray);
        // exit;
        return new $class(...$newArray);

    }
}