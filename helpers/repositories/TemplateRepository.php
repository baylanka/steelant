<?php

namespace helpers\repositories;

use helpers\utilities\FileUtility;
use model\Media;
use model\Template;

class TemplateRepository extends Template
{
    public static function getAllConnectors()
    {
        $sql = "
            SELECT * FROM templates
                WHERE type = :type
                ORDER BY created_at ASC;
            ";
        $params = ['type'=> Template::TYPE_CONNECTOR];
        return Template::query($sql,$params)->get();
    }

    public static function getAllAddOn()
    {
        $sql = "
            SELECT * FROM templates
                WHERE type = :type
                ORDER BY created_at DESC;
            ";
        $params = ['type'=> Template::TYPE_ADD_ON];
        return Template::query($sql,$params)->get();
    }
}