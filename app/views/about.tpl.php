<?php require VIEWS .'/incs/header.php'; ?>

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

    <?php require VIEWS . '/incs/footer.php'; ?>