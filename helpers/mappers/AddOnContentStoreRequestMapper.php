<?php

namespace helpers\mappers;

use app\Request;
use helpers\pools\LanguagePool;
use helpers\repositories\CategoryRepository;
use helpers\repositories\ConnectorRepository;
use model\AddOnContent;
use model\CategoryContent;
use model\ContentTemplate;

class AddOnContentStoreRequestMapper
{
    public static function getModel(Request $request): AddOnContent
    {
        $addOnContent = new AddOnContent();
        $addOnContent->visibility = AddOnContent::UNPUBLISHED;
        $addOnContent->title = self::getTitleJson($request);
        $addOnContent->description = self::getDescriptionJson($request);

        $addOnContent->temp_content = self::getContent($request);
        $addOnContent->temp_content_templates = self::getContentTemplates($request);
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

    private static function getContent(Request $request): CategoryContent
    {
        $content = new CategoryContent();
        $content->leaf_category_id = $request->get('category');
        $content->display_order_no = CategoryRepository::getNextDisplayOrderOfCategoryId($content->leaf_category_id);
        $content->type = CategoryContent::TYPE_ADD_ON_CONTENT;

        return $content;
    }

    private static function getContentTemplates(Request $request): array
    {
        if(empty($request->get('template'))){
            return;
        }

        $templateId = $request->get('template');

        $deContentTemplate = self::getContentTemplate($templateId, LanguagePool::GERMANY()->getLabel());
        $frContentTemplate = self::getContentTemplate($templateId, LanguagePool::FRENCH()->getLabel());
        $enUsContentTemplate = self::getContentTemplate($templateId, LanguagePool::US_ENGLISH()->getLabel());
        $enGdContentTemplate =  self::getContentTemplate($templateId, LanguagePool::UK_ENGLISH()->getLabel());

        $contentTemplates =  [
            LanguagePool::GERMANY()->getLabel() => $deContentTemplate,
            LanguagePool::FRENCH()->getLabel() => $frContentTemplate,
            LanguagePool::US_ENGLISH()->getLabel() => $enUsContentTemplate,
            LanguagePool::UK_ENGLISH()->getLabel() => $enGdContentTemplate
        ];

        return array_values($contentTemplates);
    }

    private static function getContentTemplate($templateId, $language)
    {

        $contentTemplate = new ContentTemplate();
        $contentTemplate->template_id = $templateId;
        $contentTemplate->language = $language;

        return $contentTemplate;
    }
}