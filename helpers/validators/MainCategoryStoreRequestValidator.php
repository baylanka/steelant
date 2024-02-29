<?php

namespace helpers\validators;

use app\Request;
use helpers\pools\LanguagePool;
use helpers\utilities\FileUtility;
use helpers\utilities\ResponseUtility;
use helpers\utilities\ValidatorUtility;
use model\Category;
use model\CategoryMedia;

class MainCategoryStoreRequestValidator
{
    public static function validate(Request $request)
    {
        self::nameValidation($request);
        self::visibilityValidation($request);
        self::iconValidation($request);
        self::bannerValidation($request);
    }

    private static function iconValidation($request)
    {
        if(!$request->has('icon')){
            return;
        }

        $file = $request->get('icon');
        if(!ValidatorUtility::isImage($file)){
            ResponseUtility::response("unsupported icon file.",
                422, [
                    "file_type"=>"current file type is " . FileUtility::getType($file),
                    "expected_type" => "image files only allowed (.jpg, .jpeg, .png ... )"
                ]);
        }
    }

    private static function bannerValidation($request)
    {
        if(!$request->has(CategoryMedia::TYPE_BANNER)){
            return;
        }

        $file = $request->get(CategoryMedia::TYPE_BANNER);
        if(!ValidatorUtility::isImage($file)){
            ResponseUtility::response("unsupported banner file.",
                422, [
                    "file_type"=>"current file type is " . FileUtility::getType($file),
                    "expected_type" => "image files only allowed (.jpg, .jpeg, .png ... )"
                ]);
        }
    }

    private static function visibilityValidation(Request $request)
    {
        if(!ValidatorUtility::required($request->all(), 'visibility')) {
            ResponseUtility::response("published/unpublished status is required", 422);
        }

        if(!in_array($request->get('visibility'), [Category::PUBLISHED, Category::UNPUBLISHED])){
            ResponseUtility::response("unknown visibility status \'{$request->get('visibility')}\'", 422);
        }
    }

    private static function nameValidation(Request $request)
    {
        if(!ValidatorUtility::required($request->all(), 'visibility')) {
            ResponseUtility::response("visibility field is required", 422);
        }

        if(!ValidatorUtility::required($request->get('name'), LanguagePool::GERMANY()->getLabel())
            &&
            !ValidatorUtility::required($request->get('name'), LanguagePool::ENGLISH()->getLabel())
            &&
            !ValidatorUtility::required($request->get('name'), LanguagePool::FRENCH()->getLabel())
        ) {
            ResponseUtility::response("name field is required", 422, ["name" => "There must be at least one name required to store a category"]);
        }
    }

}