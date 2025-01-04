<?php
    use helpers\translate\Translate;
?>
<?php require_once "layout/start.layout.php" ?>

<!--body section-->
<div class="jumbotron w-100 p-0 m-0">


    <div class="responsive-wrap alignment-full-padding">
        <!--categories section-->
        <div class="row w-100">


            <div class="col-12 col-md-12 col-xxl-12 row gap-3">
                <div class="col-md-1">
                    <img src="<?= assets("themes/user/img/copyright-icon.png") ?>" height="80"/>
                </div>
                <div class="col-md-8">
                    <dl>
                        <h4 class="selected">
                            <?=Translate::get('terms_and_conditions','general_terms_and_conditions')?>
                        </h4>
                    </dl>

                </div>

            </div>


        </div>
        <!--categories section-->



        <?php require_once "layout/sub_nav.layout.php" ?>


        <hr/>

        <h4 class="connector-heading my-3"><?=Translate::get('terms_and_conditions','legal_advices')?></h4>

<!--         <hr/> -->
<!---->
<!--        <h5 class="connector-heading my-3">-->
<!--            --><?php //=Translate::get('terms_and_conditions','please_download_open_pdf_file')?>
<!--        </h5>-->

        <hr/>

        <?php
            $fileName = Translate::get('terms_and_conditions','general_terms_and_conditions_file');
            $termURI = "storage/general_term_assets/" . $fileName;
            $termURL = assets($termURI);
        ?>
        <div class="d-flex align-middle w-50 justify-content-between  mb-4 mt-4">
            <h6 class="connector-heading">
                <?=Translate::get('terms_and_conditions','general_terms_and_conditions')?>
            </h6>
            <a href="<?=$termURL?>" download="<?=$fileName?>">
                <img src="<?= assets("themes/user/img/pdf.png") ?>" height="25" class="mt-auto mb-auto">
            </a>
        </div>

        <hr/>
    </div>


</div>

<!--body section-->

<?php require_once "layout/end.layout.php" ?>
