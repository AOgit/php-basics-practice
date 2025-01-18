<?php

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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/main.css">
</head> 
<body>
    <div class="wrapper">

        <header class="header">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
                </ul>
            </div>
            </nav>
        </header>

        <main class="main py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                    <?php foreach ($posts as $post): ?>


                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title"> <a href="post/<?= $post["slug"] ?>"><?= $post["title"] ?></a></h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="post/<?= $post["slug"] ?>" class="card-link">Card link</a>
                            </div>
                        </div>
                        <?php endforeach; ?> 

                    </div>
                    <div class="col-md-4">
                        <h3>Recents posts  </h3>
                            <ul class="list-group">
                            <?php foreach ($recent_posts as $post): ?>
                                <li class="list-group-item"><a href="post/<?= $post["slug"] ?>"><?= $post["title"] ?></a></li>
                            <?php endforeach; ?> 
                            </ul>
                    </div>
                </div>
            </div>

        </main>

        <footer class="footer p-3 mb-2 bg-dark text-white text-center">
           <p class="mb-0"> &copy; Copyright <?= date('Y'); ?></p>
        </footer>

    </div>
</body>
</html>