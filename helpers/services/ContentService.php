<?php

namespace helpers\services;

use helpers\repositories\CategoryContentRepository;
use model\CategoryContent;
use model\Template;

class ContentService
{
    public static function getTemplatesByCategoryId(int $categoryId, string $lang)
    {
        $templates = [];
        $contents = CategoryContentRepository::getContentsInDisplayOrderByCategoryId($categoryId);
        foreach ($contents as $content){
            $elementId = $content['element_id'];
            if($content['type'] === CategoryContent::TYPE_CONNECTOR){
                $template = TemplateService::getConnectorTemplateBy($elementId, $lang, Template::MODE_VIEW);
                if(is_null($template)) continue;
                $templates[] = $template;
            }
        }

        return $templates;
    }
}