<?php

namespace helpers\services;

use helpers\pools\LanguagePool;
use model\Category;

class CategoryService
{

    public static function getCategoryTreeFromLeafCategoryId($id, &$tree=[])
    {
        $category = Category::getById($id);
        if(!$category){
            return $tree;
        }

        array_unshift($tree,$category);
        $parentCategoryId = $category->parent_category_id;
        if(empty($parentCategoryId)){
            return $tree;
        }

        return self::getCategoryTreeFromLeafCategoryId($parentCategoryId, $tree);
    }

    public static function isLeafCategoryPublishable($categoryTree)
    {
        foreach ($categoryTree as $category){
            if(!$category->isPublished()){
                return false;
            }
        }

        return true;
    }

    public static function arrangeCategoryHierarchy(array $categories)
    {
        $array = [];
        foreach($categories as $category) {
            if($category->level != 1){
                continue;
            }
            $array[] = $category;
            $children = self::getChildren($categories, $category);
            $array = array_merge($array, $children);
        }

        return $array;
    }

    private static function getChildren(array $categories, $parentCategory)
    {
        $children = [];
        foreach ($categories as $category){
            if($category->parent_category_id !== $parentCategory->id){
                continue;
            }

            $children[] = $category;
            $subChildren = self::getChildren($categories, $category);
            $children = array_merge($children, $subChildren);
        }

        return $children;
    }



}