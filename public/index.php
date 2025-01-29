<?php
use myfrm\Db;

session_start();

require_once dirname(__DIR__) . "/vendor/autoload.php";
require  dirname(__DIR__) . "/config/config.php";
require CORE . "/funcs.php";

$db_config = require CONFIG . "/db.php";
//$db = new Db($db_config);

$db = (Db::getInstance())->getconnection($db_config);
$db1 = (Db::getInstance())->getconnection($db_config);

 //dump($db1);
 //dd($db);



$router = new \myfrm\Router();
require CONFIG . "/routes.php";
// dd($router);
$router->match();
// require CORE . "/router.php";



