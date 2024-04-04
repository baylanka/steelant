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
        if(empty($request->get('template'))){
            return;
        }

        $templateId = $request->get('template');

        $deContentTemplate = self::getContentTemplate($templateId, LanguagePool::GERMANY()->getLabel(),
                                                                $contentId);
        $frContentTemplate = self::getContentTemplate($templateId, LanguagePool::FRENCH()->getLabel(),
                                                                $contentId);
        $enUsContentTemplate = self::getContentTemplate($templateId, LanguagePool::US_ENGLISH()->getLabel(),
                                                                $contentId);
        $enGdContentTemplate =  self::getContentTemplate($templateId, LanguagePool::UK_ENGLISH()->getLabel(),
                                                                $contentId);

        $contentTemplates =  [
            LanguagePool::GERMANY()->getLabel() => $deContentTemplate,
            LanguagePool::FRENCH()->getLabel() => $frContentTemplate,
            LanguagePool::US_ENGLISH()->getLabel() => $enUsContentTemplate,
            LanguagePool::UK_ENGLISH()->getLabel() => $enGdContentTemplate
        ];

        $contentTemplates = self::getContentTemplateWithDownloadableMediaMetaData($contentTemplates, $request);
        $contentTemplates = self::getContentTemplateWithImageMetaData($contentTemplates, $request);
        return array_values($contentTemplates);
    }

    private static function getContentTemplateWithImageFromFile(array $contentTemplates, $request, $directoryPath)
    {
        $imageFilesArray = $request->get('images', []);
        foreach ($imageFilesArray['name'] as $index => $name){
            if(empty($name)){
                continue;
            }
            $file = [
                'name' => $name,
                'full_path' => $imageFilesArray['full_path'][$index],
                'type' => $imageFilesArray['type'][$index],
                'tmp_name' => $imageFilesArray['tmp_name'][$index],
                'error' => $imageFilesArray['error'][$index],
                'size' => $imageFilesArray['size'][$index],
            ];
            $fileOriginalName = FileUtility::getName($file);
            $fileName = "image_{$fileOriginalName}_" . time() . "." . FileUtility::getType($file);

            $imageMedia = self::uploadFile($file, Media::TYPE_IMAGE, $directoryPath, $fileName);

            foreach ($imageFilesArray['language'][$index] as $langIndex => $language){
                $contentTemplateMedia = new ContentTemplateMedia();
                $contentTemplateMedia->title =  $imageFilesArray['title'][$index][$langIndex] ?? '';
                $contentTemplateMedia->placeholder_id = $imageFilesArray['placeholder'][$index][$langIndex];
                $contentTemplateMedia->temp_media = $imageMedia;
                //content template mostly can contain multiple media. collection media as am array
                $contentTemplates[$language]->temp_content_template_media[] = $contentTemplateMedia;
            }

        }

        return $contentTemplates;
    }

    private static function getContentTemplateWithImageFromURL(array $contentTemplates, $request, $directoryPath)
    {
        $imageURLArray = $request->get('image_paths', []);
        $imageFilesArray = $request->get('images', []);

        foreach ($imageURLArray as $index => $fileURL){
            if(empty($fileURL)){
                continue;
            }

            $fileExtension = FileUtility::getFileExtensionFromURL($fileURL);
            $fileName = "image_" . time() . "." . $fileExtension;
            $imageMedia = self::uploadFileFromURL($fileURL, $fileName, Media::TYPE_IMAGE, $directoryPath);

            foreach ($imageFilesArray['language'][$index] as $langIndex => $language){
                $contentTemplateMedia = new ContentTemplateMedia();
                $contentTemplateMedia->title = $imageFilesArray['title'][$index][$langIndex] ?? '';
                $contentTemplateMedia->placeholder_id = $imageFilesArray['placeholder'][$index][$langIndex];
                $contentTemplateMedia->temp_media = $imageMedia;
                //content template mostly can contain multiple media. collection media as am array
                $contentTemplates[$language]->temp_content_template_media[] = $contentTemplateMedia;
            }

        }

        return $contentTemplates;
    }

    private static function getContentTemplateWithImageMetaData(array $contentTemplates, $request): array
    {
        $directoryPath = "content_assets/media_files/";
        $imageFilesArray = $request->get('images', []);
        $imageUrlArray = $request->get('image_paths', []);

        if((empty($imageFilesArray) || empty($imageFilesArray['name'])) &&  empty($imageUrlArray))
        {
            return $contentTemplates;
        }

        $contentTemplates =  self::getContentTemplateWithImageFromURL($contentTemplates,$request, $directoryPath);
        return self::getContentTemplateWithImageFromFile($contentTemplates, $request, $directoryPath);
    }

    private static function getContentTemplateWithDownloadableMediaMetaData(array $contentTemplates, $request): array
    {
        $directoryPath = "content_assets/downloadable_files/";
        $downloadableArray = $request->get('downloadable', []);
        $downloadableFileURLArray = $request->get('downloadable_src', []);

        if((empty($downloadableArray) || empty($downloadableArray['name'])) &&  empty($downloadableFileURLArray))
        {
            return $contentTemplates;
        }

        $contentTemplates = self::getContentTemplateWithDownloadableFileFromFile($contentTemplates, $request, $directoryPath);
        return  self::getContentTemplateWithDownloadableFileFromURL($contentTemplates, $request, $directoryPath);
    }

    private static function getContentTemplateWithDownloadableFileFromURL(array $contentTemplates, $request, $directoryPath)
    {
        $downloadableURLArray = $request->get('downloadable_src', []);
        $downloadableArray = $request->get('downloadable', []);

        foreach ($downloadableURLArray as $index => $fileURL){
            if(empty($fileURL)){
                continue;
            }

            $fileExtension = FileUtility::getFileExtensionFromURL($fileURL);
            $fileName = "downloadable_" . time() . "." . $fileExtension;
            $downloadableMedia = self::uploadFileFromURL($fileURL, $fileName, Media::TYPE_FILE, $directoryPath);

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
    private static function getContentTemplateWithDownloadableFileFromFile(array $contentTemplates, $request, $directoryPath)
    {
        $downloadableArray = $request->get('downloadable', []);

        if(empty($downloadableArray) || !isset($downloadableArray['name'])){
            return $contentTemplates;
        }

        foreach ($downloadableArray['name'] as $index => $value){
            if(empty($value)){
                continue;
            }
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


    private static function uploadFileFromURL($fileURL, $fileName, $type, $directoryPath)
    {
        $path = $directoryPath . $fileName;
        $target = storage_path("public/{$path}");

        $fileURLParts = explode('/', $fileURL);
        $indexOfStorageKeyword = array_search('storage', $fileURLParts);
        array_splice($fileURLParts, 0, $indexOfStorageKeyword+1);
        $fileRepo = implode('/', $fileURLParts);
        $filePath = storage_path("public/" . $fileRepo);

        file_put_contents($target, file_get_contents($filePath));


        $fileOriginalName = FileUtility::getFileNamePhraseFromURL($fileURL);
        $fileNamePhrase = FileUtility::stripeFileName($fileOriginalName);

        $media = new Media();
        $media->type = $type;
        $media->name =  $fileNamePhrase;
        $media->path = $path;
        return $media;
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

    private static function getContentTemplate($templateId, $language, $contentId)
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
        $weightMetricsArray = $request->get('weight_metrics', []);
        foreach ($weightMetricsArray as $index => $weight){
            $label = $weightLabelArray[$index] ?? "";
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
        $weightMetricsArray = $request->get('weight_imperial', []);
        foreach ($weightMetricsArray as $index => $weight){
            $label = $weightLabelArray[$index] ?? '';
            if($index === 0 && empty(trim($label))){
                $label = 'general';
            }

            $array[$label] = $weight;
        }

        return json_encode($array);
    }

    private static function getContent($connectorId, Request $request): CategoryContent
    {
        $content = CategoryContent::getFirstBy([
            'type' => CategoryContent::TYPE_CONNECTOR,
            'element_id' => $connectorId
        ]);
        $content->leaf_category_id = $request->get('category');
        return $content;
    }
}