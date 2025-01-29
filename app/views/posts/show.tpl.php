<?php require VIEWS . '/incs/header.php'; ?>

        <main class="main py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                                <h1 class="card-title"><?= h($post["title"]) ?></h1>
                                <p class="card-text"> <?= h($post["content"]) ?> </p>
                                <a href="posts/?id=<?= $post["id"] ?>" class="card-link">Card link</a>

                                <form action="/posts" method="post">
                                    <input type="hidden" name="id" value="<?= $post["id"] ?>">
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </form>

                    </div>
                </div>
            </div>
        </main>

 <?php require VIEWS . '/incs/footer.php'; ?>
