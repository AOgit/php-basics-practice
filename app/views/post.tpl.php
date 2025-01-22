<?php require VIEWS . '/incs/header.php'; ?>

        <main class="main py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">



                                <h1 class="card-title"><?= $post["title"] ?></h1>
                                <p class="card-text"> <?= $post["content"] ?> </p>
                                <a href="post/?id=<?= $post["id"] ?>" class="card-link">Card link</a>



                    </div>

                </div>
            </div>
        </main>

 <?php require VIEWS . '/incs/footer.php'; ?>
