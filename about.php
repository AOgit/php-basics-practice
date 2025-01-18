<?php
define("MYAPP", true);

require "funcs.php";

$title = "My Blog :: About";

$post ="
<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis perspiciatis, dolorum consectetur provident quia accusantium! Nesciunt quam facere eum ex, beatae laborum magnam blanditiis, quibusdam laboriosam nihil animi! Molestiae, dolorem.</p>

<p>Autem voluptas commodi tenetur accusantium ad, debitis doloremque sed nulla iste exercitationem eaque iusto sint deserunt, libero quibusdam, perferendis non placeat assumenda qui sequi sit! Soluta cumque sit iusto itaque.</p>

<p>Deleniti numquam aliquam hic tempora modi accusamus tenetur reiciendis quaerat facilis dolores fugit ipsum mollitia alias, sint molestiae nesciunt excepturi obcaecati quo iusto delectus ea necessitatibus. Illo aliquam odio animi!</p>";

$recent_posts = [
    1 => [
        'title' => "Item 1",
        'slug' => "Slug-1",
        ],

    2 => [
        'title' => "Item 2",
        'slug' => "Slug-2",
        ],

    3 => [
        'title' => "Item 3",
        'slug' => "Slug-3",
        ],

    4 => [
        'title' => "Item 4",
        'slug' => "Slug-4",
        ],

    5 => [
        'title' => "Item 5",
        'slug' => "Slug-5",
        ]
];

require_once "app/views/about.tpl.php";