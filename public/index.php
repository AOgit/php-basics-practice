<?php
use myfrm\Db;

session_start();

require_once dirname(__DIR__) . "/vendor/autoload.php";
require  dirname(__DIR__) . "/config/config.php";
require CORE . "/funcs.php";
require_once __DIR__ . '/bootstrap.php';

// $db = \myfrm\App::get(\myfrm\Db::class);
// dump($db);

// dump(db());
// $s_container = \myfrm\App::getContainer();
// dump($s_container);

// die;

// $db_config = require CONFIG . "/db.php";

// $db = (Db::getInstance())->getconnection($db_config);
// $db1 = (Db::getInstance())->getconnection($db_config);

 //dump($db1);
 //dd($db);

$router = new \myfrm\Router();
require CONFIG . "/routes.php";
$router->match();




