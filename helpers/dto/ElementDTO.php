<?php

namespace helpers\dto;

use helpers\pools\LanguagePool;
use helpers\services\CategoryService;

abstract class ElementDTO
{
    public int $id;
    public string $type;

    public string $label;

    public string $language;
    public string $categoryTree;
    public bool $isPublished;
    public ?array $elementProperties;
    public ?int $templateId;
    public ?int $categoryId;
    public ?int $contentId;

    protected function setContentId()
    {
        $this->setElementProperties();
        $properties = $this->elementProperties;

        if(     !in_array('relations', $properties)
            ||  !isset($this->element->relations['meta_collection'])
        ){
            return;
        }

        foreach ($this->element->relations['meta_collection'] as $each){
            $this->contentId = $each->content_id;
            return;
        }

        $this->contentId = null;
    }

    protected function setCategoryId(): void
    {
        $this->setElementProperties();

        if (in_array('relations', $this->elementProperties)){
            if( isset($this->element->relations['meta_collection'])
                && !empty(sizeof($this->element->relations['meta_collection']))) {
                $this->categoryId = $this->element->relations['meta_collection'][0]->leaf_category_id;
            }else if($this->element->relations['leaf_category_id']){
                $this->categoryId = $this->element->relations['leaf_category_id'];
            }
        } else if (isset($this->element->leaf_category_id)) {
            $this->categoryId = $this->element->leaf_category_id;
        } else if (isset($this->element->temp_content->leaf_category_id)) {
            $this->categoryId = $this->element->temp_content->leaf_category_id;
        }
    }

    protected function setCategoryTree($lang, $separator)
    {
        $this->setElementProperties();
        $lang = in_array($lang, [LanguagePool::US_ENGLISH()->getLabel(), LanguagePool::UK_ENGLISH()->getLabel()])
            ? LanguagePool::ENGLISH()->getLabel() : $lang;

        if (in_array('relations', $this->elementProperties)
            && isset($this->element->relations['category_name_array'])
            && !empty(sizeof($this->element->relations['category_name_array']))) {

            $categoryArray = $this->element->relations['category_name_array'][$lang];
            $this->categoryTree = implode($separator, $categoryArray);
        }else{
            $this->categoryTree = CategoryService::getCategoryNameTreeStrByLeafCategoryId($this->categoryId, $lang, $separator);
        }

        return $this;
    }

    protected function setElementProperties(): void
    {
        if(     isset($this->elementProperties)
            && !is_null($this->elementProperties)
            && sizeof($this->elementProperties) > 0){
            return ;
        }

        $this->elementProperties = array_keys(json_decode(json_encode($this->element), true));
    }

    protected function setTemplateId(): void
    {
        $this->setElementProperties();
        $properties = $this->elementProperties;
        if(in_array('relations', $properties)
            && isset($this->element->relations['meta_collection'])
            && !empty(sizeof($this->element->relations['meta_collection']))
        ){
            $this->templateId = $this->element->relations['meta_collection'][0]->template_id ?? null;
            return;
        }

        $this->templateId = null;
    }
}