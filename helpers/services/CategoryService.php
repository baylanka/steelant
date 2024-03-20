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

    public static function arrangeCategoryTreeView(array $categories)
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

    public static function getCategoryHierarchy($id, &$tree=[])
    {
        $isInitialCall = empty($tree);
        if(sizeof(static::$categoryArray) === 0){
            static::$categoryArray = Category::getAll();
        }

        foreach (static::$categoryArray as $each)
        {
            if($each->id === $id){
                $tree[LanguagePool::ENGLISH()->getLabel()][] = $each->getNameEn();
                $tree[LanguagePool::GERMANY()->getLabel()][] = $each->getNameDe();
                $tree[LanguagePool::FRENCH()->getLabel()][] = $each->getNameFr();

                if(!empty($each->parent_category_id)){
                    self::getCategoryHierarchy($each->parent_category_id, $tree);
                }
                break;
            }


        }

        if(!$isInitialCall){
           return;
        }

        $tree[LanguagePool::ENGLISH()->getLabel()] = array_reverse($tree[LanguagePool::ENGLISH()->getLabel()] ?? []);
        $tree[LanguagePool::GERMANY()->getLabel()] = array_reverse($tree[LanguagePool::GERMANY()->getLabel()] ?? []);
        $tree[LanguagePool::FRENCH()->getLabel()] = array_reverse($tree[LanguagePool::FRENCH()->getLabel()] ?? []);

        return $tree;

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