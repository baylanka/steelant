<?php

namespace helpers\mappers;

use app\Request;
use helpers\pools\LanguagePool;
use helpers\repositories\ConnectorRepository;
use helpers\utilities\FileUtility;
use model\CategoryContent;
use model\Connector;
use model\ContentTemplate;
use model\ContentTemplateMedia;
use model\Media;

class UpdateConnectorRequestMapper
{
    public static function getModel(Request $request): Connector
    {
        $connector = Connector::getById($request->get('id',1));
        $connector->name = $request->get('name');
        $connector->visibility = $request->get('visibility', Connector::UNPUBLISHED);
        $connector->grade = $request->get('grade');
        $connector->description = trim($request->get('description', ''));
        $connector->weight_m = self::getWeightMetrics($request);
        $connector->weight_i = self::getWeightImperial($request);
        $connector->thickness_m = $request->get('thickness_metrics');
        $connector->thickness_i = $request->get('thickness_imperial');
        $connector->standard_lengths_m = $request->get('standard_length_metrics');
        $connector->standard_lengths_i = $request->get('standard_length_imperial');
        $connector->max_tensile_strength_m = $request->get('max_tensile_strength_m');
        $connector->max_tensile_strength_i = $request->get('max_tensile_strength_i');


        $connector->temp_content = self::getContent($connector->id, $request);
        $connector->temp_content_templates = self::getContentTemplates($request,
                                                                    $connector->temp_content->id);
        return $connector;
    }

    private static function getContentTemplates(Request $request, $contentId)
    {
        if(empty($request->get('template_id',5))){
            return;
        }

        $templateId = $request->get('template_id',5);

        $deContentTemplate = self::getContentTemplateLanguage($templateId, LanguagePool::GERMANY()->getLabel(),
                                                                $contentId);
        $frContentTemplate = self::getContentTemplateLanguage($templateId, LanguagePool::FRENCH()->getLabel(),
                                                                $contentId);
        $enUsContentTemplate = self::getContentTemplateLanguage($templateId, LanguagePool::US_ENGLISH()->getLabel(),
                                                                $contentId);
        $enGdContentTemplate =  self::getContentTemplateLanguage($templateId, LanguagePool::UK_ENGLISH()->getLabel(),
                                                                $contentId);

        $contentTemplates =  [
            LanguagePool::GERMANY()->getLabel() => $deContentTemplate,
            LanguagePool::FRENCH()->getLabel() => $frContentTemplate,
            LanguagePool::US_ENGLISH()->getLabel() => $enUsContentTemplate,
            LanguagePool::UK_ENGLISH()->getLabel() => $enGdContentTemplate
        ];

        return array_values(self::getContentTemplateWithMediaMetaData($contentTemplates, $request));
    }

    private static function getContentTemplateWithMediaMetaData(array $contentTemplates, $request)
    {
        $directoryPath = "content_assets/downloadable_files/";
        $downloadableArray = $request->get('downloadable');
        foreach ($downloadableArray['name'] as $index => $value){
            $file = [
                'name' => $value,
                'full_path' => $downloadableArray['full_path'][$index],
                'type' => $downloadableArray['type'][$index],
                'tmp_name' => $downloadableArray['tmp_name'][$index],
                'error' => $downloadableArray['error'][$index],
                'size' => $downloadableArray['size'][$index],
            ];
            $fileOriginalName = FileUtility::getName($file);
            $fileName = "downloadable_file_{$fileOriginalName}_" . time() . "." . FileUtility::getType($file);

            $downloadableMedia = self::uploadFile($file, Media::TYPE_FILE, $directoryPath, $fileName);

            foreach ($downloadableArray['title'][$index] as $lang => $title){
                //downloadable files no need placeholder hint. so, it is ignored here
                $contentTemplateMedia = new ContentTemplateMedia();
                $contentTemplateMedia->title = $title;
                $contentTemplateMedia->temp_media = $downloadableMedia;
                //content template mostly can contain multiple media. collection media as am array
                $contentTemplates[$lang]->temp_content_template_media[] = $contentTemplateMedia;
            }

        }
        return $contentTemplates;
    }

    private static function uploadFile($file, $type, $directoryPath, $fileName)
    {
        $path = $directoryPath . $fileName;
        $target = storage_path("public/{$path}");
        FileUtility::upload($file, $target);

        $media = new Media();
        $media->type = $type;
        $media->name =  FileUtility::getName($file);
        $media->path = $path;
        return $media;
    }

    private static function getContentTemplateLanguage($templateId, $language, $contentId)
    {
        $contentTemplate = ContentTemplate::getFirstBy([
                                                        'template_id' => $templateId,
                                                        'content_id'=> $contentId,
                                                        'language' => $language
                                                        ]);
        if(!$contentTemplate){
            $contentTemplate = new ContentTemplate();
            $contentTemplate->template_id = $templateId;
            $contentTemplate->content_id = $contentId;
            $contentTemplate->language = $language;
        }

        return $contentTemplate;
    }

    private static function getWeightMetrics(Request $request)
    {
        $array = [];
        $weightLabelArray = $request->get('weight_label', []);
        $weightMetricsArray = $request->get('weight_metrics');
        foreach ($weightMetricsArray as $index => $weight){
            $label = $weightLabelArray[$index];
            if($index === 0 && empty(trim($label))){
                $label = 'general';
            }

            $array[$label] = $weight;
        }

        return json_encode($array);
    }

    private static function getWeightImperial(Request $request)
    {
        $array = [];
        $weightLabelArray = $request->get('weight_label', []);
        $weightMetricsArray = $request->get('weight_imperial');
        foreach ($weightMetricsArray as $index => $weight){
            $label = $weightLabelArray[$index];
            if($index === 0 && empty(trim($label))){
                $label = 'general';
            }

            $array[$label] = $weight;
        }

        return json_encode($array);
    }

    private static function getContent($contentId, Request $request): CategoryContent
    {
        $content = CategoryContent::getFirstBy([
            'type' => CategoryContent::TYPE_CONNECTOR,
            'element_id' => $contentId
        ]);
        $content->leaf_category_id = $request->get('category');
        return $content;
    }
}