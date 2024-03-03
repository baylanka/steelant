<?php

namespace helpers\services;

use helpers\pools\LanguagePool;

class CategoryService
{
    public static function isNameUnique($nameEn, $nameDe, $nameFr)
    {
        global $container;

        $preparedStatement = "
            SELECT COUNT(*) > 0 AS 'exists'
            FROM categories
            WHERE LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.en'))) = :name_en
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.en'))) = :name_de
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.en'))) = :name_fr
            
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.de'))) = :name_en
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.de'))) = :name_de
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.de'))) = :name_fr
            
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.fr'))) = :name_en
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.fr'))) = :name_de
            OR LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.fr'))) = :name_fr ;

        ";

        $params = [
            'name_en' => strtolower($nameEn),
            'name_de' => strtolower($nameDe),
            'name_fr' => strtolower($nameFr),
        ];

        $db = $container->resolve('DB');
        $result = $db->queryAsArray($preparedStatement, $params)->first();
        return (int)$result['exists'] !== 1;
    }
}