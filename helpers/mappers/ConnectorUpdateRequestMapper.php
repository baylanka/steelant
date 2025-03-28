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

class ConnectorUpdateRequestMapper
{
    public static function getModel(Request $request): Connector
    {
        $connector = Connector::getById($request->get('id',1));
        $connector->name = $request->get('name');
        $connector->visibility = $request->get('visibility', Connector::UNPUBLISHED);
        $connector->grade = $request->get('grade');
        $connector->description = self::getDescriptionJson($request);
        $connector->weight_m = self::getWeightMetrics($request);
        $connector->weight_i = self::getWeightImperial($request);
        $connector->thickness_m = self::getThicknessMetrics($request);
        $connector->thickness_i = self::getThicknessImperial($request);
        $connector->standard_lengths_m = self::getLengthMetrics($request);
        $connector->standard_lengths_i = self::getLengthImperial($request);
        $connector->max_tensile_strength_m = self::getMaxTensileStrengthMMetrics($request);
        $connector->max_tensile_strength_i = self::getMaxTensileStrengthIMetrics($request);
        $connector->standard_length_type = json_encode($request->get('standard_length_type'));
        $connector->other_attrs = self::getOtherAttrJson($request);


        $connector->temp_content = self::getContent($connector->id, $request);
        $connector->temp_content_templates = self::getContentTemplates($request,
                                                                    $connector->temp_content->id);
        return $connector;
    }

    private static function getOtherAttrJson(Request $request)
    {
        return json_encode([
            'subtitle' => self::getSubtitleArray($request),
            'footer' => self::getFooterArray($request),
            'pressure_load' => self::getPressureLoadArray($request),
            'deformation_path' => self::getDeformationPathArray($request),
        ]);
    }

    private static function getDeformationPathArray(Request $request): array
    {
        if (
            (
                !$request->has('deformation_path_m')
                && !$request->has('deformation_path_i')
            )
            ||
            (
                empty($request->get('deformation_path_m'))
                && empty($request->get('deformation_path_i'))
            )
        )
        {
            return [];
        }
        return [
            'm' => addslashes($request->get('deformation_path_m','')),
            'i' => addslashes($request->get('deformation_path_i','')),
        ];
    }

    private static function getPressureLoadArray(Request $request): array
    {
        if (
            (
                !$request->has('pressure_load_m')
                && !$request->has('pressure_load_i')
            )
            ||
            (
                empty($request->get('pressure_load_m'))
                && empty($request->get('pressure_load_i'))
            )
        )
        {
            return [];
        }
        return [
            'm' => addslashes($request->get('pressure_load_m','')),
            'i' => addslashes($request->get('pressure_load_i','')),
        ];
    }

    private static function getFooterArray(Request $request)
    {
        if (
            (
                !$request->has('footer_de')
                && !$request->has('footer_en_gb')
                && !$request->has('footer_fr')
                && !$request->has('footer_en_us')
            )
            ||
            (
                empty($request->get('footer_de'))
                && empty($request->get('footer_en_gb'))
                && empty($request->get('footer_fr'))
                && empty($request->get('footer_en_us'))
            )
        )
        {
            return [];
        }


        return [
            LanguagePool::GERMANY()->getLabel() => $request->get('footer_de','',false),
            LanguagePool::FRENCH()->getLabel() => $request->get('footer_fr','',false),
            LanguagePool::UK_ENGLISH()->getLabel() => $request->get('footer_en_gb','',false),
            LanguagePool::US_ENGLISH()->getLabel() => $request->get('footer_en_us','',false),
        ];
    }

    private static function getSubtitleArray(Request $request)
    {
        if (
            (
                !$request->has('subtitle_de')
                && !$request->has('subtitle_en_gb')
                && !$request->has('subtitle_fr')
                && !$request->has('subtitle_en_us')
            )
            ||
            (
                empty($request->get('subtitle_de'))
                && empty($request->get('subtitle_en_gb'))
                && empty($request->get('subtitle_fr'))
                && empty($request->get('subtitle_en_us'))
            )
        )
        {
            return [];
        }

        return [
            LanguagePool::GERMANY()->getLabel() => $request->get('subtitle_de','',false),
            LanguagePool::FRENCH()->getLabel() => $request->get('subtitle_fr','',false),
            LanguagePool::UK_ENGLISH()->getLabel() => $request->get('subtitle_en_gb','',false),
            LanguagePool::US_ENGLISH()->getLabel() => $request->get('subtitle_en_us','',false),
        ];
    }

