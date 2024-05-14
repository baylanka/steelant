<?php

namespace helpers\services;

use helpers\dto\ConnectorPageCategoryCollection;
use helpers\pools\LanguagePool;
use model\Category;

class CategoryService
{
    public static array $categoryArray = [];

    public static function getCategoryPageCollectionDTO($selectedCategoryId)
    {
        $parentCategory = self::getParentCategory($selectedCategoryId);
        $category = Category::getById($parentCategory->id);
        $categories = (array) Category::getAll();
        $category->setChildren(self::getChildrenTree($categories, $category));
        return new ConnectorPageCategoryCollection($category, $selectedCategoryId);
    }

    public static function getParentCategory($id)
    {
        $categoryHierarchy = self::getCategoryTreeFromLeafCategoryId($id);
        return $categoryHierarchy[0];
    }

    public static function getCategoryTreeFromLeafCategoryId($id, &$tree = [])
    {
        $category = Category::getById($id);
        if (!$category) {
            return $tree;
        }

        array_unshift($tree, $category);
        $parentCategoryId = $category->parent_category_id;
        if (empty($parentCategoryId)) {
            return $tree;
        }

        return self::getCategoryTreeFromLeafCategoryId($parentCategoryId, $tree);
    }

    public static function isLeafCategoryPublishable($categoryTree)
    {
        foreach ($categoryTree as $category) {
            if (!$category->isPublished()) {
                return false;
            }
        }

        return true;
    }

    public static function getMembersCount(Category $category)
    {
        $children = $category->getChildren();
        $childrenCount = sizeof($children);
        foreach ($children as $child) {
            $childrenCount += self::getMembersCount($child);
        }

        return $childrenCount;
    }

    public static function organizingCategoriesTreeView(array $categories)
    {
        $array = [];
        foreach ($categories as $category) {
            if ($category->level != 1) {
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
        foreach ($categories as $category) {
            if ($category->level != 1) {
                continue;
            }
            $array[] = $category;
            $children = self::getChildren($categories, $category);
            $array = array_merge($array, $children);
        }

        return $array;
    }

    public static function getCategoryNameTreeStrByLeafCategoryId($id, $lang, $separate)
    {
        $categoryArray = self::getCategoryNameTreeArrayByLeafCategoryId($id);
        return implode($separate, $categoryArray[$lang]);
    }

    public static function getCategoryNameTreeArrayByLeafCategoryId($id)
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

    /*
     * return [
     *      [
     *        (obj) 1
     *        (obj) 1.1
     *        (obj) 1.1.1
     *      ],
     *      [
     *        (obj) 1
     *        (obj) 1.1
     *        (obj) 1.1.2
     *      ],
     *      [
     *        (obj) 1
     *        (obj) 1.2
     *        (obj) 1.2.1
     *      ]
     * ]
     */

    public static function groupLeafCategoriesAssociateWithParents($categories)
    {
        $categories = self::organizingCategoriesTreeView($categories);
        $categoryArr = [];
        foreach ($categories as $category) {
            $collectedArray = self::collectLeafCategories($category);
            $categoryArr = array_merge($categoryArr, $collectedArray);
        }

        return $categoryArr;
    }

    public static function getCategoryGroupsByPageCol()
    {
        $pageColLimit = 15;
        $categories = Category::getAll();
        $categories = self::organizingCategoriesTreeView($categories);

        $array = [];
        $arrayIndex = 0;
        $arrayPositionCount = 0;
        foreach ($categories as $category) {
            $categoryLength = self::getChildrenCount($category) + 1;
            if(($arrayPositionCount+$categoryLength) > $pageColLimit){
                $arrayIndex++;
                $arrayPositionCount = 0;
            }

            $array[$arrayIndex][] = $category;
            $arrayPositionCount += $categoryLength;
        }

        return $array;
    }

    private static function getChildren(array $categories, $parentCategory)
    {
        $children = [];
        foreach ($categories as $category) {
            if ($category->parent_category_id !== $parentCategory->id) {
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
        foreach ($categories as $category) {
            if ($category->parent_category_id !== $parentCategory->id) {
                continue;
            }

            $category->setChildren(self::getChildrenTree($categories, $category));
            $children[] = $category;

        }

        return $children;
    }

    private static function collectLeafCategories($category, &$collector = [], &$collectorIndex = 0)
    {
        $collector[$collectorIndex][] = $category;

        foreach ($category->getChildren() as $childIndex => $child) {

            $children = $child->getChildren();
            $noOfChildren = sizeof($children);

            if (!empty($noOfChildren)) {
                $collector = self::collectLeafCategories($child, $collector, $collectorIndex);
            } else {
                $collector[$collectorIndex][] = $child;
            }

            $prevCollectorIndex = $collectorIndex;

            if ($childIndex == sizeof($category->getChildren()) - 1 || !isset($collector[$prevCollectorIndex])) {
                $t = 1;
//                $collector[$collectorIndex][] = $category;
                continue;
            }

            $collectorIndex++;
            for ($i = 0; $i < ($child->level - 1); $i++) {
                $collector[$collectorIndex][] = $collector[$prevCollectorIndex][$i];
            }

        }

        return $collector;
    }

    private static function getChildrenCount(Category $category, $count = 0)
    {
        $children = $category->getChildren();
        $count += sizeof($children);
        foreach ($children as $child)
        {
            $count = self::getChildrenCount($child, $count);
        }

        return $count;
    }

}