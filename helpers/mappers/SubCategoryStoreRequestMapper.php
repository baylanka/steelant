<?php

namespace helpers\mappers;

use app\Request;
use helpers\pools\LanguagePool;
use helpers\utilities\FileUtility;
use model\Category;
use model\Media;

class SubCategoryStoreRequestMapper
{
    /**
     * @throws \Exception
     */
    public static function getModel(Request $request)
    {
        $category = new Category();
        $category->level = self::getLevel($request);
        $category->name = self::getNameJson($request);
        $category->parent_category_id = $request->get('parent_id');
        $category->title = self::getTitleJson($request);
        $category->visibility = $request->get('visibility');
        self::setBannerMedia($request, $category);
        return $category;
    }

    /**
     * @throws \Exception
     */
    private static function setBannerMedia($request, Category &$category)
    {
        if(!$request->has('banner')
            || empty($request->get('banner'))
            || empty($request->get('banner')['tmp_name'])
        ){
            return $category->temp_banner_media = null;
        }
        $file = $request->get('banner');
        $fileOriginalName = FileUtility::getName($file);
        $fileName = "category_banner_{$fileOriginalName}_" . time() . "." . FileUtility::getExtension($file);
        $category->temp_banner_media = self::uploadFile($file, $fileName);
    }


    private static function getLevel(Request $request)
    {
        $categoryId = $request->get('parent_id');
        $parentCategory = Category::getById($categoryId);
        return $parentCategory->level + 1;
    }

    private static function getNameJson(Request $request)
    {
        $nameArray = [];
        $name = $request->get('name',[]);
        $nameArray[LanguagePool::GERMANY()->getLabel()] = $name[LanguagePool::GERMANY()->getLabel()] ?? '';
        $nameArray[LanguagePool::ENGLISH()->getLabel()] = $name[LanguagePool::ENGLISH()->getLabel()] ?? '';
        $nameArray[LanguagePool::FRENCH()->getLabel()] = $name[LanguagePool::FRENCH()->getLabel()] ?? '';
        return json_encode($nameArray);
    }


    private static function getTitleJson(Request $request)
    {
        if(!$request->has('title')){
            return json_encode([]);
        }
        $titleArray = [];
        $title = $request->get('title',[]);
        $titleArray[LanguagePool::GERMANY()->getLabel()] = $title[LanguagePool::GERMANY()->getLabel()] ?? '';
        $titleArray[LanguagePool::ENGLISH()->getLabel()] = $title[LanguagePool::ENGLISH()->getLabel()] ?? '';
        $titleArray[LanguagePool::FRENCH()->getLabel()] = $title[LanguagePool::FRENCH()->getLabel()] ?? '';
        return json_encode($titleArray);
    }

    private static function uploadFile($file, $fileName)
    {
        $path = "category_assets/" . $fileName;
        $target = storage_path("public/{$path}");
        FileUtility::upload($file, $target);

        $media = new Media();
        $media->type = Media::TYPE_IMAGE;
        $media->name =  FileUtility::getName($file);
        $media->path = $path;
        return $media;
    }
}