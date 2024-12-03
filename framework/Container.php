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
            return $this->bindings;
        }
        $reflectionClass= new ReflectionClass($class);
        //   dump($reflectionClass);
          if($reflectionClass->getConstructor() === null){
            return new $class;
          }
          $paramsArray = $reflectionClass->getConstructor()->getParameters();
          $newArray = [];
           foreach($paramsArray as $param ){
            // dump($param);
            $subClass = $param->getType()->getName();
            $newArray[] = $this->get($subClass);
           }
           dump($newArray);
        // exit;
        return new $class(...$newArray);

    }
}