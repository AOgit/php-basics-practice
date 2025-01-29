<?php

$title = "My Blog :: Home";

global $db;

$posts = $db->query("SELECT * FROM posts")->findAll();
$recent_posts = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT 3")->findAll();


require_once VIEWS . "/posts/index.tpl.php";
