<?php

namespace helpers\services;

use helpers\pools\LanguagePool;
use model\Category;

class CategoryService
{
    public static array $categoryArray = [];

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

    public static function getMembersCount(Category $category)
    {
        $children = $category->getChildren();
        $childrenCount = sizeof($children);
        foreach ($children as $child){
            $childrenCount += self::getMembersCount($child);
        }

        return $childrenCount;
    }

    public static function organizingCategoriesTreeView(array $categories)
    {
        $array = [];
        foreach($categories as $category) {
            if($category->level != 1){
                continue;
            }
            $category->setChildren(self::getChildrenTree($categories, $category));
            $array[] = $category;
        }

        return $array;
    }

    /*
     * return [
     *      1,
     *      1.1
     *      1.1.1
     *      2,
     *      2.1,
     *      2.1.1,
     *      3
     * ]
     */
    public static function organizeCategoriesByParentCategories(array $categories): array
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

    public static function getCategoryNameTreeByLeafCategoryId($id)
    {
        $categoryHierarchy = self::getCategoryTreeFromLeafCategoryId($id);
        $categoryNameArray = [];
        foreach ($categoryHierarchy as $category)
        {
            $categoryNameArray[LanguagePool::ENGLISH()->getLabel()][] = $category->getNameEn();
            $categoryNameArray[LanguagePool::GERMANY()->getLabel()][] = $category->getNameDe();
            $categoryNameArray[LanguagePool::FRENCH()->getLabel()][] = $category->getNameFr();
        }

        return $categoryNameArray;
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

    private static function getChildrenTree(array $categories, $parentCategory)
    {
        $children = [];
        foreach ($categories as $category){
            if($category->parent_category_id !== $parentCategory->id){
                continue;
            }

            $category->setChildren(self::getChildrenTree($categories, $category));
            $children[] = $category;

        }

        return $children;
    }



}