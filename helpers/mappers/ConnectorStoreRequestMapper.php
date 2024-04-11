<?php

namespace helpers\mappers;

use app\Request;
use helpers\repositories\CategoryRepository;
use model\CategoryContent;
use model\Connector;

class ConnectorStoreRequestMapper
{
    public static function getModel(Request $request): Connector
    {
        $connector = new Connector();
        $connector->name = $request->get('name');
        $connector->visibility = Connector::UNPUBLISHED;
        $connector->temp_content = self::getContent($request);
        return $connector;
    }

    private static function getContent(Request $request): CategoryContent
    {
        $content = new CategoryContent();
        $content->leaf_category_id = $request->get('category');
        $content->display_order_no = CategoryRepository::getNextDisplayOrderOfCategoryId($content->leaf_category_id);
        $content->type = CategoryContent::TYPE_CONNECTOR;

        return $content;
    }


}