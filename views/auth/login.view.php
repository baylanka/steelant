<!doctype html>
<html lang="en">

<?php require_once basePath("views/user/layout/head.layout.php") ?>
<link rel="stylesheet" href="<?= assets("themes/user/style-2.css") ?>"/>


<body>
<section class="ftco-section">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="wrap">

                    <div class="nav-logo w-100 mt-5">
                        <?php require_once basePath("views/user/layout/brand.layout.php") ?>
                    </div>


                    <div class="login-wrap p-4 p-md-5">

                        <div class="w-100 text-center">
                            <h3 class="mb-4">Sign In</h3>
                        </div>


                        <form action="/login" class="signin-form">
                            <div class="form-group mt-5">
                                <input type="text" class="form-control" name="user_name" placeholder="USER NAME/ALIAS">
                                <label class="form-control-placeholder" for="phone">USER NAME/ALIAS</label>
                            </div>
                            <div class="form-group mt-5">
                                <input id="password-field" type="password" name="password" class="form-control"
                                       placeholder="PASSWORD">
                                <label class="form-control-placeholder" for="password">PASSWORD</label>
                                <span toggle="#password-field"
                                      class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <p class="text-danger text-center error-msg"></p>
                            <p class="text-success text-center success-msg"></p>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In
                                </button>
                            </div>

                            <div class="w-100 text-center">
                                <a href="#">Forgot Password</a>
                            </div>
                        </form>
                        <p class="text-center">Not a member? <a data-toggle="tab" href="<?= url("/register") ?>">Register</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once basePath("views/user/layout/script.layout.php") ?>

<script>

    $(document).on("submit", ".signin-form", async function (e) {
        e.preventDefault();

        const btn = $(this).find("button[type=submit]");
        const btnLabel = btn.text();
        loadButton(btn, "Login");
        const form = $(this);
        const URL = form.attr('action');
        const formData = form.serialize();
        try {
            let response = await makeAjaxCall(URL, formData);

            $(".success-msg").text(response.message);

            setTimeout(function () {
                if (response.auth) {
                    switch (response.data.type) {
                        case "admin":
                            window.location.href = "<?php

                                if (isset($_GET["redirect"])) {
                                    echo url("/" . $_GET["redirect"]);
                                } else {
                                    echo url("/admin/categories");
                                }

                                ?>";
                            break

                        case "user":
                            window.location.href = "<?php

                                if (isset($_GET["redirect"])) {
                                    echo url("/" . $_GET["redirect"]);
                                } else {
                                    echo url("/");
                                }

                                ?>";
                            break
                    }
                }
            }, 1000)


        } catch (err) {
            err = JSON.parse(err);
            $(".error-msg").text(err.message);
            $("input[type=password]").val("");
            $("input").removeClass("is-invalid");
            $("input[name=" + err.errors.key + "]").addClass("is-invalid");

            resetButton(btn, btnLabel);
        }
    });

</script>
</body>
</html>

