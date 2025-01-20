<?php require VIEWS . '/incs/header.php'; ?>

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
    
 <?php require VIEWS . '/incs/footer.php'; ?>