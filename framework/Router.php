<?php
namespace Framework;
class Router{

    public array $routes = [];
   

    public function addToRoutes ($path, $details=[]){
        $this->routes[$path] = $details;
    }
    public function match($path):array|bool{
        
        foreach($this->routes as $route => $detail){
          $pattern =   $this->changeRouteRegex($route);
        //   dump($pattern);
        //   dump($path);
        if(preg_match($pattern,$path,$matches)){
            $matches = array_filter($matches,"is_string",ARRAY_FILTER_USE_KEY);
            return $matches;
            
            // dd($matches);
        }else{
            dd("Not Found");
        }
        }
        if(array_key_exists($path,$this->routes)){
            return $this->routes[$path];
        }
        return false;
    }
    private function changeRouteRegex($route){

        $elements = explode("/",$route);
        $elements = array_map(function($element){
            $pattern = "#^\{([a-z][a-z0-9]*)\}$#";
            if(preg_match($pattern,$element,$matches)){
                return "(?<".$matches[1].">[a-z]*)";
            }else{
              dump("not matched");
            }
            // return $element . "regex";
        },$elements);
        $regex = implode("/",$elements);
         $pattern = "#^/".$regex."$#";
        // dump($pattern);
        return $pattern;
        // dump($route);
    }
}