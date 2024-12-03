<?php

use Framework\Router;

$router = new Router;
$router->addToRoutes("/{controller}/{action}");
$router->addToRoutes("/node/{slug:\d+}",["controller"=>"node","action"=>"display"]);
$router->addToRoutes("/product/{slug:\d+}",["controller"=>"product","action"=>"display"]);
$router->addToRoutes("/drupak/pakistan/wah",['controller'=>'drupak',"action"=>"details"]);
$router->addToRoutes("/{controller}/{id:\w+}/{action}");