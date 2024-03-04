<?php

namespace helpers\mappers;

use app\Request;
use helpers\pools\LanguagePool;
use model\Category;

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
        self::setTitleJson($request, $category);
        $category->visibility = $request->get('visibility');
        return $category;
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


    private static function setTitleJson(Request $request, Category &$category)
    {
        if(!$request->has('title')){
            return;
        }
        $titleArray = [];
        $title = $request->get('title',[]);
        $titleArray[LanguagePool::GERMANY()->getLabel()] = $title[LanguagePool::GERMANY()->getLabel()] ?? '';
        $titleArray[LanguagePool::ENGLISH()->getLabel()] = $title[LanguagePool::ENGLISH()->getLabel()] ?? '';
        $titleArray[LanguagePool::FRENCH()->getLabel()] = $title[LanguagePool::FRENCH()->getLabel()] ?? '';
        $category->title =  json_encode($titleArray);
    }
}