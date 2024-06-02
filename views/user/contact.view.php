<?php
require_once "layout/start.layout.php";

use helpers\translate\Translate;

?>

<!--body section-->
<div class="jumbotron w-100 p-0 m-0">

    <div class="responsive-wrap">

        <!--categories section-->
        <div class="row w-100 mt-4">


            <div class="col-12 col-md-4 col-xxl-4 row gap-3">
                <div class="col-md-3">
                    <img src="<?= assets("themes/user/img/contact-icon.png") ?>" height="80"/>
                </div>
                <div class="col-md-2">
                    <dl>
                        <h4 class="selected"><?= Translate::get("contact_page", "contact") ?></h4>
                    </dl>

                </div>

            </div>

            <div class="col-12 col-md-8 col-xxl-8  d-flex flex-row flex-wrap">
                <div class="col-12 col-md-3 col-xxl-3 mb-3">
                    <dl>
                        <dt class="color-blue contact_head_dt">
                            <?= Translate::get("contact_page", "headquarters_germany") ?>
                        </dt>
                        <dd class="mt-4"><a href="#eu" class="link  black-80"><?= Translate::get("home_footer", "africa") ?></a></dd>
                        <dd><a href="#eu" class="link  black-80"><?= Translate::get("home_footer", "asia") ?></a></dd>
                        <dd><a href="#eu" class="link  black-80"><?= Translate::get("home_footer", "australia") ?></a></dd>
                        <dd><a href="#eu" class="link  black-80"><?= Translate::get("home_footer", "caribbean") ?></a></dd>
                        <dd><a href="#eu" class="link  black-80"><?= Translate::get("home_footer", "europe") ?></a></dd>
                        <dd><a href="#eu" class="link  black-80"><?= Translate::get("home_footer", "india") ?></a></dd>
                        <dd><a href="#eu" class="link  black-80"><?= Translate::get("home_footer", "new_zealand") ?></a></dd>
                        <dd><a href="#eu" class="link  black-80"><?= Translate::get("home_footer", "south_america") ?></a></dd>
                        <dd><a href="#eu" class="link  black-80"><?= Translate::get("home_footer", "south_east_asia") ?></dd>
                    </dl>

                </div>
                <div class="col-12 col-md-3 col-xxl-3 mb-3">
                    <dl>
                        <dt class="color-blue contact_head_dt">
                            <?= Translate::get("contact_page", "sales_line_north_america") ?>
                        </dt>
                        <dd class="mt-4"><a href="#north-america" class="link  black-80"><?= Translate::get("home_footer", "europe") ?></a></dd>
                        <dd><a href="#japan" class="link  black-80"><?= Translate::get("home_footer", "japan") ?></a></dd>
                        <dd><a href="#oceania" class="link  black-80"><?= Translate::get("home_footer", "oceania") ?></a></dd>
                        <dd><a href="#south_east_asia" class="link  black-80"><?= Translate::get("home_footer", "south_east_asia") ?></a></dd>
                        <dd><a href="#usa" class="link  black-80"><?= Translate::get("home_footer", "usa") ?></a></dd>
                    </dl>

                </div>

            </div>


        </div>
        <!--categories section-->


        <?php require_once "layout/sub_nav.layout.php" ?>


        <div class="divider"></div>

        <h4 class="connector-heading my-3" id="eu">
            <?= Translate::get("contact_page", "headquarters") ?>
        </h4>

        <div class="divider"></div>

        <p class="mt-5  black-80">SteelWall ISH GmbH
            <br/> Tassilostr. 21
            <br/> 82166 Gräfelfi ng
            <br/> Germany</p>

        <p class="mt-3  black-80">
            <?= Translate::get("common", "phone") ?>
            <br/>+49-89-74 120 122</p>

        <p class="mt-3  black-80">
            <?= Translate::get("common", "fax") ?>
            <br/>+49-89-74 120 128</p>

        <p class="mt-3 black-80">
            <?= Translate::get("common", "email") ?>
            <br/>info@steelwall.eu</p>


        <p class="mt-5  black-80"><?= Translate::get("contact_page", "please_leave_a_message_here") ?>: </p>

        <div class="row justify-content-start mb-5">
            <div class="col-12 col-md-6">
                <form action="<?= url("/contact/sendMessage") ?>" method="POST" class="send-mail">
                    <input type="hidden" name="location" value="eu">

                    <div class="form-group margin-t-50px">
                        <input type="text" class="form-control" id="inputName" name="name"
                               aria-describedby="Name"  placeholder="<?= Translate::get("user_info", "your_name") ?>"  required>
                        <label class="form-control-placeholder required-field" for="inputName">
                            <?= Translate::get("user_info", "your_name",null,true) ?>
                        </label>
                    </div>

                    <div class="form-group margin-t-50px">
                        <input type="text" class="form-control" id="inputJob" name="job"
                               aria-describedby="job" placeholder="<?= Translate::get("user_info", "job_position") ?>" >
                        <label class="form-control-placeholder" for="inputJob">
                            <?= Translate::get("user_info", "job_position",null,true) ?>
                        </label>
                    </div>

                    <div class="form-group margin-t-50px">
                        <input type="text" class="form-control" id="inputDivision" name="division"
                               aria-describedby="division" placeholder="<?= Translate::get("user_info", "division") ?>" >
                        <label class="form-control-placeholder" for="inputDivision">
                            <?= Translate::get("user_info", "division",null,true) ?>
                        </label>
                    </div>

                    <div class="form-group margin-t-50px">
                        <input type="text" class="form-control" id="inputCompany" name="company"
                               aria-describedby="company name" placeholder="<?= Translate::get("user_info", "company_name") ?>" >
                        <label class="form-control-placeholder" for="inputCompany">
                            <?= Translate::get("user_info", "company_name",null,true) ?>
                        </label>
                    </div>

                    <div class="form-group margin-t-50px">
                        <input type="text" class="form-control" id="inputCountry" name="country"
                               aria-describedby="country" placeholder="<?= Translate::get("user_info", "country_state") ?>"  required>
                        <label class="form-control-placeholder required-field" for="inputCountry">
                            <?= Translate::get("user_info", "country_state",null,true) ?>
                        </label>
                    </div>

                    <div class="form-group margin-t-50px">
                        <input type="email" class="form-control" id="inputEmail" name="email"
                               aria-describedby="email" placeholder="<?= Translate::get("user_info", "email") ?>"  required>
                        <label class="form-control-placeholder required-field" for="inputEmail">
                            <?= Translate::get("user_info", "email",null,true) ?>
                        </label>
                    </div>
                    
                    <div class="form-group margin-t-50px">

                        <input type="text" class="form-control" id="inputPhone" name="phone"
                               aria-describedby="phone"  placeholder="<?= Translate::get("user_info", "phone") ?>" >
                        <label class="form-control-placeholder" for="inputPhone">
                            <?= Translate::get("user_info", "phone",null,true) ?>
                        </label>
                    </div>

                    <div class="form-group margin-t-50px">
                        <textarea type="text" class="form-control" id="message" name="message"
                                  aria-describedby="message"  placeholder="<?= Translate::get("contact_page", "your_message") ?>"></textarea>
                        <label class="form-control-placeholder" for="message">
                            <?= Translate::get("contact_page", "your_message",null,true) ?>
                        </label>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit"
                                class="form-control btn btn-primary text-white submit px-3 w-25 background-blue">
                            <?= Translate::get("contact_page", "send") ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>


        <div class="divider"></div>

        <h4 class="connector-heading my-3" id="north-america">
            <?= Translate::get("contact_page", "sales_line_north_america") ?>
        </h4>

        <div class="divider"></div>


        <p class="mt-5  black-80">SteelWall ISH GmbH
            <br/> Tassilostr. 21
            <br/> 82166 Gräfelfi ng
            <br/> Germany</p>

        <p class="mt-3  black-80">
            <?= Translate::get("user_info", "phone") ?>
            <br/>+49-89-74 120 122</p>

        <p class="mt-3  black-80">
            <?= Translate::get("common", "fax") ?>
            <br/>+49-89-74 120 128</p>

        <p class="mt-3  black-80">
            <?= Translate::get("common", "email") ?>
            <br/>info@steelwall.eu</p>

        <p class="mt-5  black-80"> Please leave a message here: </p>

        <div class="row justify-content-start mb-5">
            <div class="col-12 col-md-6">
                <form action="<?= url("/contact/sendMessage") ?>" method="POST"
                      class="send-mail">
                    <input type="hidden" name="location" value="north-america">

                    <div class="form-group margin-t-50px">
                        <input type="text" class="form-control" id="inputName" name="name"
                               aria-describedby="Name"  placeholder="<?= Translate::get("user_info", "your_name") ?>"  required>
                        <label class="form-control-placeholder required-field" for="inputName">
                            <?= Translate::get("user_info", "your_name",null,true) ?>
                        </label>
                    </div>

                    <div class="form-group margin-t-50px">
                        <input type="text" class="form-control" id="inputJob" name="job"
                               aria-describedby="job" placeholder="<?= Translate::get("user_info", "job_position") ?>" >
                        <label class="form-control-placeholder" for="inputJob">
                            <?= Translate::get("user_info", "job_position",null,true) ?>
                        </label>
                    </div>

                    <div class="form-group margin-t-50px">
                        <input type="text" class="form-control" id="inputDivision" name="division"
                               aria-describedby="division" placeholder="<?= Translate::get("user_info", "division") ?>" >
                        <label class="form-control-placeholder" for="inputDivision">
                            <?= Translate::get("user_info", "division",null,true) ?>
                        </label>
                    </div>

                    <div class="form-group margin-t-50px">
                        <input type="text" class="form-control" id="inputCompany" name="company"
                               aria-describedby="company name" placeholder="<?= Translate::get("user_info", "company_name") ?>" >
                        <label class="form-control-placeholder" for="inputCompany">
                            <?= Translate::get("user_info", "company_name",null,true) ?>
                        </label>
                    </div>

                    <div class="form-group margin-t-50px">
                        <input type="text" class="form-control" id="inputCountry" name="country"
                               aria-describedby="country" placeholder="<?= Translate::get("user_info", "country_state") ?>"  required>
                        <label class="form-control-placeholder required-field" for="inputCountry">
                            <?= Translate::get("user_info", "country_state",null,true) ?>
                        </label>
                    </div>

                    <div class="form-group margin-t-50px">
                        <input type="email" class="form-control" id="inputEmail" name="email"
                               aria-describedby="email" placeholder="<?= Translate::get("user_info", "email") ?>"  required>
                        <label class="form-control-placeholder required-field" for="inputEmail">
                            <?= Translate::get("user_info", "email",null,true) ?>
                        </label>
                    </div>

                    <div class="form-group margin-t-50px">

                        <input type="text" class="form-control" id="inputPhone" name="phone"
                               aria-describedby="phone"  placeholder="<?= Translate::get("user_info", "phone") ?>" >
                        <label class="form-control-placeholder" for="inputPhone">
                            <?= Translate::get("user_info", "phone",null,true) ?>
                        </label>
                    </div>

                    <div class="form-group margin-t-50px">
                        <textarea type="text" class="form-control" id="message" name="message"
                                  aria-describedby="message"  placeholder="<?= Translate::get("contact_page", "your_message") ?>"></textarea>
                        <label class="form-control-placeholder" for="message">
                            <?= Translate::get("contact_page", "your_message",null,true) ?>
                        </label>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit"
                                class="form-control btn btn-primary text-white submit px-3 w-25 background-blue">
                            <?= Translate::get("contact_page", "send") ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>


        <div class="divider mb-5"></div>

    </div>

</div>
<!--body section-->

<?php require_once "layout/end.layout.php" ?>
<script src="https://www.google.com/recaptcha/api.js"></script>

<script>
    function onSubmit(token) {
        document.getElementById("demo-form").submit();
    }
</script>