<?php require VIEWS .'/incs/header.php'; ?>

        <main class="main py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                    <h3>Register Page</h3>
                    <form action="" method="post">

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="<?= old('name') ?>">
                            <?= isset($validation) ? $validation->listErrors('name') : '' ?>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="text" class="form-control" id="email" placeholder="Email" value="<?= old('Email') ?>">
                            <?= isset($validation) ? $validation->listErrors('email') : '' ?>
                        </div>

                        <div class="mb-3">
                            <label for="Password" class="form-label">Password</label>
                            <input name="Password" type="text" class="form-control" id="Password" placeholder="Password" value="<?= old('Password') ?>">
                            <?= isset($validation) ? $validation->listErrors('Password') : '' ?>
                        </div>

                        <div class="mb-3">
                            <button button type="submit" class="btn btn-primary">Register</button>
                        </div>



                    </div>

                    <?php // require VIEWS .'/incs/sidebar.php'; ?>

                </div>
            </div>

        </main>

    <?php require VIEWS . '/incs/footer.php'; ?>

