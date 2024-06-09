<?php

namespace helpers\services;

use helpers\repositories\CategoryContentRepository;
use model\CategoryContent;
use model\Template;

class ContentService
{
    public static function getLastUpdatedDate()
    {
        $latestUpdatedContent = CategoryContentRepository::getLastUpdatedContent();
        $date =  $latestUpdatedContent->updated_at;
        $date=date_create($date);
        return date_format($date,"d.M.Y");
    }
    public static function getTemplatesByCategoryId(int $categoryId, string $lang)
    {
        $templates = [];
        $contents = CategoryContentRepository::getPublishedContentsInDisplayOrder($categoryId, $lang);
        foreach ($contents as $content){
            if($content->type === CategoryContent::TYPE_CONNECTOR){
                $data = [
                    'connector' => $content,
                ];
            }else{
                $data = [
                    'ad_on_content' => $content,
                ];
            }

            $template = TemplateService::getTemplateByFillingDataById($content->templateId, $data,$lang, Template::MODE_VIEW);
            if(is_null($template)) continue;
            $templates[] = $template;

        }

        return $templates;
    }
}