<?php

require_once __DIR__ . '/vendor/autoload.php';
use App\Controllers\ArticleController;
use App\Controllers\NewController;
use Framework\Router;

$url = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);

// dump($_SERVER);
$url_pieces = explode("/",$_SERVER['REQUEST_URI']);
// dd($url_pieces);
// require "src/Router.php";

$router = new Router;
$router->addToRoutes("{controller}/{action}");
// $router->addToRoutes("/regax",['controller'=>"regax","action"=>"match"]);
// $router->addToRoutes("/drupak/pakistan/wah",['controller'=>'drupak',"action"=>"details"]);
// $router->addToRoutes("/drupak/pakistan/history",['controller'=>'drupak',"action"=>"history"]);
// $router->addToRoutes("/sports/cricket",['controller'=>'sports',"action"=>"cricket"]);
 if($detail = $router->match($url)){
    dump($detail);
     $namespace = "App\\Controllers\\";
    // require_once "$namespace". ucfirst($detail['controller']).".php";
    $controller = $namespace.ucfirst($detail['controller']);
    $action = $detail['action'];
    $class = new $controller;
    $class->$action();

 }
 else{
    dump("Route Not Found");
 }

// dump($router->routes);




// $controller = $url_pieces[1];
// $action = $url_pieces[2];
// if($controller == "article"){
//     require "src/Controller/ArticleController.php";
// $ArticleController = new ArticleController;
// $ArticleController->$action();
// }
// if($controller == "news"){
//     require "src/Controller/NewController.php";
// $newsController = new NewController;
// $newsController->$action();
// }



// $arr = [1,1,2,3,3,2,2,6,4,5,6,4,8,9,1,7,2,4];
// $newArray = [];

// foreach($arr as $key=> $new){
//     $newArray[$new] = $key;
// }
// dump($newArray);