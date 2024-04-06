<?php

namespace model;

use helpers\pools\LanguagePool;
use helpers\repositories\ConnectorRepository;
use helpers\repositories\ContentTemplateMediaRepository;
use helpers\services\CategoryService;
use model\BaseModel;

class Connector extends BaseModel
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

    public ?CategoryContent $temp_content;
    public ?array $temp_content_templates;

    CONST UNPUBLISHED = 0;
    const PUBLISHED = 1;

    public function setMetaCollection($force = false): void
    {
        if($force || !isset($this->relations['meta_collection']) || empty($this->relations['meta_collection'])){
            $this->relations['meta_collection'] = ConnectorRepository::getConnectorTemplatesByConnectorId($this->id);
        }
    }

    public function setCategory()
    {
        if (isset($this->relations['category_name_array']) && !empty($this->relations['category_name_array'])) {
            return;
        }

        $content = CategoryContent::getFirstBy([
            'type' => CategoryContent::TYPE_CONNECTOR,
            'element_id' => $this->id
        ]);

        if (!$content) {
            return;
        }

        $this->relations['leaf_category_id'] = $content->leaf_category_id;
        $this->relations['category_name_array'] = CategoryService::getCategoryNameTreeByLeafCategoryId($content->leaf_category_id);
    }

    public function getCategoryHierarchyEn()
    {
        $this->setCategory();
        if (!isset($this->relations['category_name_array'])) {
            return '';
        }
        return implode(' > ', $this->relations['category_name_array'][LanguagePool::ENGLISH()->getLabel()]);
    }

    public function getCategoryHierarchyFr()
    {
        $this->setCategory();
        if (!isset($this->relations['category_name_array'])) {
            return '';
        }
        return implode(' > ', $this->relations['category_name_array'][LanguagePool::FRENCH()->getLabel()]);
    }

    public function getCategoryHierarchyDe()
    {
        $this->setCategory();
        if (!isset($this->relations['category_name_array'])) {
            return '';
        }
        return implode(' > ', $this->relations['category_name_array'][LanguagePool::GERMANY()->getLabel()]);
    }

    public function getCategoryHierarchyByLanguage($lang)
    {
        return match ($lang) {
            LanguagePool::ENGLISH()->getLabel() => $this->getCategoryHierarchyEn(),
            LanguagePool::GERMANY()->getLabel() => $this->getCategoryHierarchyDe(),
            LanguagePool::FRENCH()->getLabel() => $this->getCategoryHierarchyFr(),
            default => $this->getCategoryHierarchyDe(),
        };
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

    public function update()
    {
        //update connector
        parent::save();

        //update category-content
        $content = $this->temp_content;
        $content->save();

        //delete previous content templates media, with its associated `media`
        ContentTemplateMediaRepository::deleteContentTemplateMediaByContentId($content->id);
        //update new content-templates, its template media
        $this->updateContentTemplates();
    }

    public function getDescriptionByLang(string $language)
    {
        $descriptionArray = json_decode($this->description, true);
        if(!isset($descriptionArray[$language])){
            return "";
        }

        return $descriptionArray[$language];
    }

    public function getDescriptionEn()
    {
        return $this->getDescriptionByLang(LanguagePool::ENGLISH()->getLabel());
    }

    public function getDescriptionDe()
    {
        return $this->getDescriptionByLang(LanguagePool::GERMANY()->getLabel());
    }

    public function getDescriptionFr()
    {
        return $this->getDescriptionByLang(LanguagePool::FRENCH()->getLabel());
    }


    private function updateContentTemplates()
    {
        foreach ($this->temp_content_templates ?? [] as $content_template)
        {
            $content_template->save();
            $this->updateContentTemplateMedia($content_template);
        }
    }

    private function updateContentTemplateMedia(ContentTemplate $content_template)
    {
        $contentTemplateMediaArray = $content_template->temp_content_template_media ?? [];
        foreach ($contentTemplateMediaArray as $each)
        {
            $each->content_template_id = $content_template->id;
            $media = $this->getUpdatedMedia($each);
            $each->media_id = $media->id;
            $each->save();
        }
    }

    private function getUpdatedMedia(ContentTemplateMedia $contentTemplateMedia)
    {
        $existingMedia = Media::getFirstBy(['path' => $contentTemplateMedia->temp_media->path]);
        if(!$existingMedia){
            $contentTemplateMedia->temp_media->save();
            return $contentTemplateMedia->temp_media;
        }

        return $existingMedia;
    }
}