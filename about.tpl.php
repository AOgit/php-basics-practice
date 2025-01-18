<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'TITLE'; ?></title> 
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
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about.php">About <span class="sr-only">(current)</a>
                </li>
            
                </ul>
            </div>
            </nav>
        </header>

        <main class="main py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <?= $post; ?>
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