<?php

namespace helpers\dto;

use helpers\pools\LanguagePool;
use helpers\services\CategoryService;
use model\Connector;

class ConnectorDTO
{
    private \stdClass|Connector $connector;
    public int $id;
    public string $categoryTree;
    public bool $isPublished;
    public string $name;
    public string $grade;
    public string $thickness;
    public string $standardLength;
    public array $weights;

    public function __construct(\stdClass|Connector $connector, $lang, $separator)
    {
        $this->connector = $connector;

        $this->id = $this->connector->id;
        $this->name = $this->connector->name;
        $this->grade = $this->connector->grade ?? '';
        $this->isPublished = $this->connector->visibility;
        $this->setThickness($lang);
        $this->setLength($lang);
        $this->setWeight($lang);
        $this->setCategoryTree($lang, $separator);
    }

    private function setCategoryTree($lang, $separator)
    {
        $lang = in_array($lang, [LanguagePool::US_ENGLISH()->getLabel(), LanguagePool::UK_ENGLISH()->getLabel()])
                ? LanguagePool::ENGLISH()->getLabel() : $lang;

        if(isset($this->connector->leaf_category_id)){
            $leafCategoryId = $this->connector->leaf_category_id;
        }else if(isset($this->connector->temp_content->leaf_category_id)){
            $leafCategoryId = $this->connector->temp_content->leaf_category_id;
        }else{
            $this->categoryTree = '';
            return;
        }
        $tree = CategoryService::getCategoryNameTreeByLeafCategoryId($leafCategoryId);
        $this->categoryTree = implode($separator, $tree[$lang]);
    }

    private function setThickness($lang): void
    {
        switch($lang){
            case LanguagePool::FRENCH()->getLabel():
            case LanguagePool::GERMANY()->getLabel():
            case LanguagePool::US_ENGLISH()->getLabel():
                $this->thickness = $this->connector->thickness_m ?? '';
                break;
            case LanguagePool::UK_ENGLISH()->getLabel():
                $this->thickness = $this->connector->thickness_i ?? '';
                break;

        }

    }

    private function setLength($lang): void
    {
        switch($lang){
            case LanguagePool::FRENCH()->getLabel():
            case LanguagePool::GERMANY()->getLabel():
            case LanguagePool::US_ENGLISH()->getLabel():
                $this->standardLength = $this->connector->standard_lengths_m ?? '';
                break;
            case LanguagePool::UK_ENGLISH()->getLabel():
                $this->standardLength = $this->connector->standard_lengths_i ?? '';
                break;
        }
    }

    private function setWeight($lang)
    {
        $metricsWeight = json_decode($this->connector->weight_m ?? '{}', true);
        $imperialWeight =  json_decode($this->connector->weight_i ?? '{}', true);
        switch($lang){
            case LanguagePool::FRENCH()->getLabel():
            case LanguagePool::GERMANY()->getLabel():
            case LanguagePool::US_ENGLISH()->getLabel():
                $this->weights = $metricsWeight;
                break;
            case LanguagePool::UK_ENGLISH()->getLabel():
                $this->weights = $imperialWeight;
                break;
        }
    }
}