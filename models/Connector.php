<?php

namespace model;

use helpers\pools\LanguagePool;
use helpers\repositories\ConnectorRepository;
use helpers\repositories\ContentTemplateRepository;
use helpers\services\CategoryService;
use helpers\services\ContentTemplateService;
use model\BaseModel;
use model\Element;

class Connector extends Element
{
    protected string $table = "connectors";

    public int $id;
    public string $name;
    public ?string $grade;
    public ?string $description;

    public null|array|string $weight_m;
    public null|array|string $weight_i;

    public ?string $thickness_m;
    public ?string $thickness_i;

    public ?string $standard_lengths_m;
    public ?string $standard_lengths_i;
    public ?int $visibility;

    public ?string $max_tensile_strength_m;
    public ?string $max_tensile_strength_i;
    public ?int $standard_length_type;
    public ?string $other_attrs;
    public ?CategoryContent $temp_content;
    public ?array $temp_content_templates;

    CONST UNPUBLISHED = 0;
    const PUBLISHED = 1;

    protected function getContentTemplates()
    {
        return ConnectorRepository::getConnectorContentTemplatesByConnectorId($this->id);
    }

    protected function getContentType()
    {
        return CategoryContent::TYPE_CONNECTOR;
    }

    public function save()
    {
        //store connector
        parent::save();
        $connectorId = $this->id;

        //store | update category-content
        $content = $this->temp_content;
        if(!isset($content->id)) {
            $content->element_id = $connectorId;
        }
        $content->save();
    }

    public function getDescriptionByLang(string $language)
    {
        $description = empty($this->description) ? '{}': $this->description;
        $descriptionArray = json_decode($description, true);
        if(!isset($descriptionArray[$language])){
            return "";
        }

        return html_entity_decode($descriptionArray[$language]);
    }

    public function getDescriptionEnUS()
    {
        return $this->getDescriptionByLang(LanguagePool::US_ENGLISH()->getLabel());
    }

    public function getDescriptionEnUK()
    {
        return $this->getDescriptionByLang(LanguagePool::UK_ENGLISH()->getLabel());
    }

    public function getDescriptionDe()
    {
        return $this->getDescriptionByLang(LanguagePool::GERMANY()->getLabel());
    }

    public function getDescriptionFr()
    {
        return $this->getDescriptionByLang(LanguagePool::FRENCH()->getLabel());
    }
    public function getSubtitleOtherAttr($lang)
    {
        $subtitleArr =  $this->getOtherAttrBy('subtitle');
        $subtitle = $subtitleArr[$lang] ?? '';
        return html_entity_decode($subtitle);
    }

    public function getFooterOtherAttr($lang)
    {
        $footerArr =  $this->getOtherAttrBy('footer');
        $footer = $footerArr[$lang] ?? '';
        return html_entity_decode($footer);
    }
    private function getOtherAttrBy($key)
    {
        if(empty($this->other_attrs) || empty(json_decode($this->other_attrs))){
            return [];
        }

        $attr = json_decode($this->other_attrs, true);
        return $attr[$key] ?? [];
    }

}