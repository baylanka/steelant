<?php

namespace helpers\repositories;

use helpers\utilities\FileUtility;
use model\Media;
use model\Template;

class TemplateRepository extends Template
{
    public static function getAllConnectorTypes()
    {
        $sql = "
            SELECT * FROM templates
                WHERE type = :type
                ORDER BY created_at DESC;
            ";
        $params = ['type'=> Template::TYPE_CONNECTOR];
        return Template::query($sql,$params)->get();
    }
}