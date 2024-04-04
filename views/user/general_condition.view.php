<?php require_once "layout/start.layout.php" ?>

<!--body section-->
<div class="jumbotron w-100 p-0 m-0">


    <div class="responsive-wrap">
        <!--categories section-->
        <div class="row w-100 mt-4">


            <div class="col-12 col-md-12 col-xxl-12 row gap-3">
                <div class="col-md-1">
                    <img src="<?= assets("themes/user/img/copyright-icon.png") ?>" height="80"/>
                </div>
                <div class="col-md-8">
                    <dl>
                        <h4 class="selected">General terms and conditions
                        </h4>
                    </dl>

                </div>

            </div>


        </div>
        <!--categories section-->



        <?php require_once "layout/sub_nav.layout.php" ?>


        <div class="divider"></div>

        <h4 class="connector-heading my-3">Legal advices</h4>

        <div class="divider"></div>

        <h5 class="connector-heading my-3">Please download / open PDF file
        </h5>

        <div class="divider"></div>


        <div class="d-flex align-middle w-50 justify-content-between my-5">
            <h6 class="connector-heading my-4">General terms and conditions</h6>
            <img src="<?= assets("themes/user/img/pdf.png") ?>" height="25" class="mt-auto mb-auto">
        </div>

        <div class="divider"></div>
    </div>


</div>

<!--body section-->

<?php require_once "layout/end.layout.php" ?>
