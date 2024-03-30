<?php

namespace helpers\repositories;

use model\Category;
use model\CategoryContent;
use model\Connector;

class ConnectorRepository extends Connector
{
    public static function getNextDisplayOrderOfCategoryId($categoryId)
    {
        $sql = "
                SELECT display_order_no FROM category_contents
                    WHERE display_order_no = :category_id
                    ORDER BY display_order_no DESC;
        ";
        $params = ['category_id'=>$categoryId];
        $content = CategoryContent::query($sql, $params)->first();
        if(!$content)  return 1;

        return $content->display_order_no + 1;
    }

    public static function getConnectorById($id)
    {
        $sql = "
            SELECT
                category_contents.leaf_category_id AS leaf_category_id,
                connectors.*
            FROM connectors
            INNER JOIN category_contents ON connectors.id = category_contents.element_id         
            WHERE category_contents.`type` = :type
            AND category_contents.id = :id
        ";
        $params = ['type' => CategoryContent::TYPE_CONNECTOR, 'id'=>$id];
        $connector =  self::queryAsArray($sql, $params)->first();
        if(!$connector){
            $connector = json_decode(json_encode([]));
        }

        return json_decode(json_encode($connector));
    }

    public static function getConnectorTemplatesByConnectorId($id)
    {
        $sql = "
            SELECT
                templates.id AS template_id,
                media.id AS media_id,
                media.type AS media_type,
                media.name AS media_name,
                media.path AS media_path,
                content_template_media.title,
                content_templates.language
            FROM connectors
            INNER JOIN category_contents ON connectors.id = category_contents.element_id
            INNER JOIN content_templates ON category_contents.id = content_templates.content_id
            INNER JOIN templates  ON content_templates.template_id = templates.id
            LEFT JOIN content_template_media ON  content_templates.id =  content_template_media.content_template_id 
            LEFT JOIN media ON content_template_media.media_id = media.id
            WHERE category_contents.`type` = :type
            AND connectors.id = :id
        ";

        $params = ['type' => CategoryContent::TYPE_CONNECTOR, 'id'=>$id];

        $connector =  self::queryAsArray($sql, $params)->get();
        if(!$connector){
            $connector = [];
        }

        return json_decode(json_encode($connector));
    }
}