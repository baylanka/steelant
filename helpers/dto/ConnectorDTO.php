<?php

namespace helpers\dto;

use helpers\pools\LanguagePool;
use helpers\pools\StandardLengthTypePool;
use helpers\services\CategoryService;
use model\CategoryContent;
use model\Connector;
use model\Media;

class ConnectorDTO extends ElementDTO
{
    public \stdClass|Connector $element;

    public string $name;
    public string $grade;
    public string $thickness;
    public string $thickness_i;
    public string $thickness_m;
    public string $description_de;
    public string $description_en_us;
    public string $description_en_db;
    public string $description_fr;
    public string $standardLength;
    public string $standardLength_m;
    public string $standardLength_i;
    public int $standardLengthType;
    public array $weights;
    public array $weights_i;
    public array $weights_m;
    public string $maxTensile;
    public string $maxTensile_m;
    public string $maxTensile_i;

    public string $subtitle_de;
    public string $subtitle_fr;
    public string $subtitle_en_us;
    public string $subtitle_en_gb;
    public string $footer_de;
    public string $footer_fr;
    public string $footer_en_us;
    public string $footer_en_gb;

    public string $pressure_load_i;
    public string $pressure_load_m;
    public string $deformation_path_i;
    public string $deformation_path_m;

    public array $downloadableFiles;
    public array $imageFiles;

    public function __construct(\stdClass|Connector $connector, $lang, $separator)
    {
        $this->type = CategoryContent::TYPE_CONNECTOR;
        $this->language = $lang;
        $this->element = $connector;

        $this->id = $this->element->id;
        $this->name = $this->element->name;
        $this->grade = $this->element->grade ?? '';
        $this->standardLengthType = $this->element->standard_length_type ?? StandardLengthTypePool::FIXED_SINGLE_VALUE;
        $this->setLanguageDescriptions();
        $this->isPublished = $this->element->visibility;

        $this->subtitle_de = $this->element->getSubtitleOtherAttr(LanguagePool::GERMANY()->getLabel());
        $this->subtitle_fr = $this->element->getSubtitleOtherAttr(LanguagePool::FRENCH()->getLabel());
        $this->subtitle_en_gb = $this->element->getSubtitleOtherAttr(LanguagePool::UK_ENGLISH()->getLabel());
        $this->subtitle_en_us = $this->element->getSubtitleOtherAttr(LanguagePool::US_ENGLISH()->getLabel());

        $this->footer_de = $this->element->getFooterOtherAttr(LanguagePool::GERMANY()->getLabel());
        $this->footer_fr = $this->element->getFooterOtherAttr(LanguagePool::FRENCH()->getLabel());
        $this->footer_en_gb = $this->element->getFooterOtherAttr(LanguagePool::UK_ENGLISH()->getLabel());
        $this->footer_en_us = $this->element->getFooterOtherAttr(LanguagePool::US_ENGLISH()->getLabel());

        $this->pressure_load_m = $this->element->getPressureLoadMetricsValue();
        $this->pressure_load_i = $this->element->getPressureLoadImperialValue();

        $this->deformation_path_m = $this->element->getDeformationPathMetricsValue();
        $this->deformation_path_i = $this->element->getDeformationPathImperialValue();

        $this->setThickness($lang);
        $this->setLength($lang);
        $this->setWeight($lang);
        $this->setTemplateId();
        $this->setCategoryId();
        $this->setCategoryTree($lang, $separator);
        $this->setMaxTensileStrength($lang);
        $this->setDownloadableFiles();
        $this->setImageFiles();
        $this->setContentId();
        $this->setContentLabel();
    }

    private function setLanguageDescriptions()
    {
        $this->description_en_us = $this->element->getDescriptionEnUS();
        $this->description_en_db = $this->element->getDescriptionEnUK();
        $this->description_de = $this->element->getDescriptionDe();
        $this->description_fr = $this->element->getDescriptionFr();
    }

    private function setContentLabel()
    {
        $this->label = $this->name;
    }

    public function getDescriptionOfLang()
    {
        switch($this->language){
            case LanguagePool::FRENCH()->getLabel():
                return $this->description_fr;
            case LanguagePool::GERMANY()->getLabel():
                return  $this->description_de;
            case LanguagePool::UK_ENGLISH()->getLabel():
                return $this->description_en_db;
            case LanguagePool::US_ENGLISH()->getLabel():
                return $this->description_en_us;
        }
    }

    public function getLengthOfLang()
    {
        switch($this->language){
            case LanguagePool::FRENCH()->getLabel():
            case LanguagePool::GERMANY()->getLabel():
                return  $this->standardLength_m;
            case LanguagePool::UK_ENGLISH()->getLabel():
                return $this->standardLength_i;
            case LanguagePool::US_ENGLISH()->getLabel():
                return $this->standardLength_i . " <span class='m-0 d-inline-block'>(" . $this->standardLength_m.")</span>";
        }
    }

