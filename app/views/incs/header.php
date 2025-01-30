<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'TITLE'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <base href="<?= PATH; ?>/">
    <link rel="stylesheet" href="assets/main.css">
    <link rel="shortcut icon" href="img/favicon.png" />
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
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/posts/create">New post</a>
                        </li>
                    </ul>

                    <ul class="d-flex text-white align-items-center list-unstyled mx-5 my-auto gap-3">
                        <?php if (check_auth()): ?>
                            <li class="nav-item">
                            <?= $_SESSION['user']['name']; ?>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Logout</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/register">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Login</a>
                            </li>
                        <?php endif; ?>
                    </ul>

                </div>
            </nav>
        </header>

        <?php get_alerts(); ?>
