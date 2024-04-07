<?php

namespace helpers\dto;

use helpers\pools\LanguagePool;
use helpers\services\CategoryService;
use model\Connector;
use model\Media;

class ConnectorDTO
{
    private \stdClass|Connector $connector;
    private ?array $connectorProperties;
    public string $language;
    public int $id;
    public string $categoryTree;
    public bool $isPublished;
    public string $name;
    public string $grade;
    public string $thickness;
    public string $thickness_i;
    public string $thickness_m;
    public string $description_de;
    public string $description_en;
    public string $description_fr;
    public string $standardLength;
    public string $standardLength_m;
    public string $standardLength_i;
    public array $weights;
    public array $weights_i;
    public array $weights_m;

    public ?int $templateId;
    public ?int $categoryId;

    public string $maxTensile;
    public string $maxTensile_m;
    public string $maxTensile_i;

    public array $downloadableFiles;
    public array $imageFiles;

    public function __construct(\stdClass|Connector $connector, $lang, $separator)
    {
        $this->language = $lang;
        $this->connector = $connector;

        $this->id = $this->connector->id;
        $this->name = $this->connector->name;
        $this->grade = $this->connector->grade ?? '';
        $this->setLanguageDescriptions();
        $this->isPublished = $this->connector->visibility;
        $this->setThickness($lang);
        $this->setLength($lang);
        $this->setWeight($lang);
        $this->setTemplateId();
        $this->setCategoryId();
        $this->setCategoryTree($lang, $separator);
        $this->setMaxTensileStrength($lang);
        $this->setDownloadableFiles();
        $this->setImageFiles();
    }

    private function setLanguageDescriptions()
    {
        $this->description_en = $this->connector->getDescriptionEn();
        $this->description_de = $this->connector->getDescriptionDe();
        $this->description_fr = $this->connector->getDescriptionFr();
    }

    public function getDescriptionOfLang()
    {
        switch($this->language){
            case LanguagePool::FRENCH()->getLabel():
                return $this->description_fr;
            case LanguagePool::GERMANY()->getLabel():
                return  $this->description_de;
            case LanguagePool::UK_ENGLISH()->getLabel():
            case LanguagePool::US_ENGLISH()->getLabel():
                return $this->description_en;
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
                return $this->standardLength_m . " or " . $this->connector->standard_lengths_i;
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
                return $this->thickness_m . " or " . $this->thickness_i;
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
                foreach ($this->weights_m as $key => $value){
                    if(isset($this->weights_i[$key])){
                        $value = $value . " or " . $this->weights_i[$key];
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
            'titleFieldName'=>''
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
                return $this->maxTensile_m . " or " . $this->maxTensile_i;
        }
    }

    private function setTemplateId(): void
    {
        $this->setConnectorProperties();
        $properties = $this->connectorProperties;
        if(in_array('relations', $properties)
            && isset($this->connector->relations['meta_collection'])
            && !empty(sizeof($this->connector->relations['meta_collection']))
        ){
            $this->templateId = $this->connector->relations['meta_collection'][0]->template_id ?? null;
            return;
        }

        $this->templateId = null;
    }

    private function setDownloadableFiles(): void
    {
        $this->setConnectorProperties();
        $properties = $this->connectorProperties;

        if(     !in_array('relations', $properties)
            ||  !isset($this->connector->relations['meta_collection'])
        ){
            $this->downloadableFiles = [];
            return;
        }

        $files = [];
        foreach ($this->connector->relations['meta_collection'] as $each){
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
        $this->setConnectorProperties();
        $properties = $this->connectorProperties;

        if(     !in_array('relations', $properties)
            ||  !isset($this->connector->relations['meta_collection'])
        ){
            $this->imageFiles = [];
            return;
        }

        $files = [];
        foreach ($this->connector->relations['meta_collection'] as $each){
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
            }
        }

        $this->imageFiles =  array_values($files);
    }

    private function setConnectorProperties(): void
    {
        if(     isset($this->connectorProperties)
            && !is_null($this->connectorProperties)
            && sizeof($this->connectorProperties) > 0){
            return ;
        }

        $this->connectorProperties = array_keys(json_decode(json_encode($this->connector), true));
    }

    private function setCategoryId(): void
    {
        $this->setConnectorProperties();

        if (in_array('relations', $this->connectorProperties)){
             if( isset($this->connector->relations['meta_collection'])
                && !empty(sizeof($this->connector->relations['meta_collection']))) {
                 $this->categoryId = $this->connector->relations['meta_collection'][0]->leaf_category_id;
             }else if($this->connector->relations['leaf_category_id']){
                 $this->categoryId = $this->connector->relations['leaf_category_id'];
             }
        } else if (isset($this->connector->leaf_category_id)) {
            $this->categoryId = $this->connector->leaf_category_id;
        } else if (isset($this->connector->temp_content->leaf_category_id)) {
            $this->categoryId = $this->connector->temp_content->leaf_category_id;
        }
    }

    private function setCategoryTree($lang, $separator)
    {
        $this->setConnectorProperties();
        $lang = in_array($lang, [LanguagePool::US_ENGLISH()->getLabel(), LanguagePool::UK_ENGLISH()->getLabel()])
                ? LanguagePool::ENGLISH()->getLabel() : $lang;

        if (in_array('relations', $this->connectorProperties)
            && isset($this->connector->relations['category_name_array'])
            && !empty(sizeof($this->connector->relations['category_name_array']))) {

             $categoryArray = $this->connector->relations['category_name_array'][$lang];
             $this->categoryTree = implode($separator, $categoryArray);
        }else{
            $tree = CategoryService::getCategoryNameTreeByLeafCategoryId($this->categoryId);
            $this->categoryTree = implode($separator, $tree[$lang]);
        }

        return $this;
    }

    private function setThickness($lang): void
    {
        $this->thickness_i = $this->connector->thickness_i ?? '';
        $this->thickness_m = $this->connector->thickness_m ?? '';
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
        $this->standardLength_m = $this->connector->standard_lengths_m ?? '';
        $this->standardLength_i = $this->connector->standard_lengths_i ?? '';

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
        $this->weights_m  = json_decode($this->connector->weight_m ?? '{}', true);
        $this->weights_i =  json_decode($this->connector->weight_i ?? '{}', true);

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
        $this->maxTensile_m  = $this->connector->max_tensile_strength_m ?? '';
        $this->maxTensile_i =  $this->connector->max_tensile_strength_i ?? '';

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