    public function getThicknessOfLang()
    {
        switch($this->language){
            case LanguagePool::FRENCH()->getLabel():
            case LanguagePool::GERMANY()->getLabel():
                return  $this->thickness_m ;
            case LanguagePool::UK_ENGLISH()->getLabel():
                return $this->thickness_i;
            case LanguagePool::US_ENGLISH()->getLabel():
                return $this->thickness_i .  " <span class='m-0 d-inline-block'>(" . $this->thickness_m.")</span>";
        }
    }

    public function getWeightArrayOfLang()
    {
        switch($this->language){
            case LanguagePool::FRENCH()->getLabel():
            case LanguagePool::GERMANY()->getLabel():
                return $this->weights_m;
            case LanguagePool::UK_ENGLISH()->getLabel():
                return  $this->weights_i;
            case LanguagePool::US_ENGLISH()->getLabel():
                $arr = [];
                foreach ($this->weights_i as $key => $value){
                    if(isset($this->weights_m[$key])){
                        $value = $value .  " <span class='m-0 d-inline-block'>(" . $this->weights_m[$key].")</span>";
                    }

                    $arr[$key] = $value;
                }
                return $arr;
        }
    }

    public function getImageAttributes($placeholder)
    {
        $arr = [
            'file_src' => null,
            'src' => null,
            'image_file_name' => '',
            'languageName' => "",
            'placeHolderName' => "",
            'media_name' => '',
            'title' => '',
            'titleFieldName'=>'',
            "type"=>''

        ];

        foreach ($this->imageFiles as $index => $each){
            if($each['placeholder'] != $placeholder) continue;
            foreach ($each['title'] as $lang => $value){
                if ($lang === $this->language) {
                    $arr = [
                        'file_src' =>  "image_paths[{$index}]",
                        'src' => $each['file_asset_path'],
                        'image_file_name' => "images[{$index}]",
                        'languageName' => "images[language][{$index}][]",
                        'placeHolderName' => "images[placeholder][{$index}][]",
                        'media_name' => $each['media_name'],
                        'title' => $value ?? '',
                        'titleFieldName' => "images[title][{$index}][]",
                        'type'=>$each['type'],
                    ];

                    return json_decode(json_encode($arr));
                }
            }
        }

        return json_decode(json_encode($arr));
    }

    public function getDownloadableFiles()
    {
        $arr = [];
        foreach ($this->downloadableFiles as $each){

            foreach ($each['title'] as $lang => $value){
                if($lang === $this->language){
                    $arr[] = [
                        'media_name'  => $each['media_name'],
                        'file_asset_path' => $each['file_asset_path'],
                        'title' => $value,
                    ];
                    break;
                }
            }
        }

        return $arr;
    }

    public function getMaxTensileStrengthByLang()
    {
        switch($this->language){
            case LanguagePool::FRENCH()->getLabel():
            case LanguagePool::GERMANY()->getLabel():
                return  $this->maxTensile_m;
            case LanguagePool::UK_ENGLISH()->getLabel():
                return $this->maxTensile_i;
            case LanguagePool::US_ENGLISH()->getLabel():
                return (empty($this->maxTensile_m) && empty($this->maxTensile_i))
                    ? ''
                    : $this->maxTensile_i ." <span class='m-0 d-inline-block'>(".$this->maxTensile_m.")</span>" ;
        }
    }

    public function getSubtitleOfLang()
    {
        switch($this->language){
            case LanguagePool::FRENCH()->getLabel():
                return $this->subtitle_fr;
            case LanguagePool::GERMANY()->getLabel():
                return $this->subtitle_de;
            case LanguagePool::UK_ENGLISH()->getLabel():
                return  $this->subtitle_en_gb;
            case LanguagePool::US_ENGLISH()->getLabel():
                return  $this->subtitle_en_us;
        }
    }

    public function getFooterOfLang()
    {
        switch($this->language){
            case LanguagePool::FRENCH()->getLabel():
                return $this->footer_fr;
            case LanguagePool::GERMANY()->getLabel():
                return $this->footer_de;
            case LanguagePool::UK_ENGLISH()->getLabel():
                return  $this->footer_en_gb;
            case LanguagePool::US_ENGLISH()->getLabel():
                return  $this->footer_en_us;
        }
    }

    public function getPressureLoadOfLang()
    {
        switch($this->language){
            case LanguagePool::FRENCH()->getLabel():
            case LanguagePool::GERMANY()->getLabel():
                return  $this->pressure_load_m;
            case LanguagePool::UK_ENGLISH()->getLabel():
                return $this->pressure_load_i;
            case LanguagePool::US_ENGLISH()->getLabel():
                return $this->pressure_load_i . " <span class='m-0 d-inline-block'>(" . $this->pressure_load_m.")</span>";
        }
    }
    public function getDeformationPathOfLang()
    {
        switch($this->language){
            case LanguagePool::FRENCH()->getLabel():
            case LanguagePool::GERMANY()->getLabel():
                return  $this->deformation_path_m;
            case LanguagePool::UK_ENGLISH()->getLabel():
                return $this->deformation_path_i;
            case LanguagePool::US_ENGLISH()->getLabel():
                return $this->deformation_path_i . " <span class='m-0 d-inline-block'>(" . $this->deformation_path_m.")</span>";
        }
    }


