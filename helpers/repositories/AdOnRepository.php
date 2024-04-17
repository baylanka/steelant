<?php

namespace helpers\repositories;

use model\AdOnContent;
use model\CategoryContent;

class AdOnRepository extends AdOnContent
{
    public static function getAddOnContentTemplatesByConnectorId($id)
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
                content_template_media.placeholder_id,
                content_templates.language,
                category_contents.leaf_category_id
            FROM add_on_contents
            INNER JOIN category_contents ON add_on_contents.id = category_contents.element_id
            INNER JOIN content_templates ON category_contents.id = content_templates.content_id
            INNER JOIN templates  ON content_templates.template_id = templates.id
            LEFT JOIN content_template_media ON  content_templates.id =  content_template_media.content_template_id 
            LEFT JOIN media ON content_template_media.media_id = media.id
            WHERE category_contents.`type` = :type
            AND add_on_contents.id = :id
            ORDER BY COALESCE(content_template_media.placeholder_id, 9999999) ASC
        ";

        $params = ['type' => CategoryContent::TYPE_ADD_ON_CONTENT, 'id'=>$id];

        $connector =  self::queryAsArray($sql, $params)->get();
        if(!$connector){
            $connector = [];
        }

        return json_decode(json_encode($connector));
    }
}