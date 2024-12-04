<?php
define("BASE_PATH",dirname(__DIR__));
require_once BASE_PATH . '/vendor/autoload.php';

use Framework\Dispatcher;
use Framework\EnvReader;

$url = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);

$url_pieces = explode("/",$_SERVER['REQUEST_URI']);

 require BASE_PATH ."/config/router.php";
 $container = require BASE_PATH. "/config/services.php";

$envReader = new EnvReader;
$envReader->reader(BASE_PATH . "/.env");
// dd($_ENV);
if($_ENV['SHOW_ERRORS']){
    ini_set("display_errors","true");
    
}else{
    ini_set("display_errors","false");

}
print $test;
$dispatcher = new Dispatcher($router,$container);
$dispatcher->handleUrl($url);





// $arr = [1,1,2,3,3,2,2,6,4,5,6,4,8,9,1,7,2,4];
// $newArray = [];

// foreach($arr as $key=> $new){
//     $newArray[$new] = $key;
// }
// dump($newArray);