    private function setDownloadableFiles(): void
    {
        $this->setElementProperties();
        $properties = $this->elementProperties;

        if(     !in_array('relations', $properties)
            ||  !isset($this->element->relations['meta_collection'])
        ){
            $this->downloadableFiles = [];
            return;
        }

        $files = [];
        foreach ($this->element->relations['meta_collection'] as $each){
            if(!isset($each->media_id) || $each->media_type !== Media::TYPE_FILE) continue;

            $files[$each->media_id]['title'][$each->language] =  $each->media_title ?? null;

            if(!isset($files[$each->media_id]['file_asset_path'])){
                $files[$each->media_id]['file_asset_path'] = assets('storage/'. $each->media_path);

                $pathArray = explode('/', $each->media_path);
                $storedFileName = $pathArray[sizeof($pathArray)-1];
                $arr = explode('.',$storedFileName);
                $extension = $arr[sizeof($arr)-1];
                $files[$each->media_id]['media_name'] =  $each->media_name . ".{$extension}";
            }
        }

        $this->downloadableFiles =  array_values($files);
    }

    private function setImageFiles(): void
    {
        $this->setElementProperties();
        $properties = $this->elementProperties;

        if(     !in_array('relations', $properties)
            ||  !isset($this->element->relations['meta_collection'])
        ){
            $this->imageFiles = [];
            return;
        }

        $files = [];
        foreach ($this->element->relations['meta_collection'] as $each){
            if(!isset($each->media_id) || $each->media_type === Media::TYPE_FILE) continue;

            $files[$each->media_id]['title'][$each->language] =  $each->media_title ?? null;

            if(!isset($files[$each->media_id]['file_asset_path'])){
                $files[$each->media_id]['file_asset_path'] = assets('storage/'. $each->media_path);

                $pathArray = explode('/', $each->media_path);
                $storedFileName = $pathArray[sizeof($pathArray)-1];
                $arr = explode('.',$storedFileName);
                $extension = $arr[sizeof($arr)-1];
                $files[$each->media_id]['media_name'] =  $each->media_name . ".{$extension}";
                $files[$each->media_id]['placeholder'] =  $each->placeholder_id;
                $files[$each->media_id]['type'] =  $each->media_type;
            }
        }

        $this->imageFiles =  array_values($files);
    }
    private function setThickness($lang): void
    {
        $this->thickness_i = $this->element->thickness_i ?? '';
        $this->thickness_m = $this->element->thickness_m ?? '';
        switch($lang){
            case LanguagePool::FRENCH()->getLabel():
            case LanguagePool::GERMANY()->getLabel():
            case LanguagePool::US_ENGLISH()->getLabel():
                $this->thickness = $this->thickness_m;
                break;
            case LanguagePool::UK_ENGLISH()->getLabel():
                $this->thickness = $this->thickness_i;
                break;

        }

    }

    private function setLength($lang): void
    {
        $this->standardLength_m = $this->element->standard_lengths_m ?? '';
        $this->standardLength_i = $this->element->standard_lengths_i ?? '';

        switch($lang){
            case LanguagePool::FRENCH()->getLabel():
            case LanguagePool::GERMANY()->getLabel():
            case LanguagePool::US_ENGLISH()->getLabel():
                $this->standardLength = $this->standardLength_m;
                break;
            case LanguagePool::UK_ENGLISH()->getLabel():
                $this->standardLength = $this->standardLength_i;
                break;
        }
    }

    private function setWeight($lang)
    {
        $this->weights_m  = json_decode($this->element->weight_m ?? '{}', true);
        $this->weights_i =  json_decode($this->element->weight_i ?? '{}', true);

        switch($lang){
            case LanguagePool::FRENCH()->getLabel():
            case LanguagePool::GERMANY()->getLabel():
            case LanguagePool::US_ENGLISH()->getLabel():
                $this->weights = $this->weights_m;
                break;
            case LanguagePool::UK_ENGLISH()->getLabel():
                $this->weights = $this->weights_i;
                break;
        }
    }

    private function setMaxTensileStrength($lang)
    {
        $this->maxTensile_m  = $this->element->max_tensile_strength_m ?? '';
        $this->maxTensile_i =  $this->element->max_tensile_strength_i ?? '';

        switch($lang){
            case LanguagePool::FRENCH()->getLabel():
            case LanguagePool::GERMANY()->getLabel():
            case LanguagePool::US_ENGLISH()->getLabel():
                $this->maxTensile = $this->maxTensile_m;
                break;
            case LanguagePool::UK_ENGLISH()->getLabel():
                $this->maxTensile = $this->maxTensile_i;
                break;
        }
    }
}