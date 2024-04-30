<?php

namespace helpers\repositories;

use model\Category;
use model\CategoryContent;
use model\Connector;

class ConnectorRepository extends Connector
{
    public static function isNameUnique($leafCategoryId, $name, $exceptId = null)
    {
        global $container;

        $params = [
            'content_type' => CategoryContent::TYPE_CONNECTOR,
            'connector_name' => $name,
            'leaf_category_id' => $leafCategoryId
        ];

        $preparedStatement = "
            SELECT COUNT(connectors.id) > 0 AS 'exists'
                FROM connectors 
                INNER JOIN category_contents ON category_contents.element_id = connectors.id
                WHERE
                    category_contents.type = :content_type AND
                    category_contents.leaf_category_id = :leaf_category_id AND 
                    connectors.name = :connector_name
            ";

        if (!is_null($exceptId)) {
            $preparedStatement .= " AND connectors.id <> :connector_id";
            $params['connector_id'] = $exceptId;
        }

        $preparedStatement .= "
                        GROUP BY category_contents.leaf_category_id;
        ";

        $db = $container->resolve('DB');
        $result = $db->queryAsArray($preparedStatement, $params)->first();

        if(!$result){
            return true;
        }
        return (int)$result['exists'] === 0;
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

    public static function getConnectorContentTemplatesByConnectorId($id)
    {
        $sql = "
            SELECT
                category_contents.id AS content_id,
                content_templates.template_id AS template_id,
                media.id AS media_id,
                media.type AS media_type,
                media.name AS media_name,
                media.path AS media_path,
                content_template_media.title AS media_title,
                content_template_media.file_name AS file_name,
                content_template_media.placeholder_id,
                content_templates.language,
                category_contents.leaf_category_id
            FROM connectors
            INNER JOIN category_contents ON connectors.id = category_contents.element_id
            INNER JOIN content_templates ON category_contents.id = content_templates.content_id
            INNER JOIN templates  ON content_templates.template_id = templates.id
            LEFT JOIN content_template_media ON  content_templates.id =  content_template_media.content_template_id 
            LEFT JOIN media ON content_template_media.media_id = media.id
            WHERE category_contents.`type` = :type
            AND connectors.id = :id
            ORDER BY COALESCE(content_template_media.placeholder_id, 9999999) ASC
        ";

        $params = ['type' => CategoryContent::TYPE_CONNECTOR, 'id'=>$id];

        $connector =  self::queryAsArray($sql, $params)->get();
        if(!$connector){
            $connector = [];
        }

        return json_decode(json_encode($connector));
    }
}