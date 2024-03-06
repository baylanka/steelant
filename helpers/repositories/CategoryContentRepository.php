<?php

namespace helpers\repositories;

use model\AddOnContent;
use model\CategoryContent;
use model\Connector;

class CategoryContentRepository extends CategoryContent
{
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
                    AND category_contents.root_category_id = :category_id
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