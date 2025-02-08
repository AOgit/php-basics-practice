<?php

/**  @var \myfrm\Db $db */


$title = "My Blog :: Home";

$db = \myfrm\App::get(\myfrm\Db::class);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 3;
$total = $db->query("SELECT COUNT(*) FROM posts")->getColumn();
$pagination = new \myfrm\Pagination((int)$page, $per_page, $total);

$start = $pagination->getStart();

$posts = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT $start, $per_page")->findAll();

$recent_posts = db()->query("SELECT * FROM posts ORDER BY id DESC LIMIT 3")->findAll();


require_once VIEWS . "/posts/index.tpl.php";
