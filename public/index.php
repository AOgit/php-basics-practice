<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

require  dirname(__DIR__) . "/config/config.php";

require CORE . "/funcs.php";

use myfrm\Db;

$db_config = require CONFIG . "/db.php";
//$db = new Db($db_config);

$db = (Db::getInstance())->getconnection($db_config);
$db1 = (Db::getInstance())->getconnection($db_config);

 //dump($db1);
 //dd($db);

$posts = $db->query("SELECT * FROM posts")->findAll();

$recent_posts = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT 3")->findAll();


require CORE . "/router.php";



