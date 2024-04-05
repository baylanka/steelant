<?php require_once "layout/start.layout.php" ?>

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
                        <h4 class="color-blue selected">Contact</h4>
                    </dl>

                </div>

            </div>

            <div class="col-12 col-md-8 col-xxl-8  d-flex flex-row flex-wrap">
                <div class="col-12 col-md-3 col-xxl-3 mb-3">
                    <dl>
                        <dt>HEADQUARTERS
                            GERMANY
                        </dt>
                        <dd class="mt-4"><a href="#eu" class="link color-black">Africa</a></dd>
                        <dd><a href="#eu" class="link color-black">Asia</a></dd>
                        <dd><a href="#eu" class="link color-black">Australia</a></dd>
                        <dd><a href="#eu" class="link color-black">Caribbean</a></dd>
                        <dd><a href="#eu" class="link color-black">Europe</a></dd>
                        <dd><a href="#eu" class="link color-black">India</a></dd>
                        <dd><a href="#eu" class="link color-black">New Zealand</a></dd>
                        <dd><a href="#eu" class="link color-black">South America</a></dd>
                        <dd><a href="#eu" class="link color-black">South East Asia</dd>
                    </dl>

                </div>
                <div class="col-12 col-md-3 col-xxl-3 mb-3">
                    <dl>
                        <dt>
                            SALES LINE
                            NORTH AMERICA
                        </dt>
                        <dd class="mt-4"><a href="#north-america" class="link color-black">Canada</a></dd>
                        <dd><a href="#north-america" class="link color-black">USA</a></dd>
                    </dl>

                </div>

            </div>


        </div>
        <!--categories section-->


        <?php require_once "layout/sub_nav.layout.php" ?>


        <div class="divider"></div>

        <h4 class="connector-heading my-3" id="eu">Headquarters</h4>

        <div class="divider"></div>

        <p class="mt-5">SteelWall ISH GmbH
            <br/> Tassilostr. 21
            <br/> 82166 Gräfelfi ng
            <br/> Germany</p>

        <p class="mt-3">Phone
            <br/>+49-89-74 120 122</p>

        <p class="mt-3">Fax
            <br/>+49-89-74 120 128</p>

        <p class="mt-3">E-Mail
            <br/>info@steelwall.eu</p>


        <p class="mt-5"> Please leave a message here: </p>

        <div class="row justify-content-start mb-5">
            <div class="col-12 col-md-6">
                <form action="<?= url("/contact/sendMessage") ?>" method="POST" class="send-mail">
                    <input type="hidden" name="location" value="eu">
                    <div class="form-group">
                        <label for="inputName required-field">Your Name</label>
                        <input type="text" class="form-control bg-light" id="inputName" name="name"
                               aria-describedby="Name" required>
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputJob">JOB / POSITION</label>
                        <input type="text" class="form-control bg-light" id="inputJob" name="job"
                               aria-describedby="job">
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputDivision">DIVISION</label>
                        <input type="text" class="form-control bg-light" id="inputDivision" name="division"
                               aria-describedby="division">
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputCompany">COMPANY NAME</label>
                        <input type="text" class="form-control bg-light" id="inputCompany" name="company"
                               aria-describedby="company name">
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputCountry required-field">COUNTRY / STATE</label>
                        <input type="text" class="form-control bg-light" id="inputCountry" name="country"
                               aria-describedby="country" required>
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputEmail required-field">E-MAIL</label>
                        <input type="email" class="form-control bg-light" id="inputEmail" name="email"
                               aria-describedby="email" required>
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputEmail">PHONE</label>
                        <input type="text" class="form-control bg-light" id="inputEmail" name="phone"
                               aria-describedby="email">
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputEmail">YOUR MESSAGE</label>
                        <textarea type="text" class="form-control bg-light" id="inputEmail" name="message"
                                  aria-describedby="email"></textarea>
                    </div>
                    <div id="recaptcha1"></div>
                    <div class="form-group mt-4">
                        <button type="submit"
                                class="form-control btn btn-primary rounded submit px-3 w-25 background-blue"
                                data-sitekey="6LfXA7ApAAAAAI23Z9Z_VL53akwmCJ3Ii1X3nhr8"
                                data-callback='onSubmit'
                                data-action='submit'>
                            Send
                        </button>
                    </div>
                </form>
            </div>
        </div>


        <div class="divider"></div>

        <h4 class="connector-heading my-3" id="north-america">Sales line North America</h4>

        <div class="divider"></div>


        <p class="mt-5">SteelWall ISH GmbH
            <br/> Tassilostr. 21
            <br/> 82166 Gräfelfi ng
            <br/> Germany</p>

        <p class="mt-3">Phone
            <br/>+49-89-74 120 122</p>

        <p class="mt-3">Fax
            <br/>+49-89-74 120 128</p>

        <p class="mt-3">E-Mail
            <br/>info@steelwall.eu</p>

        <p class="mt-5"> Please leave a message here: </p>

        <div class="row justify-content-start mb-5">
            <div class="col-12 col-md-6">
                <form action="<?= url("/contact/sendMessage") ?>" method="POST"
                      class="send-mail">
                    <input type="hidden" name="location" value="north-america">
                    <div class="form-group">
                        <label for="inputName">Your Name</label>
                        <input type="text" class="form-control bg-light" id="inputName" name="name"
                               aria-describedby="Name" required>
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputJob">JOB / POSITION</label>
                        <input type="text" class="form-control bg-light" id="inputJob" name="job"
                               aria-describedby="job">
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputDivision">DIVISION</label>
                        <input type="text" class="form-control bg-light" id="inputDivision" name="division"
                               aria-describedby="division">
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputCompany">COMPANY NAME</label>
                        <input type="text" class="form-control bg-light" id="inputCompany" name="company"
                               aria-describedby="company name">
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputCountry">COUNTRY / STATE</label>
                        <input type="text" class="form-control bg-light" id="inputCountry" name="country"
                               aria-describedby="country" required>
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputEmail">E-MAIL</label>
                        <input type="email" class="form-control bg-light" id="inputEmail" name="email"
                               aria-describedby="email" required>
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputEmail">PHONE</label>
                        <input type="text" class="form-control bg-light" id="inputEmail" name="phone"
                               aria-describedby="email">
                    </div>
                    <div class="form-group mt-4">
                        <label for="inputEmail">YOUR MESSAGE</label>
                        <textarea type="text" class="form-control bg-light" id="inputEmail" name="message"
                                  aria-describedby="email"></textarea>
                    </div>
                    <div id="recaptcha2"></div>
                    <div class="form-group mt-4">
                        <button type="submit"
                                class="form-control btn btn-primary rounded submit px-3 w-25 background-blue"
                                data-sitekey="6LfXA7ApAAAAAI23Z9Z_VL53akwmCJ3Ii1X3nhr8"
                                data-callback='onSubmit'
                                data-action='submit'>
                            Send
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