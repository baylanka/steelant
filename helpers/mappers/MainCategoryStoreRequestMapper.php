<?php

namespace helpers\mappers;

use app\Request;
use helpers\pools\LanguagePool;
use helpers\utilities\FileUtility;
use model\Category;
use model\CategoryMedia;
use model\Media;

class MainCategoryStoreRequestMapper
{
    /**
     * @throws \Exception
     */
    public static function getModel(Request $request)
     {
         $category = new Category();
         $category->level = 1;
         $category->name = self::getNameJson($request);
         $category->visibility = $request->get('visibility');
         self::setIconMedia($request, $category);
         self::setBannerMedia($request, $category);

         return $category;
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

    /**
     * @throws \Exception
     */
    private static function setIconMedia(Request $request, Category &$category)
     {
         if(!$request->has('icon') || empty($request->get('icon'))){
             return $category->temp_icon_media = null;
         }
         $file = $request->get('icon');
         $fileOriginalName = FileUtility::getName($file);
         $fileName = "category_icon_{$fileOriginalName}_" . time() . "." . FileUtility::getType($file);
         $category->temp_icon_media = $category->temp_icon_media = self::uploadFile($file, $fileName);
     }


    /**
     * @throws \Exception
     */
    private static function setBannerMedia($request, Category &$category)
    {
        if(!$request->has('banner') || empty($request->get('banner'))){
            return $category->temp_banner_media = null;
        }
        $file = $request->get('banner');
        $fileOriginalName = FileUtility::getName($file);
        $fileName = "category_banner_{$fileOriginalName}_" . time() . "." . FileUtility::getType($file);
        $category->temp_banner_media = self::uploadFile($file, $fileName);
    }

    /**
     * @throws \Exception
     */
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