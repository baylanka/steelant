<?php

namespace model;

use helpers\pools\LanguagePool;
use helpers\repositories\AdOnRepository;
use helpers\services\ContentTemplateService;
use model\BaseModel;
use model\Element;

class AdOnContent extends Element
{
    protected string $table = "add_on_contents";
    public string $title;
    public string $description;
    public ?int $visibility;

    public ?CategoryContent $temp_content;
    public ?array $temp_content_templates;

    const UNPUBLISHED = 0;
    const PUBLISHED = 1;

    protected function getContentTemplates()
    {
        return AdOnRepository::getAddOnContentTemplatesByConnectorId($this->id);
    }

    protected function getContentType()
    {
        return CategoryContent::TYPE_ADD_ON_CONTENT;
    }
    public function save()
    {
        //store ad-on-content
        parent::save();
        $addOnContentId = $this->id;

        //store | update category-content
        $content = $this->temp_content;
        if(!isset($content->id)) {
            $content->element_id = $addOnContentId;
        }
        $content->save();

        //update new content-templates, its template media
        $contentTemplatesArray =  $this->temp_content_templates ?? [];
        foreach ($contentTemplatesArray as $index => $value){
            $contentTemplate = $value;
            if($contentTemplate instanceof ContentTemplate){
                $contentTemplatesArray[$index]->content_id = $content->id;
            }
        }
        ContentTemplateService::updateContentTemplates($contentTemplatesArray);
    }

    public function getTitleByLang(string $language)
    {
        $title = empty($this->title) ? '{}': $this->title;
        $titleArray = json_decode($title, true);
        if(!isset($titleArray[$language])){
            return "";
        }

        return $titleArray[$language];
    }

    public function getTitleEnUS()
    {
        return $this->getTitleByLang(LanguagePool::US_ENGLISH()->getLabel());
    }

    public function getTitleEnUK()
    {
        return $this->getTitleByLang(LanguagePool::UK_ENGLISH()->getLabel());
    }

    public function getTitleDe()
    {
        return $this->getTitleByLang(LanguagePool::GERMANY()->getLabel());
    }

    public function getTitleFr()
    {
        return $this->getTitleByLang(LanguagePool::FRENCH()->getLabel());
    }

    public function getDescriptionByLang(string $language)
    {
        $description = empty($this->description) ? '{}': $this->description;
        $descriptionArray = json_decode($description, true);
        if(!isset($descriptionArray[$language])){
            return "";
        }

        return $descriptionArray[$language];
    }

    public function getDescriptionEnUS()
    {
        return html_entity_decode($this->getDescriptionByLang(LanguagePool::US_ENGLISH()->getLabel()));
    }

    public function getDescriptionEnUK()
    {
        return html_entity_decode($this->getDescriptionByLang(LanguagePool::UK_ENGLISH()->getLabel()));
    }

    public function getDescriptionDe()
    {
        return html_entity_decode($this->getDescriptionByLang(LanguagePool::GERMANY()->getLabel()));
    }

    public function getDescriptionFr()
    {
        return html_entity_decode($this->getDescriptionByLang(LanguagePool::FRENCH()->getLabel()));
    }
}