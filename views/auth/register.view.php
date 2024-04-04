<!doctype html>
<html lang="en">

<?php
require_once basePath("views/user/layout/head.layout.php");

use helpers\translate\Translate;

?>
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
                            <h3 class="mb-4">
                                <?= Translate::get("common", "register") ?>
                            </h3>
                        </div>

                        <ul class="text-center p-0 " style=" list-style-type: none;">
                            <li>
                                <u>
                                    <b>
                                        <?= Translate::get("register_page", "advantages_of_a_registration") ?>
                                    </b>
                                </u>
                            </li>
                            <li>
                                <?= Translate::get("register_page", "request_products_easily") ?>
                            </li>
                            <li>
                                <?= Translate::get("register_page", "save_your_requests_and_products") ?>
                            </li>
                            <li>
                                <?= Translate::get("register_page", "receive_latest_connector_information_via_newsletter") ?>
                            </li>
                        </ul>


                        <form action="/register" class="register-form pt-5">


                            <div class="form-group d-flex">
                                <div class="input-group-prepend w-25">
                                    <select class="form-select" name="title" aria-label="Default select example">
                                        <option selected value="Dr.">Dr.</option>
                                        <option value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                    </select></div>
                                <input type="text" class="form-control" name="name"
                                       placeholder="<?= strtoupper(Translate::get("register_page", "your_name")) ?>">
                                <label class="form-control-placeholder" for="name">
                                    <?= Translate::get("register_page", "your_name") ?>
                                </label>

                            </div>

                            <div class="form-group mt-5">
                                <input type="text" class="form-control" name="job_position"
                                       placeholder="<?= strtoupper(Translate::get("register_page", "job_position")) ?>">
                                <label class="form-control-placeholder" for="position">
                                    <?= Translate::get("register_page", "job_position") ?>
                                </label>
                            </div>
                            <div class="form-group mt-5">
                                <input type="text" class="form-control" name="division"
                                       placeholder="<?= strtoupper(Translate::get("register_page", "division")) ?>">
                                <label class="form-control-placeholder" for="division">
                                    <?= Translate::get("register_page", "division") ?>
                                </label>
                            </div>
                            <div class="form-group mt-5">
                                <input type="text" class="form-control" name="company_name"
                                       placeholder="<?= strtoupper(Translate::get("register_page", "company_name")) ?>">
                                <label class="form-control-placeholder" for="comp-name">
                                    <?= Translate::get("register_page", "company_name") ?>
                                </label>
                            </div>
                            <div class="form-group mt-5">
                                <input type="text" class="form-control" name="country_or_state"
                                       placeholder="<?= strtoupper(Translate::get("register_page", "country_state")) ?>">
                                <label class="form-control-placeholder" for="country-state">
                                    <?= Translate::get("register_page", "country_state") ?>
                                </label>
                            </div>
                            <div class="form-group mt-5">
                                <input type="text" class="form-control" name="website"
                                       placeholder="<?= strtoupper(Translate::get("register_page", "website")) ?>">
                                <label class="form-control-placeholder" for="email">
                                    <?= Translate::get("register_page", "website") ?>
                                </label>
                            </div>
                            <div class="form-group mt-5">
                                <input type="text" class="form-control" name="phone"
                                       placeholder="<?= strtoupper(Translate::get("register_page", "phone")) ?>">
                                <label class="form-control-placeholder" for="phone">
                                    <?= Translate::get("register_page", "phone") ?>
                                </label>
                            </div>
                            <div class="form-group mt-5">
                                <input type="text" class="form-control" name="email"
                                       placeholder="<?= strtoupper(Translate::get("common", "email")) ?>">
                                <label class="form-control-placeholder" for="email">
                                    <?= Translate::get("common", "email") ?>
                                </label>
                            </div>
                            <div class="form-group mt-5">
                                <input id="password-field" type="password" name="password" class="form-control"
                                       placeholder="<?= strtoupper(Translate::get("common", "password")) ?>">
                                <label class="form-control-placeholder" for="password">
                                    <?= Translate::get("common", "password") ?>
                                </label>
                                <span toggle="#password-field"
                                      class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <p class="text-danger text-center error-msg"></p>
                            <p class="text-success text-center success-msg"></p>

                            <div class="form-group d-flex gap-1 justify-content-center mb-0 w-100 flex-wrap">

                                <div>
                                    <input type="checkbox" class="form-check-input" name="newsletter_subscribe"
                                           checked>
                                </div>
                                <div>
                                    <span>
                                        <?= Translate::get("register_page", "subscribe_to_newsletter") ?>
                                    </span>
                                </div>
                                <br>
                                <small class="col-12 text-center">
                                    <?= Translate::get("register_page", "by_subscribing_you_will_automatically_receive_our_newsletter") ?>
                                </small>

                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">
                                    <?= Translate::get("common", "register") ?>
                                </button>
                            </div>
                        </form>
                        <p class="text-center">
                            <?= Translate::get("register_page", "already_a_member") ?>
                            <a data-toggle="tab" href="<?= url("/login") ?>">
                                <?= Translate::get("common", "login") ?>
                            </a></p>

                        <div class="w-100 d-flex justify-content-center mt-1 pt-5 gap-3 align-middle">
                            <a href="?langStrict=de" title="" class="lang">
                                <img src="<?= assets("img/flags/de.png") ?>" height="25"
                                     class="flag <?= isset($_SESSION["lang"]) && $_SESSION["lang"] == "de" ? "selected-flag" : "" ?>"/>
                            </a>
                            <a href="?langStrict=en-gb" title="" class="lang">
                                <img src="<?= assets("img/flags/en-gb.png") ?>" height="25"
                                     class="flag <?= isset($_SESSION["lang"]) && $_SESSION["lang"] == "en-gb" ? "selected-flag" : "" ?>"/>
                            </a>
                            <a href="?langStrict=en-us" title="" class="lang">
                                <img src="<?= assets("img/flags/en-us.png") ?>" height="25"
                                     class="flag <?= isset($_SESSION["lang"]) && $_SESSION["lang"] == "en-us" ? "selected-flag" : "" ?>"/>
                            </a>
                            <a href="?langStrict=fr" title="" class="lang">
                                <img src="<?= assets("img/flags/fr.png") ?>" height="25"
                                     class="flag <?= isset($_SESSION["lang"]) && $_SESSION["lang"] == "fr" ? "selected-flag" : "" ?>"/>
                            </a>

                        </div>
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

            setTimeout(function () {
                window.location.href = "<?= url("/") ?>?alert=We have sent a verification email to your inbox. Please verify it to gain access to your account.";
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

