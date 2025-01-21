<?php

require  dirname(__DIR__) . "/config/config.php";


require CORE . "/funcs.php";

require CORE . "/classes/Db.php";
$db_config = require CONFIG . "/db.php";
$db = new Db($db_config);

$posts = $db->query("SELECT * FROM posts")->findAll();
// dd($posts);

$recent_posts = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT 3")->findAll();

require CORE . "/router.php";



