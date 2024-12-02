<?php
namespace Framework;
class Router{

    public array $routes = [];
   

    public function addToRoutes ($path, $details=[]){
        $this->routes[$path] = $details;
    }
    public function match($path):array|bool{
        $path =  trim($path,"/");

        foreach($this->routes as $route => $detail){
            // dump($route);
          $pattern =   $this->changeRouteRegex($route);
        if(preg_match($pattern,$path,$matches)){
            $matches = array_filter($matches,"is_string",ARRAY_FILTER_USE_KEY);
            $combine_array = $matches + $detail;
            return $combine_array;
        }else{
        }
        }
        if(array_key_exists($path,$this->routes)){
            return $this->routes[$path];
        }
        return false;
    }
    private function changeRouteRegex($route){
        $route = trim($route,"/");
        $elements = explode("/",$route);
        $elements = array_map(function($element){
            $pattern = "#^\{([a-z][a-z0-9]*)\}$#";
            if(preg_match($pattern,$element,$matches)){
                return "(?<".$matches[1].">[a-z][a-zA-Z0-9_-]*)";
            }
            $pattern_slug= "#^\{([a-z][a-z0-9]*):(.*)\}$#";
            if(preg_match($pattern_slug,$element,$matches)){
                return "(?<".$matches[1].">".$matches[2].")";
            }
            return $element;
            // return $element . "regex";
        },$elements);
        $regex = implode("/",$elements);
         $pattern = "#^".$regex."$#";
        return $pattern;
        // dump($route);
    }
}