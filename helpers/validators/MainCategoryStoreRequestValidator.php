<?php

namespace helpers\validators;

use app\Request;
use helpers\pools\LanguagePool;
use helpers\repositories\CategoryRepository;
use helpers\utilities\FileUtility;
use helpers\utilities\ResponseUtility;
use helpers\utilities\ValidatorUtility;
use model\Category;

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
        if(!$request->has('icon') || empty($request->get('icon')['tmp_name'])){
            return;
        }

        $file = $request->get('icon');
        if(!ValidatorUtility::isImage($file)){
            ResponseUtility::response("unsupported icon file.",422,[
                "file_type"=>"current file type is " . FileUtility::getExtension($file),
                "expected_type" => "image files only allowed (.jpg, .jpeg, .png ... )"
            ]);
        }
    }

    private static function bannerValidation($request)
    {
        if(!$request->has('banner') || empty($request->get('banner')['tmp_name'])){
            return;
        }

        $file = $request->get('banner');
        if(!ValidatorUtility::isImage($file)){
            ResponseUtility::response("unsupported banner file.", 422,[
                "file_type"=>"current file type is " . FileUtility::getExtension($file),
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
        if(!ValidatorUtility::required($request->all(), 'name')) {
            ResponseUtility::response("visibility field is required", 422);
        }

        if(!ValidatorUtility::required($request->get('name'), LanguagePool::GERMANY()->getLabel())
            ||
            !ValidatorUtility::required($request->get('name'), LanguagePool::ENGLISH()->getLabel())
            ||
            !ValidatorUtility::required($request->get('name'), LanguagePool::FRENCH()->getLabel())
        ) {
            ResponseUtility::response("name field is required", 422,[
                "There must not be left name field blank",
            ]);
        }


        if(!self::isUniqueNameSet($request)){
            ResponseUtility::response("name must be unique", 422,
                [
                    "There is/are one or more name(s) already existing.",
                    "Please try with unique."
                ]);
        }
        if(!self::nameLengthMin($request)){
            ResponseUtility::response("name length is too short!",422,[
                "name value length must be more than or equal to 5"
            ]);
        }
        if(!self::nameLengthMax($request)){
            ResponseUtility::response("name length is exceeded!", 422, [
                "name values can not be exceed 30 words"
            ]);
        }

    }

    private static function nameLengthMin($request)
    {
        $nameArr = $request->get('name');
        return (
            ValidatorUtility::min($nameArr[LanguagePool::GERMANY()->getLabel()],5)
            &&
            ValidatorUtility::min($nameArr[LanguagePool::ENGLISH()->getLabel()],5)
            &&
            ValidatorUtility::min($nameArr[LanguagePool::FRENCH()->getLabel()],5)
        );
    }

    private static function nameLengthMax($request)
    {
        $nameArr = $request->get('name');
        return (
            ValidatorUtility::max($nameArr[LanguagePool::GERMANY()->getLabel()],50)
            &&
            ValidatorUtility::max($nameArr[LanguagePool::ENGLISH()->getLabel()],50)
            &&
            ValidatorUtility::max($nameArr[LanguagePool::FRENCH()->getLabel()],50)
        );
    }

    private static function isUniqueNameSet($request)
    {
        $nameArr = $request->get('name');
        $nameEn = $nameArr[LanguagePool::ENGLISH()->getLabel()];
        $nameDe = $nameArr[LanguagePool::GERMANY()->getLabel()];
        $nameFr = $nameArr[LanguagePool::FRENCH()->getLabel()];


        return CategoryRepository::isNameUnique($nameEn, $nameDe, $nameFr);
    }

}