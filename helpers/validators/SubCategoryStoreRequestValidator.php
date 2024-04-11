<?php

namespace helpers\validators;

use app\Request;
use helpers\pools\LanguagePool;
use helpers\repositories\CategoryRepository;
use helpers\utilities\ResponseUtility;
use helpers\utilities\ValidatorUtility;
use model\Category;

class SubCategoryStoreRequestValidator
{
    public static function validate(Request $request)
    {
        self::parentIdValidation($request);
        self::nameValidation($request);
        self::titleValidation($request);
        self::visibilityValidation($request);
    }

    private static function parentIdValidation(Request $request)
    {
        if(!$request->has('parent_id') || empty($request->get('parent_id'))){
            ResponseUtility::response(":parent category identification is failure",422);
        }

        $parentCategoryId = $request->get('parent_id');
        if(!Category::existsBy(['id'=>$parentCategoryId])){
            ResponseUtility::response("parent category is not detected to proceed",422);
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


    private static function titleValidation(Request $request)
    {
        if(!$request->has('title')) {
            return;
        }

        if(!ValidatorUtility::required($request->get('title'), LanguagePool::GERMANY()->getLabel())
            ||
            !ValidatorUtility::required($request->get('title'), LanguagePool::ENGLISH()->getLabel())
            ||
            !ValidatorUtility::required($request->get('title'), LanguagePool::FRENCH()->getLabel())
        ) {
            ResponseUtility::response("title fields are required", 422,[
                "It is mandatory to provide a title in all available languages.",
            ]);
        }


        if(!self::isUniqueTitleSet($request)){
            ResponseUtility::response("title must be unique", 422,
                [
                    "There is/are one or more title(s) already existing.",
                    "Please try with unique."
                ]);
        }
        if(!self::titleLengthMin($request)){
            ResponseUtility::response("name length is too short!",422,[
                "name value length must be more than or equal to 5"
            ]);
        }
        if(!self::titleLengthMax($request)){
            ResponseUtility::response("name length is exceeded!", 422, [
                "name values can not be exceed 150 words"
            ]);
        }

    }

    private static function nameLengthMin($request)
    {
        $nameArr = $request->get('name');
        return (
            ValidatorUtility::min($nameArr[LanguagePool::GERMANY()->getLabel()],2)
            &&
            ValidatorUtility::min($nameArr[LanguagePool::ENGLISH()->getLabel()],2)
            &&
            ValidatorUtility::min($nameArr[LanguagePool::FRENCH()->getLabel()],2)
        );
    }

    private static function titleLengthMin($request)
    {
        $titleArr = $request->get('title');
        return (
            ValidatorUtility::min($titleArr[LanguagePool::GERMANY()->getLabel()],5)
            &&
            ValidatorUtility::min($titleArr[LanguagePool::ENGLISH()->getLabel()],5)
            &&
            ValidatorUtility::min($titleArr[LanguagePool::FRENCH()->getLabel()],5)
        );
    }

    private static function nameLengthMax($request)
    {
        $nameArr = $request->get('name');
        return (
            ValidatorUtility::max($nameArr[LanguagePool::GERMANY()->getLabel()],30)
            &&
            ValidatorUtility::max($nameArr[LanguagePool::ENGLISH()->getLabel()],30)
            &&
            ValidatorUtility::max($nameArr[LanguagePool::FRENCH()->getLabel()],30)
        );
    }

    private static function titleLengthMax($request)
    {
        $titleArr = $request->get('title');
        return (
            ValidatorUtility::max($titleArr[LanguagePool::GERMANY()->getLabel()],150)
            &&
            ValidatorUtility::max($titleArr[LanguagePool::ENGLISH()->getLabel()],150)
            &&
            ValidatorUtility::max($titleArr[LanguagePool::FRENCH()->getLabel()],150)
        );
    }

    private static function isUniqueNameSet($request)
    {
        $parentId = $request->get('parent_id');
        $nameArr = $request->get('name');
        $nameEn = $nameArr[LanguagePool::ENGLISH()->getLabel()];
        $nameDe = $nameArr[LanguagePool::GERMANY()->getLabel()];
        $nameFr = $nameArr[LanguagePool::FRENCH()->getLabel()];


        return CategoryRepository::isNameUnique($nameEn, $nameDe, $nameFr, $parentId);
    }

    private static function isUniqueTitleSet($request)
    {
        $titleArr = $request->get('title');
        $nameEn = $titleArr[LanguagePool::ENGLISH()->getLabel()];
        $nameDe = $titleArr[LanguagePool::GERMANY()->getLabel()];
        $nameFr = $titleArr[LanguagePool::FRENCH()->getLabel()];


        return CategoryRepository::isTitleUnique($nameEn, $nameDe, $nameFr);
    }

}