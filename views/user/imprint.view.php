<?php
    use helpers\translate\Translate;
?>
<?php require_once "layout/start.layout.php" ?>

<!--body section-->
<div class="jumbotron w-100 p-0 m-0">


    <div class="responsive-wrap">
        <!--categories section-->
        <div class="row w-100 mt-4">


            <div class="col-12 col-md-4 col-xxl-4 row gap-3">
                <div class="col-md-3">
                    <img src="<?= assets("themes/user/img/copyright-icon.png") ?>" height="80"/>
                </div>
                <div class="col-md-2">
                    <dl>
                        <h4 class=" selected"><?= Translate::get('home_nav','imprint')?></h4>
                    </dl>

                </div>

            </div>


        </div>
        <!--categories section-->


        <?php require_once "layout/sub_nav.layout.php" ?>


        <div class="divider"></div>

        <h4 class="connector-heading my-3"><?= Translate::get('imprint','legal_advices')?></h4>

        <div class="divider"></div>

        <div class="row justify-content-start mt-5">
            <div class="col-12 col-md-6">
                <p>
                    <?= Translate::get('imprint','publisher')?>
                    <?= Translate::get('imprint','publisher_detail')?>
                    <br/><br/><br/>

                    <?= Translate::get('imprint','managing_partner')?><br/>
                    <?= Translate::get('imprint','mp_name')?>
                    <br/><br/><br/>


                    <?= Translate::get('imprint','mp_contact')?>
                    <br/><br/><br/>


                    <?= Translate::get('imprint','register_court')?><br/><br/>
                    <?= Translate::get('imprint','registration_detail')?>
                    <br/><br/><br/>


                    <?= Translate::get('imprint','legal_notice')?><br/><br/>
                    <span style="text-align: justify;">
                        <?= Translate::get('imprint','legal_detail')?>
                    </span>

                    <br/><br/><br/>

                    <?= Translate::get('imprint','design')?><br/><br/>

                    <?= Translate::get('imprint','programming')?><br/><br/>

                </p>
            </div>
        </div>

    </div>


</div>

<!--body section-->

<?php require_once "layout/end.layout.php" ?>
