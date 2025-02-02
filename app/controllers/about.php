<?php

$db = \myfrm\App::get(\myfrm\Db::class); // $db = db(); еще проще

$title = "My Blog :: About";

$post = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate iusto sit et quae quia consequuntur dolores eos illo totam corporis minima laborum at error, nemo suscipit. Nisi, unde delectus provident qui magni quisquam nihil facilis ab sapiente ex et quos aliquam perspiciatis culpa dolorum similique omnis nam! Mollitia eum adipisci harum, architecto dicta dolorem. Quidem, nisi consequuntur recusandae ratione velit sequi ipsam deleniti! !";

// $post = phpinfo();

$recent_posts = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT 3")->findAll();

require_once VIEWS . "/about.tpl.php";
