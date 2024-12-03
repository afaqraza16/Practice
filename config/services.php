<?php

use App\Database;
use Framework\Container;

$container = new Container;
// $db = new Database('db','db','db','db');
// dd($db::class);
$container->set("App\Database",function(){
    return new Database('db','db','db','db');
});
return $container;