<?php

namespace helpers\repositories;

use helpers\services\AdOnService;
use helpers\services\ConnectorService;
use model\AdOnContent;
use model\CategoryContent;
use model\Connector;

class CategoryContentRepository extends CategoryContent
{
    public static function getContentByConnectorId($connectorId)
    {
        return self::getFirstBy([
            'type' => CategoryContent::TYPE_CONNECTOR,
            'element_id' => $connectorId
        ]);
    }

    public static function getContentByAdOnContentId($adOnContentId)
    {
        return self::getFirstBy([
            'type' => CategoryContent::TYPE_ADD_ON_CONTENT,
            'element_id' => $adOnContentId
        ]);
    }
    public static function getPublishedContentsInDisplayOrder($categoryId, $lang)
    {
        $sql = "
               SELECT *
                        FROM (
                            SELECT
                                   con.id AS element_id,
                                   cc.type,
                                   cc.display_order_no
                            FROM category_contents cc
                            INNER JOIN categories c ON cc.leaf_category_id = c.id
                            INNER JOIN connectors con ON cc.element_id = con.id AND cc.type = :connector_type
                            WHERE c.id = :category_id
                              AND con.visibility = :connector_visibility
                        
                            UNION ALL
                        
                            SELECT
                                   addc.id AS element_id,
                                   cc.type,
                                   cc.display_order_no
                            FROM category_contents cc
                            INNER JOIN categories c ON cc.leaf_category_id = c.id
                            INNER JOIN add_on_contents addc ON cc.element_id = addc.id AND cc.type = :add_on_content_type
                            WHERE c.id = :category_id
                              AND addc.visibility = :add_on_visibility
                        ) AS merged_results
                        ORDER BY display_order_no;
               ";

        $params = [
            'category_id' => $categoryId,
            'connector_type' => CategoryContent::TYPE_CONNECTOR,
            'add_on_content_type' => CategoryContent::TYPE_ADD_ON_CONTENT,
            'connector_visibility' => Connector::PUBLISHED,
            'add_on_visibility' => AdOnContent::PUBLISHED
        ];

        $contents =  CategoryContent::queryAsArray($sql, $params)->get();

        $arr = [];
        foreach ($contents as $content){
            $elementId = $content['element_id'];
            $arr[] = $content['type'] == CategoryContent::TYPE_CONNECTOR
                        ?  ConnectorService::getDTOById($elementId, $lang)
                        :  AdOnService::getDTOById($elementId, $lang);
        }

        return $arr;
    }
    public static function getAllContentsInDisplayOrder($categoryId, $lang)
    {
        $sql = "
               SELECT *
                        FROM (
                            SELECT
                                   con.id AS element_id,
                                   cc.type,
                                   cc.display_order_no
                            FROM category_contents cc
                            INNER JOIN categories c ON cc.leaf_category_id = c.id
                            INNER JOIN connectors con ON cc.element_id = con.id AND cc.type = :connector_type
                            WHERE c.id = :category_id
                        
                            UNION ALL
                        
                            SELECT
                                   addc.id AS element_id,
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
            'category_id' => $categoryId,
            'connector_type' => CategoryContent::TYPE_CONNECTOR,
            'add_on_content_type' => CategoryContent::TYPE_ADD_ON_CONTENT,
        ];

        $contents =  CategoryContent::queryAsArray($sql, $params)->get();

        $arr = [];
        foreach ($contents as $content){
            $elementId = $content['element_id'];
            $arr[] = $content['type'] == CategoryContent::TYPE_CONNECTOR
                        ?  ConnectorService::getDTOById($elementId, $lang)
                        :  AdOnService::getDTOById($elementId, $lang);
        }

        return $arr;
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
        $contents = CategoryContent::getAllBy(['leaf_category_id'=>$categoryId]);
        foreach ($contents as $content){
            $content->delete();
        }
    }

    public static function getNextDisplayOrderOfCategoryId($categoryId)
    {
        $sql = "
                SELECT count(id) AS 'existence'  FROM category_contents
                    WHERE leaf_category_id = :category_id
                    ORDER BY display_order_no DESC;
        ";
        $params = ['category_id' => $categoryId];
        $content = self::queryAsArray($sql, $params)->first();
        if (!$content) return 1;

        return $content['existence'] + 1;
    }
}