    private static function getDescriptionJson(Request $request)
    {
        return json_encode([
            LanguagePool::GERMANY()->getLabel() => $request->get('description_de', '', false),
            LanguagePool::US_ENGLISH()->getLabel() => $request->get('description_en_us', '', false),
            LanguagePool::UK_ENGLISH()->getLabel() => $request->get('description_en_gb', '', false),
            LanguagePool::FRENCH()->getLabel() => $request->get('description_fr', '', false),
        ]);
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
            if(FileUtility::isVideo($file)){
                $fileName = "video_{$fileOriginalName}($index)_" . time() . "." . FileUtility::getExtension($file);
                $type = Media::TYPE_VIDEO;
            }else{
                $fileName = "image_{$fileOriginalName}($index)_" . time() . "." . FileUtility::getExtension($file);
                $type = Media::TYPE_IMAGE;
            }

            $imageMedia = self::uploadFile($file, $type, $directoryPath, $fileName);

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

            $fileName = FileUtility::getFileNamePhraseFromURL($fileURL);
            $fileName = substr($fileName,6,5);
            $fileExtension = FileUtility::getFileExtensionFromURL($fileURL);
            if(FileUtility::isImageExtension($fileExtension)){
                $fileName = "video_{$fileName}({$index})_" . time() . "." . $fileExtension;
                $type = Media::TYPE_VIDEO;
            }else{
                $fileName = "image_{$fileName}({$index})_" . time() . "." . $fileExtension;
                $type = Media::TYPE_IMAGE;
            }

            $imageMedia = self::uploadFileFromURL($fileURL, $fileName, $type, $directoryPath);
            if(!$imageMedia){
                continue;
            }

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


        if(
            (
                    empty($imageFilesArray)
                    &&
                    (
                        !isset($downloadableArray['name'])
                        ||
                        empty(array_filter(array_values($imageFilesArray['name'])))
                    )
            )
            &&  empty($imageUrlArray))
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

        if(
            (
                empty($downloadableArray)
                &&
                (
                    !isset($downloadableArray['name'])
                    ||
                    empty(array_filter(array_values($downloadableArray['name'])))
                )
            )
            &&  empty($downloadableFileURLArray))
        {
            return $contentTemplates;
        }

        $contentTemplates = self::getContentTemplateWithDownloadableFileFromURL($contentTemplates, $request, $directoryPath);
        return  self::getContentTemplateWithDownloadableFileFromFile($contentTemplates, $request, $directoryPath);
    }

