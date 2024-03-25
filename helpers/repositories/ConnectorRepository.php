<?php

namespace helpers\repositories;

use model\Category;
use model\CategoryContent;
use model\Connector;

class ConnectorRepository extends Connector
{
    public static function getAllConnectorsWithCategoryMetaData()
    {
        $sql = "
            SELECT
                
                category_contents.root_category_id AS leaf_category_id,
                connectors.*
            FROM connectors
            INNER JOIN category_contents ON connectors.id = category_contents.element_id
           
            WHERE category_contents.`type` = :type
        ";
        $params = ['type' => CategoryContent::TYPE_CONNECTOR];
        return self::queryAsArray($sql, $params)->get();
    }
}