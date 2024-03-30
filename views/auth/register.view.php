<!doctype html>
<html lang="en">

<?php require_once basePath("views/user/layout/head.layout.php") ?>
<link rel="stylesheet" href="<?= assets("themes/user/style-2.css") ?>"/>


<body>
<section class="ftco-section">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                <div class="wrap">

                    <div class="nav-logo w-100 mt-5">
                        <?php require_once basePath("views/user/layout/brand.layout.php") ?>
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

                        <form action="/register" class="register-form mt-5">


                            <div class="form-group mt-4 d-flex">
                                <select class="form-select w-25" name="title" aria-label="Default select example">
                                    <option selected value="Dr">Dr</option>
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                </select>
                            </div>


                            <div class="form-group mt-5 d-flex">
                                <input type="text" class="form-control" name="name" placeholder="YOUR NAME">
                                <label class="form-control-placeholder w-75" for="name">Your Name</label>

                            </div>

                            <div class="form-group mt-5">
                                <input type="text" class="form-control" name="job_position" placeholder="JOB / POSITION">
                                <label class="form-control-placeholder" for="position">JOB / POSITION</label>
                            </div>
                            <div class="form-group mt-5">
                                <input type="text" class="form-control" name="division" placeholder="DIVISION">
                                <label class="form-control-placeholder" for="division">DIVISION</label>
                            </div>
                            <div class="form-group mt-5">
                                <input type="text" class="form-control" name="company_name" placeholder="COMPANY NAME">
                                <label class="form-control-placeholder" for="comp-name">COMPANY NAME</label>
                            </div>
                            <div class="form-group mt-5">
                                <input type="text" class="form-control" name="country_or_state" placeholder="COUNTRY / STATE">
                                <label class="form-control-placeholder" for="country-state">COUNTRY / STATE</label>
                            </div>
                            <div class="form-group mt-5">
                                <input type="text" class="form-control" name="email" placeholder="E-MAIL">
                                <label class="form-control-placeholder" for="email">E-MAIL</label>
                            </div>
                            <div class="form-group mt-5">
                                <input type="text" class="form-control" name="website" placeholder="WEBSITE">
                                <label class="form-control-placeholder" for="email">WEBSITE</label>
                            </div>
                            <div class="form-group mt-5">
                                <input type="text" class="form-control" name="phone" placeholder="PHONE">
                                <label class="form-control-placeholder" for="phone">PHONE</label>
                            </div>
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
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">
                                    Register
                                </button>
                            </div>
                            <div class="form-group d-flex justify-content-center mb-0 w-100 flex-wrap">

                                <div><input type="checkbox" class="form-check-input" name="newsletter_subscribe"
                                            checked></div>
                                <div><span>Subscribe to newsletter </span></div>
                                <br>
                                <small class="col-12 text-center">By subscribing, you will automatically receive our
                                    newsletter</small>

                            </div>
                        </form>
                        <p class="text-center">Already a member? <a data-toggle="tab" href="<?= url("/login") ?>">sign
                                in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once basePath("views/user/layout/script.layout.php") ?>

<script>
    $(document).on("submit", ".register-form", async function (e) {
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

            setTimeout(function (){
                window.location.href = "<?= url("/") ?>";
            },1000)

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

