<?php

namespace helpers\dto;

use helpers\pools\LanguagePool;
use model\AdOnContent;
use model\CategoryContent;

class AdOnDTO extends ElementDTO
{
    public \stdClass|AdOnContent $element;
    public $title_en_us;
    public $title_en_gb;
    public $title_fr;
    public $title_de;
    public $title;

    public $description_de;
    public $description_fr;
    public $description_en_us;
    public $description_en_gb;
    public $description;

    public function __construct(\stdClass|AdOnContent $addOn, $lang, $separator)
    {
        $this->type = CategoryContent::TYPE_ADD_ON_CONTENT;
        $this->language = $lang;
        $this->element = $addOn;
        $this->id = $this->element->id;

        $this->title_de = $addOn->getTitleDe();
        $this->title_fr = $addOn->getTitleFr();
        $this->title_en_us = $addOn->getTitleEnUS();
        $this->title_en_gb = $addOn->getTitleEnUK();
        $this->setTitleByLang($lang);

        $this->description_de = $addOn->getDescriptionDe();
        $this->description_fr = $addOn->getDescriptionFr();
        $this->description_en_us = $addOn->getDescriptionEnUS();
        $this->description_en_gb = $addOn->getDescriptionEnUK();
        $this->setDescriptionByLang($lang);

        $this->isPublished = $this->element->visibility;

        $this->setTemplateId();
        $this->setCategoryId();
        $this->setCategoryTree($lang, $separator);
        $this->setContentId();
        $this->setContentLabel();
    }

    public function setTitleByLang($lang)
    {
        switch ($lang){
            case LanguagePool::GERMANY()->getLabel():
                $this->title =  $this->title_de;
                break;
            case LanguagePool::FRENCH()->getLabel():
                $this->title = $this->title_fr;
                break;
            case LanguagePool::UK_ENGLISH()->getLabel():
                $this->title = $this->title_en_gb;
                break;
            case LanguagePool::US_ENGLISH()->getLabel():
                $this->title = $this->title_en_us;
                break;
        }
    }

    public function setDescriptionByLang($lang)
    {
        switch ($lang){
            case LanguagePool::GERMANY()->getLabel():
                $this->description = $this->description_de;
                break;
            case LanguagePool::FRENCH()->getLabel():
                $this->description = $this->description_fr;
                break;
            case LanguagePool::UK_ENGLISH()->getLabel():
                $this->description = $this->description_en_gb;
                break;
            case LanguagePool::US_ENGLISH()->getLabel():
                $this->description = $this->description_en_us;
                break;
        }
    }

    private function setContentLabel()
    {
        $this->label = $this->title ?? '';
    }
}