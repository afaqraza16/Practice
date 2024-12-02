<?php

namespace Framework;

use ReflectionMethod;

class Dispatcher{
    private Router $router;
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function handleUrl($url){
        if($detail = $this->router->match($url)){
            $namespace = "App\\Controllers\\";
            dump($detail);
           // require_once "$namespace". ucfirst($detail['controller']).".php";
        //    $controller = $namespace.ucfirst($detail['controller']);

           $classname = ucwords($detail['controller'],"-");
           $classname = str_replace("-","",$classname);
           $controller = $namespace.$classname;

           $action = $detail['action'];
           $action = ucwords($detail['action'],'-');
           $action = str_replace("-","",$action);
           $action = lcfirst($action);
           $viewer = new Viewer;
           $class = new $controller($viewer);
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