    private static function getContentTemplateWithDownloadableFileFromURL(array $contentTemplates, $request, $directoryPath)
    {
        $downloadableURLArray = $request->get('downloadable_src', []);
        $downloadableArray = $request->get('downloadable', []);
        $downloadablePlaceholderArray = $request->get('downloadable_placeholder',[]);

        foreach ($downloadableURLArray as $index => $fileURL){
            if(empty($fileURL)){
                continue;
            }

            $fileName = FileUtility::getFileNamePhraseFromURL($fileURL);
            $fileName = substr($fileName,18,5);
            $fileExtension = FileUtility::getFileExtensionFromURL($fileURL);
            $fileNameWithExtension = "{$fileName}.{$fileExtension}";
            $fileName = "downloadable_file_{$fileName}({$index})_" . time() . "." . $fileExtension;
            $downloadableMedia = self::uploadFileFromURL($fileURL, $fileName, Media::TYPE_FILE, $directoryPath);

            if(!$downloadableMedia){
                continue;
            }

            foreach ($downloadableArray['title'][$index] as $lang => $title){
                $contentTemplateMedia = new ContentTemplateMedia();
                $contentTemplateMedia->placeholder_id = $downloadablePlaceholderArray[$index];
                $contentTemplateMedia->title = $title;
                $contentTemplateMedia->file_name = $downloadableArray['file_name'][$index][$lang] ?? $fileNameWithExtension;
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
        $downloadablePlaceholderArray = $request->get('downloadable_placeholder',[]);

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
            $fileNameWithExtension = $fileOriginalName . "." . FileUtility::getExtension($file);
            $fileName = "downloadable_file_{$fileOriginalName}({$index})_" . time() . "." . FileUtility::getExtension($file);


            $downloadableMedia = self::uploadFile($file, Media::TYPE_FILE, $directoryPath, $fileName);

            foreach ($downloadableArray['title'][$index] as $lang => $title){
                $contentTemplateMedia = new ContentTemplateMedia();
                $contentTemplateMedia->title = $title;
                $contentTemplateMedia->file_name = $downloadableArray['file_name'][$index][$lang] ?? $fileNameWithExtension;
                $contentTemplateMedia->placeholder_id = $downloadablePlaceholderArray[$index];
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

        if(!FileUtility::fileExists($filePath)){
            return false;
        }

        $content = file_get_contents($filePath);
        if(empty($content)){
            return false;
        }

        file_put_contents($target, $content);

        $fileNamePhrase = FileUtility::getFileNamePhraseFromURL($fileURL);

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
        $contentTemplate = new ContentTemplate();
        $contentTemplate->template_id = $templateId;
        $contentTemplate->content_id = $contentId;
        $contentTemplate->language = $language;

        return $contentTemplate;
    }
    private static function getMaxTensileStrengthIMetrics(Request $request)
    {
        $array = [];
        $maxTensileStrengthLabelArray = $request->get('max_tensile_strength_label', []);
        $maxTensileStrengthMetricsArray = $request->get('max_tensile_strength_i', []);
        foreach ($maxTensileStrengthMetricsArray as $index => $strength){
            $label = $maxTensileStrengthLabelArray[$index] ?? "";
            if($index === 0 && empty(trim($label))){
                $label = 'general';
            }

            $array[$label] = addslashes($strength);
        }

        return json_encode($array);
    }
    private static function getMaxTensileStrengthMMetrics(Request $request)
    {
        $array = [];
        $maxTensileStrengthLabelArray = $request->get('max_tensile_strength_label', []);
        $maxTensileStrengthMetricsArray = $request->get('max_tensile_strength_m', []);
        foreach ($maxTensileStrengthMetricsArray as $index => $strength){
            $label = $maxTensileStrengthLabelArray[$index] ?? "";
            if($index === 0 && empty(trim($label))){
                $label = 'general';
            }

            $array[$label] = addslashes($strength);
        }

        return json_encode($array);
    }

    private static function getLengthMetrics(Request $request)
    {
        $array = [];
        $lengthLabelArray = $request->get('standard_length_label', []);
        $lengthMetricsArray = $request->get('standard_length_metrics', []);
        foreach ($lengthMetricsArray as $index => $weight){
            $label = $lengthLabelArray[$index] ?? "";
            if($index === 0 && empty(trim($label))){
                $label = 'general';
            }

            $array[$label] = addslashes($weight);
        }

        return json_encode($array);
    }

    private static function getLengthImperial(Request $request)
    {
        $array = [];
        $lengthLabelArray = $request->get('standard_length_label', []);
        $lengthMetricsArray = $request->get('standard_length_imperial', []);
        foreach ($lengthMetricsArray as $index => $weight){
            $label = $lengthLabelArray[$index] ?? "";
            if($index === 0 && empty(trim($label))){
                $label = 'general';
            }

            $array[$label] = addslashes($weight);
        }

        return json_encode($array);
    }

    private static function getThicknessMetrics(Request $request)
    {
        $array = [];
        $thicknessLabelArray = $request->get('thickness_label', []);
        $thicknessMetricsArray = $request->get('thickness_metrics', []);
        foreach ($thicknessMetricsArray as $index => $weight){
            $label = $thicknessLabelArray[$index] ?? "";
            if($index === 0 && empty(trim($label))){
                $label = 'general';
            }

            $array[$label] = addslashes($weight);
        }

        return json_encode($array);
    }

    private static function getThicknessImperial(Request $request)
    {
        $array = [];
        $thicknessLabelArray = $request->get('thickness_label', []);
        $thicknessImperialArray = $request->get('thickness_imperial', []);
        foreach ($thicknessImperialArray as $index => $weight){
            $label = $thicknessLabelArray[$index] ?? '';
            if($index === 0 && empty(trim($label))){
                $label = 'general';
            }

            $array[$label] = addslashes($weight);
        }

        return json_encode($array);
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

            $array[$label] = addslashes($weight);
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

            $array[$label] = addslashes($weight);
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