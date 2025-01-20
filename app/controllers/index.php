<?php
//define("MYAPP", true);


$title = "My Blog :: Home";

$posts = [
    1 => [
        'title' => "Title 1",
        'desc' => "Some quick example text to build on the card",
        'slug' => "Title-1",
        ],

    2 => [
        'title'=> "Title 2",
        'desc' => "Some quick example text to build on the card",
        'slug' => "Title-2",
        ],

    3 => [
        'title'=> "Title 3",
        'desc' => "Some quick example text to build on the card",
        'slug' => "Title-3",
        ],

    4 => [
        'title'=> "Title 4",
        'desc' => "Some quick example text to build on the card",
        'slug' => "Title-4",
        ],

    5 => [
        'title'=> "Title 5",
        'desc' => "Some quick example text to build on the card",
        'slug' => "Title-5",
        ]
];

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

require_once VIEWS . "/index.tpl.php";