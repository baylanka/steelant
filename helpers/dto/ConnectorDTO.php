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
    public bool $hasMultiGrades;
    public array $thickness;
    public array $thickness_i;
    public array $thickness_m;

    public string $description_de;
    public string $description_en_us;
    public string $description_en_db;
    public string $description_fr;
    public array $standardLength;
    public array $standardLength_m;
    public array $standardLength_i;
    public array $standardLengthTypes;
    public array $weights;
    public array $weights_i;
    public array $weights_m;
    public array $maxTensile;
    public array $maxTensile_m;
    public array $maxTensile_i;

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
        $this->setName();
        $this->grade = $this->element->grade ?? '';
        $this->setHasMultiGrades();

        $this->setLengthTypeArray();
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


        $this->setPressureLoadValues($lang);
        $this->setDeformationPathValue($lang);

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

    private function setHasMultiGrades()
    {
        $gradeArr = explode(',', $this->grade);
        $this->hasMultiGrades = sizeof($gradeArr) > 1;
    }

    private function setPressureLoadValues($lang)
    {
        $this->pressure_load_m = stripcslashes($this->element->getPressureLoadMetricsValue());
        $this->pressure_load_i = stripcslashes($this->element->getPressureLoadImperialValue());

        switch($lang){
            case LanguagePool::FRENCH()->getLabel():
            case LanguagePool::GERMANY()->getLabel():
                $this->pressure_load_m = $this->replaceWithComma($this->pressure_load_m);
                $this->pressure_load_i = $this->replaceWithComma($this->pressure_load_i);
                break;
            case LanguagePool::US_ENGLISH()->getLabel():
            case LanguagePool::UK_ENGLISH()->getLabel():
                $this->pressure_load_m = $this->replaceWithDot($this->pressure_load_m);
                $this->pressure_load_i = $this->replaceWithDot($this->pressure_load_i);
                break;
        }
    }

    private function setDeformationPathValue($lang)
    {
        $this->deformation_path_m = stripcslashes($this->element->getDeformationPathMetricsValue());
        $this->deformation_path_i = stripcslashes($this->element->getDeformationPathImperialValue());


        switch($lang){
            case LanguagePool::FRENCH()->getLabel():
            case LanguagePool::GERMANY()->getLabel():
                $this->deformation_path_m = $this->replaceWithComma($this->deformation_path_m);
                $this->deformation_path_i = $this->replaceWithComma($this->deformation_path_i);
                break;
            case LanguagePool::US_ENGLISH()->getLabel():
            case LanguagePool::UK_ENGLISH()->getLabel():
                $this->deformation_path_m = $this->replaceWithDot($this->deformation_path_m);
                $this->deformation_path_i = $this->replaceWithDot($this->deformation_path_i);
                break;

        }
    }

    private function setName()
    {
        if($this->language == LanguagePool::FRENCH()->getLabel()){
            $this->name = str_replace('Leg','Jambe', $this->element->name);
            return;
        }
        $this->name = $this->element->name;
    }

    private function setLengthTypeArray()
    {
        $this->standardLengthTypes = json_decode($this->element->standard_length_type ?? '{}', true);
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

    private function getTranslatedValue($rawArray, $replaceCollection)
    {
        foreach ($rawArray as $key => $value)
        {
            foreach ($replaceCollection as $replaceArr){
                $key = str_replace($replaceArr[0], $replaceArr[1], $key);
                $rawArray[$key] = str_replace($replaceArr[0], $replaceArr[1], $value);
            }
        }

        return $rawArray;
    }

    private function getTranslatedKey($rawArray, $replaceCollection)
    {
        $arr = [];
        foreach ($rawArray as $key => $value)
        {
            $updatedKey = $key;
            foreach ($replaceCollection as $replaceArr){
                $updatedKey = str_replace($replaceArr[0], $replaceArr[1], $updatedKey);
            }

            $arr[$updatedKey] = $value;
        }

        return $arr;
    }

    public function getLengthOfLang()
    {
        switch($this->language){
            case LanguagePool::FRENCH()->getLabel():
                $valueArray = $this->getTranslatedValue($this->standardLength_m, [
                    ['to', ' à '],
                    ['up to', ' jusqu’à '],
                    ['Center', 'Centre'],
                ]);

                return  $this->getTranslatedKey($valueArray, [
                    ['Center', 'Centre'],
                    ['Leg', 'Jambe'],
                ]);
            case LanguagePool::GERMANY()->getLabel():
                return $this->getTranslatedValue($this->standardLength_m, [
                    ['to', ' bis '],
                    ['up to', ' bis zu '],
                ]);
            case LanguagePool::UK_ENGLISH()->getLabel():
                return $this->standardLength_m;
            case LanguagePool::US_ENGLISH()->getLabel():
                $arr = [];
                $standardLength_i = $this->standardLength_i;
                $standardLength_m = $this->standardLength_m;

                foreach ($standardLength_i as $key => $value){
                    if(isset($standardLength_m[$key]) && !empty($standardLength_m[$key])){
                        $metricsValue = $standardLength_m[$key];
                        $metricsValue = str_replace('up to','', $metricsValue);

                        $value = $value .  " <span class='m-0 d-inline-block'>(" . $metricsValue.")</span>";
                        $arr[$key] = $value;
                    }


                }
                return $arr;
        }
    }

    public function getThicknessArrayOfLang()
    {
        switch($this->language){
            case LanguagePool::FRENCH()->getLabel():
                return  $this->getTranslatedKey($this->thickness_m, [
                    ['Center', 'Centre'],
                    ['Leg', 'Jambe'],
                ]);
            case LanguagePool::GERMANY()->getLabel():
            case LanguagePool::UK_ENGLISH()->getLabel():
                return  $this->thickness_m ;
            case LanguagePool::US_ENGLISH()->getLabel():
                $arr = [];
                foreach ($this->thickness_i as $key => $value){
                    if(isset($this->thickness_m[$key]) && !empty($this->thickness_m[$key])){
                        $value = $value .  " <span class='m-0 d-inline-block'>(" . $this->thickness_m[$key].")</span>";
                        $arr[$key] = $value;
                    }


                }
                return $arr;
        }
    }

    public function getWeightArrayOfLang()
    {
        switch($this->language){
            case LanguagePool::FRENCH()->getLabel():
                return  $this->getTranslatedKey($this->weights_m, [
                    ['Center', 'Centre'],
                    ['Leg', 'Jambe'],
                ]);
            case LanguagePool::GERMANY()->getLabel():
            case LanguagePool::UK_ENGLISH()->getLabel():
                return $this->weights_m;

            case LanguagePool::US_ENGLISH()->getLabel():
                $arr = [];
                foreach ($this->weights_i as $key => $value){
                    if(isset($this->weights_m[$key]) && !empty($this->weights_m[$key])){
                        $value = $value .  " <span class='m-0 d-inline-block'>(" . $this->weights_m[$key].")</span>";
                        $arr[$key] = $value;
                    }


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
                        'name' => $each['file_name'][$lang]
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
                return  $this->getTranslatedKey($this->maxTensile_m, [
                    ['Center', 'Centre'],
                    ['Leg', 'Jambe'],
                ]);
            case LanguagePool::GERMANY()->getLabel():
            case LanguagePool::UK_ENGLISH()->getLabel():
                return  $this->maxTensile_m;
            case LanguagePool::US_ENGLISH()->getLabel():
                $arr = [];
                foreach ($this->maxTensile_i as $key => $value){
                    if(isset($this->maxTensile_m[$key]) && !empty($this->maxTensile_m[$key])){
                        $metricsValue = $this->maxTensile_m[$key];
                        $femFlag = (strpos($value,"FEM") !== false
                                    || strpos($metricsValue,"FEM") !== false) ? ", (FEM)" : "";

                        $pureImperialValue =  str_replace(', (FEM)','', $value);
                        $pureImperialValue =  str_replace('(FEM)','', $pureImperialValue);

                        $pureMetricsValue = str_replace(', (FEM)','', $metricsValue);
                        $pureMetricsValue = str_replace('(FEM)','', $pureMetricsValue);

                        $value = $pureImperialValue
                                 .  " <span class='m-0 d-inline-block'>(" . $pureMetricsValue .")</span>"
                                 .   $femFlag;
                        $arr[$key] = $value;
                    }


                }
                return $arr;
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
            case LanguagePool::UK_ENGLISH()->getLabel():
                return  $this->pressure_load_m;
            case LanguagePool::US_ENGLISH()->getLabel():

                if(empty($this->pressure_load_i) && empty($this->pressure_load_m))
                    return "";

                return $this->pressure_load_i . " <span class='m-0 d-inline-block'>(" . $this->pressure_load_m.")</span>";
        }
    }
    public function getDeformationPathOfLang()
    {
        switch($this->language){
            case LanguagePool::FRENCH()->getLabel():
            case LanguagePool::GERMANY()->getLabel():
            case LanguagePool::UK_ENGLISH()->getLabel():
                return  $this->deformation_path_m;
            case LanguagePool::US_ENGLISH()->getLabel():

                if(empty($this->deformation_path_i) && empty($this->deformation_path_m))
                    return "";

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
            $files[$each->media_id]['file_name'][$each->language] =  $each->file_name ?? null;

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
        $this->setRawThickness($lang);

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

    private function setRawThickness($lang)
    {
        $thicknessMetrics = json_decode($this->element->thickness_m ?? '{}', true);
        $this->thickness_m  = array_map('stripcslashes', $thicknessMetrics);
        $thicknessImperial =  json_decode($this->element->thickness_i ?? '{}', true);
        $this->thickness_i =   array_map('stripcslashes', $thicknessImperial);

        switch($lang){
            case LanguagePool::FRENCH()->getLabel():
            case LanguagePool::GERMANY()->getLabel():
                foreach ($this->thickness_m as $key => $value){
                    $this->thickness_m[$key] = $this->replaceWithComma($value);
                }

                foreach ($this->thickness_i as $key => $value){
                    $this->thickness_i[$key] = $this->replaceWithComma($value);
                }

                break;

            case LanguagePool::US_ENGLISH()->getLabel():
            case LanguagePool::UK_ENGLISH()->getLabel():
                foreach ($this->thickness_m as $key => $value){
                    $this->thickness_m[$key] = $this->replaceWithDot($value);
                }

                foreach ($this->thickness_i as $key => $value){
                    $this->thickness_i[$key] = $this->replaceWithDot($value);
                }

                break;
        }


    }
    private function setLength($lang): void
    {
        $this->setRawLengths($lang);

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

    private function setRawLengths($lang)
    {
        $standardLengthM = json_decode($this->element->standard_lengths_m ?? '{}', true);
        $this->standardLength_m  = array_map('stripcslashes', $standardLengthM);
        $standardLengthI = json_decode($this->element->standard_lengths_i ?? '{}', true);
        $this->standardLength_i = array_map('stripcslashes', $standardLengthI);


        switch($lang){
            case LanguagePool::FRENCH()->getLabel():
            case LanguagePool::GERMANY()->getLabel():
                foreach ($this->standardLength_m as $key => $value){
                    $this->standardLength_m[$key] = $this->replaceWithComma($value);
                }

                foreach ($this->standardLength_i as $key => $value){
                    $this->standardLength_i[$key] = $this->replaceWithComma($value);
                }

                break;

            case LanguagePool::US_ENGLISH()->getLabel():
            case LanguagePool::UK_ENGLISH()->getLabel():
                    foreach ($this->standardLength_m as $key => $value){
                        $this->standardLength_m[$key] = $this->replaceWithDot($value);
                    }

                    foreach ($this->standardLength_i as $key => $value){
                        $this->standardLength_i[$key] = $this->replaceWithDot($value);
                    }

                break;
        }
    }

    private function setWeight($lang)
    {
        $this->setRawWeight($lang);

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

    private function setRawWeight($lang)
    {
        $weightsM  = json_decode($this->element->weight_m ?? '{}', true);
        $this->weights_m  = array_map('stripcslashes', $weightsM);
        $weightsI =  json_decode($this->element->weight_i ?? '{}', true);
        $this->weights_i =  array_map('stripcslashes', $weightsI);

        switch($lang){
            case LanguagePool::FRENCH()->getLabel():
            case LanguagePool::GERMANY()->getLabel():
                foreach ($this->weights_m as $key => $value){
                    $this->weights_m[$key] = $this->replaceWithComma($value);
                }

                foreach ($this->weights_i as $key => $value){
                    $this->weights_i[$key] = $this->replaceWithComma($value);
                }

                break;

            case LanguagePool::US_ENGLISH()->getLabel():
            case LanguagePool::UK_ENGLISH()->getLabel():
                foreach ($this->weights_m as $key => $value){
                    $this->weights_m[$key] = $this->replaceWithDot($value);
                }

                foreach ($this->weights_i as $key => $value){
                    $this->weights_i[$key] = $this->replaceWithDot($value);
                }

                break;
        }
    }

    private function setMaxTensileStrength($lang)
    {
        $this->setRawMaxTensileStrength($lang);

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

    private function setRawMaxTensileStrength($lang)
    {
        $maxTensileM = json_decode($this->element->max_tensile_strength_m ?? '{}', true);
        $this->maxTensile_m = array_map('stripcslashes', $maxTensileM);
        $maxTensileI = json_decode($this->element->max_tensile_strength_i ?? '{}', true);
        $this->maxTensile_i = array_map('stripcslashes', $maxTensileI);

        switch($lang){
            case LanguagePool::FRENCH()->getLabel():
            case LanguagePool::GERMANY()->getLabel():
                foreach ($this->maxTensile_m as $key => $value){
                    $this->maxTensile_m[$key] = $this->replaceWithComma($value);
                }

                foreach ($this->maxTensile_i as $key => $value){
                    $this->maxTensile_i[$key] = $this->replaceWithComma($value);
                }

                break;

            case LanguagePool::US_ENGLISH()->getLabel():
            case LanguagePool::UK_ENGLISH()->getLabel():
                foreach ($this->maxTensile_m as $key => $value){
                    $this->maxTensile_m[$key] = $this->replaceWithDot($value);
                }

                foreach ($this->maxTensile_i as $key => $value){
                    $this->maxTensile_i[$key] = $this->replaceWithDot($value);
                }

                break;
        }
    }

    private function replaceWithDot($value)
    {
        $pattern = '/(\d+),(\d+)/';
        $replacement = '$1.$2';
        return preg_replace($pattern, $replacement, $value);
    }

    private function replaceWithComma($value)
    {
        $pattern = '/(\d+)\.(\d+)/';
        $replacement = '$1,$2';
        return preg_replace($pattern, $replacement, $value);
    }

}