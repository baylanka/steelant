<?php

use helpers\pools\LanguagePool;
use helpers\translate\Translate;

?>



<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel"><?=Translate::get('request_pop_up','request')?></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?= url("/order/request/create") ?>" method="POST" class="orderRequestForm">
            <div class="modal-body">

                <input type="hidden" name="connectorId" value="<?= $connector->id ?>">
                <div class="form-group mt-4">
                    <label for="inputProject" class="form-control-placeholder"><?=Translate::get('request_pop_up','your_project')?></label>
                    <input type="text" name="project" class="form-control" id="inputProject" aria-describedby="project">
                </div>
                <div class="form-group mt-5">
                    <label for="inputConnector" class="form-control-placeholder"><?=Translate::get('request_pop_up','name')?></label>
                    <input type="text" class="form-control" id="inputConnector" aria-describedby="connector"
                           value="<?= $connector->name ?>" disabled>
                </div>
                <div class="form-group mt-5">
                    <label for="inputLength" class="form-control-placeholder"><?=Translate::get('request_pop_up','length')?></label>
                    <select name="s_length" id="length" class="form-control">
                    <?php foreach ($connector->getLengthOfLang(true) as $each): ?>
                        <option value="<?= $each ?>"><?= $each ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mt-5">
                    <label for="inputPiles" class="form-control-placeholder"><?=Translate::get('request_pop_up','no_of_piles')?></label>
                    <input type="number" name="connectorCount" class="form-control" id="inputPiles" aria-describedby="piles"
                           value="0">
                </div>
                <div class="form-group mt-5">
                    <label for="inputSheet" class="form-control-placeholder"><?=Translate::get('request_pop_up','name_of_sheet_piles')?></label>
                    <input type="text" name="usedSheetPileName" class="form-control" id="inputSheet" aria-describedby="sheet">
                </div>

               <hr class="mb-5"/>

                <div class="form-group mt-5">
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="selfPickup" type="checkbox" id="self-pickup">
                        <label class="form-check-label check-box-label"  for="self-pickup"><?=Translate::get('request_pop_up','self_pickup')?></label>
                    </div>
                </div>
                <div class="form-group mt-5">
                    <label for="inputAddress" class="form-control-placeholder"><?=Translate::get('request_pop_up','delivery_address')?></label>
                    <input type="text" name="address" class="form-control disable-on-self-pickup" id="inputAddress"
                           aria-describedby="address">
                </div>
                <div class="form-group mt-5">
                    <label for="inputPostal" class="form-control-placeholder"><?=Translate::get('request_pop_up','postal_code')?></label>
                    <input type="text" name="postalCode" class="form-control disable-on-self-pickup" id="inputPostal"
                           aria-describedby="postal / address">
                </div>
                <div class="form-group mt-5">
                    <label for="inputCountry" class="form-control-placeholder"><?=Translate::get('request_pop_up','country')?></label>
                    <input type="text" name="country" class="form-control disable-on-self-pickup" id="inputCountry"
                           aria-describedby="country">
                </div>
                <div class="form-group mt-5">
                    <label for="inputDeliveryDate" class="form-control-placeholder"><?=Translate::get('request_pop_up','desired_delivery_date')?></label>
                    <input type="date" name="deliveryDate" class="form-control datepicker" id="inputDeliveryDate"
                           aria-describedby="delivery date">
                </div>

                <p class="text-danger text-center error-msg mt-4"></p>

                <p class="mt-5">
                    <?=Translate::get('request_pop_up','requested_from')?><br/><br/>
                    <small>
                        <?= $_SESSION["user"]->title . " " . $_SESSION["user"]->name ?> - <?= $_SESSION["user"]->job_position ?><br/>
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