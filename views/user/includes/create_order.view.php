<?php

use helpers\pools\LanguagePool;

?>

<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Request connector</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?= url("/order/request/create") ?>" method="POST" class="orderRequestForm">
            <div class="modal-body">

                <input type="hidden" name="connectorId" value="<?= $connector->id ?>">
                <div class="form-group mt-3">
                    <label for="inputProject">YOUR PROJECT</label>
                    <input type="text" name="project" class="form-control" id="inputProject" aria-describedby="project">
                </div>
                <div class="form-group mt-4">
                    <label for="inputConnector">REQUESTED CONNECTOR</label>
                    <input type="text" class="form-control" id="inputConnector" aria-describedby="connector"
                           value="<?= $connector->name ?>" disabled>
                </div>
                <div class="form-group mt-4">
                    <label for="inputLength">LENGTH OF CONNECTOR</label>

                    <?php
                    if ($lang == LanguagePool::UK_ENGLISH()->getLabel()) {
                        ?>
                        <input type="text" class="form-control" id="inputDivision" aria-describedby="length"
                               value="<?= $connector->standard_lengths_i ?>" disabled>
                        <?php
                    } else if ($lang == LanguagePool::US_ENGLISH()->getLabel()) {

                        ?>

                        <input type="text" class="form-control" id="inputDivision" aria-describedby="length"
                               value="<?= $connector->standard_lengths_i ?>" disabled>
                        <input type="text" class="form-control mt-2" id="inputDivision" aria-describedby="length"
                               value="<?= $connector->standard_lengths_m ?>" disabled>
                        <?php
                    } else {
                        ?>
                        <input type="text" class="form-control" id="inputDivision" aria-describedby="length"
                               value="<?= $connector->standard_lengths_m ?>" disabled>

                    <?php } ?>


                </div>
                <div class="form-group mt-4">
                    <label for="inputPiles">NUMBER OF PILES</label>
                    <input type="number" name="connectorCount" class="form-control" id="inputPiles" aria-describedby="piles"
                           value="0">
                </div>
                <div class="form-group mt-4">
                    <label for="inputSheet">NAME OF USED SHEET PILES</label>
                    <input type="text" name="usedSheetPileName" class="form-control" id="inputSheet" aria-describedby="sheet">
                </div>

                <div class="divider my-5"></div>
                <div class="form-group mt-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="selfPickup" type="checkbox" id="self-pickup">
                        <label class="form-check-label" for="self-pickup">SELF PICKUP</label>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <label for="inputAddress">DELIVERY ADDRESS</label>
                    <input type="text" name="address" class="form-control disable-on-self-pickup" id="inputAddress"
                           aria-describedby="address">
                </div>
                <div class="form-group mt-3">
                    <label for="inputPostal">POSTAL CODE / CITY</label>
                    <input type="text" name="postalCode" class="form-control disable-on-self-pickup" id="inputPostal"
                           aria-describedby="postal / address">
                </div>
                <div class="form-group mt-3">
                    <label for="inputCountry">COUNTRY / STATE</label>
                    <input type="text" name="country" class="form-control disable-on-self-pickup" id="inputCountry"
                           aria-describedby="country">
                </div>
                <div class="form-group mt-3">
                    <label for="inputDeliveryDate">DESIRED DELIVERY DATE / COLLECTION</label>
                    <input type="date" name="deliveryDate" class="form-control datepicker" id="inputDeliveryDate"
                           aria-describedby="delivery date">
                </div>

                <p class="text-danger text-center error-msg mt-4"></p>

                <p class="mt-5">
                    REQUEST FROM:<br/><br/>
                    <small>
                        <?= $_SESSION["user"]->title . $_SESSION["user"]->name ?> - <?= $_SESSION["user"]->job_position ?><br/>
                        <?= $_SESSION["user"]->division ?>

                        <?= $_SESSION["user"]->country_or_state ?><br/>

                        <?= $_SESSION["user"]->email ?><br/>
                        <?= $_SESSION["user"]->phone ?><br/>
                        <?= $_SESSION["user"]->website ?>
                    </small>
                </p>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary background-blue">Request</button>
            </div>

        </form>
    </div>
</div>

<script>



    $(document).off("change", "#self-pickup");
    $(document).on("change", "#self-pickup", function () {
        if ($(this).is(":checked")) {
            $(".disable-on-self-pickup").attr("disabled", true);
        } else {
            $(".disable-on-self-pickup").attr("disabled", false);
        }
    });


</script>