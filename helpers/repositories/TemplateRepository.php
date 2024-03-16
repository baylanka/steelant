<?php

namespace helpers\repositories;

use model\Template;

class TemplateRepository extends Template
{
    public static function getAllConnectorTypes()
    {
        $sql = "
            SELECT * FROM templates
                where type = :type
                order by created_at DESC;
            ";
        $params = ['type'=> Template::TYPE_CONNECTOR];
        return Template::query($sql,$params)->get();
    }
}