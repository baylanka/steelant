<?php

namespace helpers\repositories;

use model\AddOnContent;
use model\CategoryContent;
use model\Connector;

class CategoryContentRepository extends CategoryContent
{
    public static function getContentsInDisplayOrderByCategoryId($categoryId)
    {
        $sql = "
               SELECT *
                        FROM (
                            SELECT
                                   cc.id AS content_id,
                                   con.id AS element_id,
                                   con.name AS element_name,
                                   con.visibility AS status,
                                   cc.id AS category_content_id,
                                   cc.type,
                                   cc.display_order_no
                            FROM category_contents cc
                            INNER JOIN categories c ON cc.leaf_category_id = c.id
                            INNER JOIN connectors con ON cc.element_id = con.id AND cc.type = :connector_type
                            WHERE c.id = :category_id
                        
                            UNION ALL
                        
                            SELECT
                                   cc.id AS content_id,
                                   addc.id AS element_id,
                                   addc.title AS element_name,
                                   addc.visibility AS status,
                                   cc.id AS category_content_id,
                                   cc.type,
                                   cc.display_order_no
                            FROM category_contents cc
                            INNER JOIN categories c ON cc.leaf_category_id = c.id
                            INNER JOIN add_on_contents addc ON cc.element_id = addc.id AND cc.type = :add_on_content_type
                            WHERE c.id = :category_id
                        ) AS merged_results
                        ORDER BY display_order_no;
               ";

        $params = [
            'connector_type' => CategoryContent::TYPE_CONNECTOR,
            'category_id' => $categoryId,
            'add_on_content_type' => CategoryContent::TYPE_ADD_ON_CONTENT
        ];

        return CategoryContent::queryAsArray($sql, $params)->get();
    }

    public static function updateContentsDisplayOrder(array $contentIdList)
    {
        foreach ($contentIdList as $index => $each){
            self::updateById($each, [
                'display_order_no' => ($index+1)
            ]);
        }
    }

    public static function deleteByCategoryId($categoryId)
    {
        self::deleteConnectorContentByCategoryId($categoryId);
        self::deleteAddOnContentByCategoryId($categoryId);
    }

    private static function deleteConnectorContentByCategoryId($categoryId)
    {
        $connectorContents = self::getContentByCategoryIdAndType($categoryId, self::TYPE_CONNECTOR);
        static::deleteConnectorContents($connectorContents);
    }

    private static function deleteAddOnContentByCategoryId($categoryId)
    {
        $addOnContents = self::getContentByCategoryIdAndType($categoryId, self::TYPE_ADD_ON_CONTENT);
        static::deleteAddOnContents($addOnContents);
    }

    private static function getContentByCategoryIdAndType($categoryId, $type)
    {
        $sql =  "
            SELECT *  FROM category_contents                 
                WHERE category_contents.type = :type
                    AND category_contents.leaf_category_id = :category_id
        ";

        $params = [
            'type' => $type,
            'category_id' => $categoryId
        ];

        return  self::query($sql, $params)->get();
    }

    private static function deleteConnectorContents(array $connectorContents)
    {
        foreach ($connectorContents as $content)
        {
            Connector::deleteById($content->element_id);
            static::deleteContent($content);
        }
    }

    private static function deleteAddOnContents(array $addOnContents)
    {
        foreach ($addOnContents as $content)
        {
            AddOnContent::deleteById($content->element_id);
            static::deleteContent($content);
        }
    }

    private static function deleteContent(CategoryContent $content)
    {
        CategoryContentMediaRepository::deleteByContentId($content->id);
        $content->delete();
    }
}