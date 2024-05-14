<?php

namespace helpers\validators;

use app\Request;
use helpers\pools\LanguagePool;
use helpers\repositories\CategoryRepository;
use helpers\utilities\FileUtility;
use helpers\utilities\ResponseUtility;
use helpers\utilities\ValidatorUtility;
use model\Category;

class CategoryUpdateRequestValidator
{
    /**
     * @throws \Exception
     */
    public static function validate(Request $request)
    {
        self::idValidation($request);
        self::nameValidation($request);
        self::titleValidation($request);
        self::visibilityValidation($request);
        self::iconValidation($request);
        self::bannerValidation($request);
    }

    private static function bannerImageHistoryTrackerValidation(Request $request)
    {
        if(!$request->has('banner_image_tracker') || empty($request->get('banner_image_tracker'))){
            throw new \Exception("banner_image history tracker status is missing to update");
        }

        if(!in_array($request->get('banner_image_tracker'),['previous_state', 'changed', 'deleted'])){
            throw new \Exception("banner_image_tracker value is unauthorized!");
        }
    }

    private static function thumbnailImageHistoryTrackerValidation(Request $request)
    {
        if(!$request->has('thumbnail_image_tracker') || empty($request->get('thumbnail_image_tracker'))){
            throw new \Exception("thumbnail_image history tracker status is missing to update");
        }

        if(!in_array($request->get('thumbnail_image_tracker'),['previous_state', 'changed', 'deleted'])){
            throw new \Exception("thumbnail_image value is unauthorized!");
        }
    }

    private static function idValidation(Request $request)
    {
        if(!$request->has('id') || empty($request->get('id'))){
            throw new \Exception("category identification missing to update");
        }
    }

    /**
     * @throws \Exception
     */
    private static function iconValidation($request)
    {
        if(!$request->has('icon') || empty($request->get('icon')['tmp_name'])){
            return;
        }

        self::thumbnailImageHistoryTrackerValidation($request);

        $file = $request->get('icon');
        if(!ValidatorUtility::isImage($file)){
            ResponseUtility::response("unsupported icon file.",422,[
                "file_type"=>"current file type is " . FileUtility::getExtension($file),
                "expected_type" => "image files only allowed (.jpg, .jpeg, .png ... )"
            ]);
        }
    }

    /**
     * @throws \Exception
     */
    private static function bannerValidation($request)
    {
        if(!$request->has('banner') || empty($request->get('banner')['tmp_name'])){
            return;
        }

        self::bannerImageHistoryTrackerValidation($request);


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
            ValidatorUtility::min($nameArr[LanguagePool::GERMANY()->getLabel()],2)
            &&
            ValidatorUtility::min($nameArr[LanguagePool::ENGLISH()->getLabel()],2)
            &&
            ValidatorUtility::min($nameArr[LanguagePool::FRENCH()->getLabel()],2)
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
        $updatingCategoryId = $request->get('id');
        $category = Category::getById($updatingCategoryId);
        $parentId = $category->parent_category_id ?? null;

        $nameArr = $request->get('name');
        $nameEn = $nameArr[LanguagePool::ENGLISH()->getLabel()];
        $nameDe = $nameArr[LanguagePool::GERMANY()->getLabel()];
        $nameFr = $nameArr[LanguagePool::FRENCH()->getLabel()];

        return CategoryRepository::isNameUnique($nameEn, $nameDe, $nameFr, $parentId,
            $updatingCategoryId);
    }

    private static function titleValidation(Request $request)
    {
        if(!$request->has('title')) {
            return;
        }

        if(!ValidatorUtility::required($request->get('title'), LanguagePool::GERMANY()->getLabel())
            &&
            !ValidatorUtility::required($request->get('title'), LanguagePool::ENGLISH()->getLabel())
            &&
            !ValidatorUtility::required($request->get('title'), LanguagePool::FRENCH()->getLabel())
        ) {
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

    private static function isUniqueTitleSet(Request $request)
    {
        $updatingCategoryId = $request->get('id');
        $titleArr = $request->get('title');
        $titleEn = $titleArr[LanguagePool::ENGLISH()->getLabel()];
        $titleDe = $titleArr[LanguagePool::GERMANY()->getLabel()];
        $titleFr = $titleArr[LanguagePool::FRENCH()->getLabel()];


        return CategoryRepository::isTitleUnique($titleEn, $titleDe, $titleFr, $updatingCategoryId);
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
}