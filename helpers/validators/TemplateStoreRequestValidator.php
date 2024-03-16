<?php

namespace helpers\validators;

use app\Request;
use helpers\utilities\FileUtility;
use helpers\utilities\ResponseUtility;
use helpers\utilities\ValidatorUtility;

class TemplateStoreRequestValidator
{
    public static function validate(Request $request)
    {
        self::templateFileValidation($request);
        self::thumbnailValidation($request);
    }

    private static function templateFileValidation($request)
    {
        if(
               !ValidatorUtility::required($request->all(), 'template')
            || !ValidatorUtility::required($request->all()['template'],'tmp_name')
            || empty($request->get('template')['tmp_name'])
        ) {
            ResponseUtility::response("template file is required", 422);
        }

        $file = $request->get('template');
        if(!ValidatorUtility::isAcceptedType($file,['php'])){
            ResponseUtility::response("unsupported template file.",422,[
                "file_type"=>"current file type is " . FileUtility::getType($file),
                "expected_type" => "template must be php file"
            ]);
        }
    }

    private static function thumbnailValidation($request)
    {
        if(
               !ValidatorUtility::required($request->all(), 'thumbnail')
            || !ValidatorUtility::required($request->get('thumbnail'), 'tmp_name')
            ||  empty($request->get('thumbnail')['tmp_name'])
        ) {
            ResponseUtility::response("thumbnail image is required", 422);
        }

        $file = $request->get('thumbnail');
        if(!ValidatorUtility::isImage($file)){
            ResponseUtility::response("unsupported thumbnail file.",422,[
                "file_type"=>"current file type is " . FileUtility::getType($file),
                "expected_type" => "image files only allowed (.jpg, .jpeg, .png ... )"
            ]);
        }
    }
}