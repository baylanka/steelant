<?php

namespace helpers\validators;

use app\Request;
use helpers\utilities\ResponseUtility;
use helpers\utilities\ValidatorUtility;


class OrderStoreRequestValidator
{
    public static function validate(Request $request)
    {

        self::requireds($request);

        if($request->get("connectorCount") <= 0){
            ResponseUtility::response("Enter an valid number of piles.",423,["key"=>"connectorCount"]);
        }

    }


    private static function requireds(Request $request)
    {

        if (!ValidatorUtility::required($request->all(),"project")) {
            ResponseUtility::response("Please provide project name.",423,["key"=>"project"]);
        }
        if (!ValidatorUtility::required($request->all(),"connectorCount")) {
            ResponseUtility::response("Please provide number of piles.",423,["key"=>"connectorCount"]);
        }

        if (!ValidatorUtility::required($request->all(),"deliveryDate")) {
            ResponseUtility::response("Please provide delivery date.",423,["key"=>"deliveryDate"]);
        }
        if (!ValidatorUtility::required($request->all(),"usedSheetPileName")) {
            ResponseUtility::response("Please provide sheet pile name.",423,["key"=>"usedSheetPileName"]);
        }


        if (!ValidatorUtility::required($request->all(),"selfPickup")) {


            if (!ValidatorUtility::required($request->all(),"address")) {
                ResponseUtility::response("Please provide your address.",423,["key"=>"address"]);
            }
            if (!ValidatorUtility::required($request->all(),"postalCode")) {
                ResponseUtility::response("Please provide postal code or city.",423,["key"=>"postalCode"]);
            }

            if (!ValidatorUtility::required($request->all(),"country")) {
                ResponseUtility::response("Please provide your country or state.",423,["key"=>"country"]);
            }


        }


    }



}