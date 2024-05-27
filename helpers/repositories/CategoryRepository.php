<?php

namespace helpers\repositories;

use model\Category;
use model\CategoryContent;

class CategoryRepository extends Category
{
    public static function isNameUnique($nameEn, $nameDe, $nameFr, $parentId = null,
                                        $exceptId = null)
    {
        global $container;
        $params = [
            'name_en' => strtolower($nameEn),
            'name_de' => strtolower($nameDe),
            'name_fr' => strtolower($nameFr),
        ];

        $preparedStatement = "
            SELECT *
            FROM categories WHERE ";

        if (!is_null($parentId) && !is_null($exceptId)) {
            $params['parentId'] = $parentId;
            $preparedStatement .= " parent_category_id = :parentId AND id <> $exceptId AND (";
        }elseif (!is_null($exceptId)) {
            $preparedStatement .= " id <> $exceptId AND (";
        }elseif(!is_null($parentId)){
            $params['parentId'] = $parentId;
            $preparedStatement .= " parent_category_id = $parentId AND (";
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

        if (!is_null($exceptId) || !is_null($parentId)) {
            $preparedStatement .= " ); ";
        } else {
            $preparedStatement .= " ; ";
        }


        $db = $container->resolve('DB');
        $result = $db->queryAsArray($preparedStatement, $params)->first();
        if(!$result){
            return true;
        }
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
        if(!$result){
            return true;
        }
        return (int)$result['exists'] === 0;
    }

    public static function getAllByOrder($order = "desc")
    {
        $sql = "SELECT * FROM categories ORDER BY created_at {$order}";
        return self::query($sql)->get();
    }

    public static function deleteWithDependencies($id)
    {
        //delete relevant category entry
        RelevantPageRepository::deleteRelevantPages($id);

        //delete children categories
        self::deleteChildrenByParentCategoryId($id);

        // delete 'category_media', 'media' table rows and media file
        CategoryMediaRepository::deleteByCategoryId($id);

        //delete 'category_content' with its relevant items
        CategoryContentRepository::deleteByCategoryId($id);

        //delete category
        Category::deleteById($id);
    }

    public static  function hasThirdLevelsOfChildren($categoryId)
    {
        $sql = "
                    SELECT COUNT(*) AS 'category_count'
                        FROM categories c1
                        JOIN categories c2 ON c1.id = c2.parent_category_id
                        JOIN categories c3 ON c2.id = c3.parent_category_id
                        WHERE c1.id = :parent_id
                        AND c2.level = 2
                        AND c3.level = 3;
               ";

        $params = ['parent_id' => $categoryId];
        $content = self::queryAsArray($sql, $params)->first();
        if (!$content) return false;

        return $content['category_count'] > 0;
    }

    private static function deleteChildrenByParentCategoryId($id)
    {
        $children = Category::getAllBy(['parent_category_id'=>$id]);
        foreach ($children as $child)
        {
            self::deleteWithDependencies($child->id);
        }
    }
}