<?php

namespace helpers\mappers;

use app\Request;
use helpers\pools\LanguagePool;
use helpers\repositories\CategoryRepository;
use model\AdOnContent;
use model\CategoryContent;
use model\ContentTemplate;

class AdOnUpdateRequestMapper
{
    public static function getModel(Request $request)
    {
        $addOnContentId = $request->get('id');
        $addOnContent = AdOnContent::getById($addOnContentId);
        $addOnContent->visibility = $request->get('visibility', AdOnContent::UNPUBLISHED);
        $addOnContent->title = self::getTitleJson($request);
        $addOnContent->description = self::getDescriptionJson($request);

        $addOnContent->temp_content = self::getContent($addOnContentId, $request);
        $addOnContent->temp_content_templates = self::getContentTemplates($request,
                                                                $addOnContent->temp_content->id);

        return $addOnContent;

    }

    private static function getTitleJson(Request $request): string
    {
        return json_encode([
            LanguagePool::GERMANY()->getLabel() => $request->get('title_de'),
            LanguagePool::FRENCH()->getLabel() => $request->get('title_fr'),
            LanguagePool::US_ENGLISH()->getLabel() => $request->get('title_en_us'),
            LanguagePool::UK_ENGLISH()->getLabel() => $request->get('title_en_gb'),
        ]);
    }

    private static function getDescriptionJson(Request $request): string
    {
        return json_encode([
            LanguagePool::GERMANY()->getLabel() => $request->get('description_de',
                '', false),
            LanguagePool::FRENCH()->getLabel() => $request->get('description_fr',
                '', false),
            LanguagePool::US_ENGLISH()->getLabel() => $request->get('description_en_us',
                '', false),
            LanguagePool::UK_ENGLISH()->getLabel() => $request->get('description_en_gb',
                '', false),
        ]);
    }

    private static function getContent($adOnContentId, Request $request): CategoryContent
    {
        $content = CategoryContent::getFirstBy([
            'type' => CategoryContent::TYPE_ADD_ON_CONTENT,
            'element_id' => $adOnContentId
        ]);
        $content->leaf_category_id = $request->get('category');
        return $content;
    }

    private static function getContentTemplates(Request $request, $contentId)
    {
        if(empty($request->get('template'))){
            return [];
        }

        $templateId = $request->get('template');

        $deContentTemplate = self::getContentTemplate($templateId, LanguagePool::GERMANY()->getLabel(), $contentId);
        $frContentTemplate = self::getContentTemplate($templateId, LanguagePool::FRENCH()->getLabel(), $contentId);
        $enUsContentTemplate = self::getContentTemplate($templateId, LanguagePool::US_ENGLISH()->getLabel(), $contentId);
        $enGdContentTemplate =  self::getContentTemplate($templateId, LanguagePool::UK_ENGLISH()->getLabel(), $contentId);

        $contentTemplates =  [
            LanguagePool::GERMANY()->getLabel() => $deContentTemplate,
            LanguagePool::FRENCH()->getLabel() => $frContentTemplate,
            LanguagePool::US_ENGLISH()->getLabel() => $enUsContentTemplate,
            LanguagePool::UK_ENGLISH()->getLabel() => $enGdContentTemplate
        ];

        return array_values($contentTemplates);
    }

    private static function getContentTemplate($templateId, $language, $contentId)
    {
        $contentTemplate = new ContentTemplate();
        $contentTemplate->template_id = $templateId;
        $contentTemplate->content_id = $contentId;
        $contentTemplate->language = $language;

        return $contentTemplate;
    }
}