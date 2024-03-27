<!doctype html>
<html lang="en">

<?php require_once "layout/head.layout.php" ?>
<link rel="stylesheet" href="<?= assets("themes/user/style-2.css") ?>"/>


<body>
<section class="ftco-section">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                <div class="wrap">

                    <div class="nav-logo w-100 mt-5">
                        <?php require_once "layout/brand.view.php" ?>
                    </div>


                    <div class="login-wrap p-4 p-md-5">

                        <div class="w-100 text-center">
                            <h3 class="mb-4">Register</h3>
                        </div>

                        <ul class="text-center p-0" style=" list-style-type: none;">
                            <li>
                               <u><b> Advantages of a registration:</b></u>
                            </li>
                            <li>
                                Request products easily!
                            </li>
                            <li>
                                Save your requests and products (Favourites)!
                            </li>
                            <li>
                                Receive latest connector information via newsletter!
                            </li>
                        </ul>

                        <form action="#" class="signin-form mt-5">
                            <div class="form-group mt-3 d-flex">
                                <input type="text" class="form-control" required>
                                <label class="form-control-placeholder w-75" for="name">Your Name</label>
                                <select class="form-select w-25" aria-label="Default select example">
                                    <option selected>Dr</option>
                                    <option value="1">Mr</option>
                                    <option value="2">Mrs</option>
                                </select>

                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" required>
                                <label class="form-control-placeholder" for="position">JOB / POSITION</label>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" required>
                                <label class="form-control-placeholder" for="division">DIVISION</label>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" required>
                                <label class="form-control-placeholder" for="comp-name">COMPANY NAME</label>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" required>
                                <label class="form-control-placeholder" for="country-state">COUNTRY / STATE</label>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" required>
                                <label class="form-control-placeholder" for="email">E-MAIL</label>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" required>
                                <label class="form-control-placeholder" for="email">WEBSITE</label>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" required>
                                <label class="form-control-placeholder" for="phone">Phone</label>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" required>
                                <label class="form-control-placeholder" for="phone">USER NAME/ALIAS</label>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" class="form-control" required>
                                <label class="form-control-placeholder" for="password">Password</label>
                                <span toggle="#password-field"
                                      class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">
                                    Register
                                </button>
                            </div>
                            <div class="form-group d-flex justify-content-center mb-0 w-100 flex-wrap">

                                <div> <input type="checkbox" class="form-check-input" checked></div>
                                <div> <span>Subscribe to newsletter </span></div>
                                <br>
                                <small class="col-12 text-center">By subscribing, you will automatically receive our newsletter</small>

                            </div>
                        </form>
                        <p class="text-center">Already an member? <a data-toggle="tab" href="<?= url("/login") ?>">sign
                                in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once "layout/script.layout.php" ?>
</body>
</html>

