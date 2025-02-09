<?php
/**
 *
 * @var Db $db
 */

$db = \myfrm\App::get(\myfrm\Db::class); // $db = db(); еще проще

// $id = $_GET['id'] ?? 0;
$slug = route_param('slug');
// dd($slug);

$post = $db->query("SELECT * FROM posts WHERE slug = ?", [$slug])->findOrFail();

$title = "My Blog :: {$post['title']}";

require_once VIEWS . "/posts/show.tpl.php";
