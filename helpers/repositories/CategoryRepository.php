<?php

namespace helpers\repositories;

use model\Category;

class CategoryRepository extends Category
{

    public static function isNameUnique($nameEn, $nameDe, $nameFr, $exceptId = null)
    {
        global $container;

        $preparedStatement = "
            SELECT COUNT(*) > 0 AS 'exists'
            FROM categories WHERE ";

        if (!is_null($exceptId)) {
            $preparedStatement .= " id <> $exceptId AND (";
        }

        $preparedStatement .= "
               LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.en'))) = :name_en
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.en'))) = :name_de
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.en'))) = :name_fr
            
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.de'))) = :name_en
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.de'))) = :name_de
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.de'))) = :name_fr
            
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.fr'))) = :name_en
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.fr'))) = :name_de
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.fr'))) = :name_fr 
          
        ";

        if (!is_null($exceptId)) {
            $preparedStatement .= " ); ";
        } else {
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

    public static function isTitleUnique($titleEn, $titleDe, $titleFr, $exceptId = null)
    {
        global $container;

        $preparedStatement = "
            SELECT COUNT(*) > 0 AS 'exists'
            FROM categories WHERE ";

        if (!is_null($exceptId)) {
            $preparedStatement .= " id <> $exceptId AND ";
        }

        $preparedStatement .= " (
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

    public static function getAllByOrder($order = "desc")
    {
        $sql = "SELECT * FROM categories ORDER BY created_at {$order}";
        return self::query($sql)->get();
    }

    public static function deleteWithRelevantObjects($id)
    {
        // delete 'category_media', 'media' table rows and media file
        CategoryMediaRepository::deleteByCategoryId($id);
        //delete 'category_content', 'connectors', 'add_on_contents', 'category_content_media', 'media' table rows and media file
        CategoryContentRepository::deleteByCategoryId($id);
        //delete category
        Category::deleteById($id);
        //delete children categories
        self::deleteChildrenByParentCategoryId($id);
    }

    private static function deleteChildrenByParentCategoryId($id)
    {
        $children = Category::getAllBy(['parent_category_id'=>$id]);
        foreach ($children as $child)
        {
            self::deleteWithRelevantObjects($child->id);
        }
    }
}