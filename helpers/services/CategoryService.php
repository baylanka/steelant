<?php

namespace helpers\services;

use helpers\pools\LanguagePool;
use model\Category;

class CategoryService
{
    public static function isNameUnique($nameEn, $nameDe, $nameFr, $exceptId=null)
    {
        global $container;

        $preparedStatement = "
            SELECT COUNT(*) > 0 AS 'exists'
            FROM categories WHERE ";

        if(!is_null($exceptId)){
            $preparedStatement .= " id <> $exceptId AND (";
        }

        $preparedStatement .=  "
               LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.en'))) = :name_en
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.en'))) = :name_de
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.en'))) = :name_fr
            
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.de'))) = :name_en
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.de'))) = :name_de
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.de'))) = :name_fr
            
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.fr'))) = :name_en
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.fr'))) = :name_de
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.fr'))) = :name_fr ;
          
        ";

        if(!is_null($exceptId)){
            $preparedStatement .= " ); ";
        }else{
            $preparedStatement .= " ; ";
        }
        $params = [
            'name_en' => strtolower($nameEn),
            'name_de' => strtolower($nameDe),
            'name_fr' => strtolower($nameFr),
        ];

        $db = $container->resolve('DB');
        $result = $db->queryAsArray($preparedStatement, $params)->first();
        return (int)$result['exists'] === 0;
    }

    public static function isTitleUnique($titleEn, $titleDe, $titleFr, $exceptId=null)
    {
        global $container;

        $preparedStatement = "
            SELECT COUNT(*) > 0 AS 'exists'
            FROM categories WHERE ";

        if(!is_null($exceptId)){
            $preparedStatement .= " id <> $exceptId AND ";
        }

        $preparedStatement .=  " (
               LOWER(JSON_UNQUOTE(JSON_EXTRACT(title, '$.en'))) = :title_en
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(title, '$.en'))) = :title_de
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(title, '$.en'))) = :title_fr
            
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(title, '$.de'))) = :title_en
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(title, '$.de'))) = :title_de
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(title, '$.de'))) = :title_fr
            
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(title, '$.fr'))) = :title_en
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(title, '$.fr'))) = :title_de
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(title, '$.fr'))) = :title_fr 
            )
        ";

        $params = [
            'title_en' => strtolower($titleEn),
            'title_de' => strtolower($titleDe),
            'title_fr' => strtolower($titleFr),
        ];

        $db = $container->resolve('DB');
        $result = $db->queryAsArray($preparedStatement, $params)->first();
        return (int)$result['exists'] === 0;
    }

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