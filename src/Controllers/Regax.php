<?php

namespace App\Controllers;
class Regax{
    public function match(){
        $pattern= "#^/(?<controller>[a-z]+)/(?<action>[a-z]+)$#";
        $path = "/drupak/details";

       if( preg_match($pattern,$path,$matches)){
            dump("it has matched");
            $matches = array_filter($matches,"is_string",ARRAY_FILTER_USE_KEY);
            dump($matches);

        }else{
            dump("opps");
        }
    }
}