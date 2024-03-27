<!doctype html>
<html lang="en">

<?php require_once "layout/head.layout.php" ?>
<link rel="stylesheet" href="<?= assets("themes/user/style-2.css") ?>"/>


<body>
<section class="ftco-section">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="wrap">

                        <div class="nav-logo w-100 mt-5">
                            <?php require_once "layout/brand.view.php" ?>
                        </div>


                    <div class="login-wrap p-4 p-md-5">

                            <div class="w-100 text-center">
                                <h3 class="mb-4">Sign In</h3>
                            </div>


                        <form action="#" class="signin-form">
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" required>
                                <label class="form-control-placeholder" for="username">Username</label>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" class="form-control" required>
                                <label class="form-control-placeholder" for="password">Password</label>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                            </div>
                            <div class="w-100 text-center">
                                    <a href="#">Forgot Password</a>
                            </div>
                        </form>
                        <p class="text-center">Not a member? <a data-toggle="tab" href="<?= url("/register") ?>">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once "layout/script.layout.php" ?>
</body>
</html>

