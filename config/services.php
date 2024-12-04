<?php

use App\Database;
use Framework\Container;

$container = new Container;
// $db = new Database('db','db','db','db');
// dd($db::class);
$container->set("App\Database",function(){
    return new Database($_ENV['DB_HOST'],$_ENV['DB_NAME'],$_ENV['DB_HOST'],$_ENV['DB_PASSWORD']);
});
return $container;