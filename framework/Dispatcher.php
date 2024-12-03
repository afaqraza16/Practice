<?php

namespace Framework;

use App\Database;
use App\Models\NewsModel;
use ReflectionClass;
use ReflectionMethod;

class Dispatcher{
    private Router $router;
    private Container $container;
    public function __construct(Router $router, Container $container)
    {
        $this->router = $router;
        $this->container  = $container;
    }
    public function handleUrl($url){
        if($detail = $this->router->match($url)){
            // dump($detail);
            $namespace = "App\\Controllers\\";
           $classname = ucwords($detail['controller'],"-");
           $classname = str_replace("-","",$classname);
           $controller = $namespace . $classname;
           $action = $detail['action'];
           $action = ucwords($detail['action'],'-');
           $action = str_replace("-","",$action);
           $action = lcfirst($action);
           $class = $this->container->get($controller);
        //    dump($class);
           $reflectionMethod = new ReflectionMethod($controller,$action);
           $parameters = $reflectionMethod->getParameters();
           $paramArray = [];
           foreach($parameters as $param){
            $paramArray[$param->getName()]= $detail[$param->getName()];
           }
           $class->$action(...$paramArray);
        }
        else{
           dump("Route Not Found");
        }
    }
 
}