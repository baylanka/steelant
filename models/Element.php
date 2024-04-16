<?php

namespace model;

use helpers\pools\LanguagePool;
use helpers\repositories\ContentTemplateRepository;
use helpers\services\CategoryService;
use helpers\services\ContentTemplateService;
use model\BaseModel;

abstract class Element  extends BaseModel
{
    public function delete()
    {
        $content = CategoryContent::getFirstBy([
            'type' => $this->getContentType(),
            'element_id' => $this->id
        ]);

        if (!$content) {
            return;
        }


        $content->delete();
    }

    public function update()
    {
        //update element
        parent::save();

        //update category-content
        $content = $this->temp_content;
        $content->save();
        $contentTemplatesArray =  $this->temp_content_templates ?? [];

        //delete previous content templates media, with its associated `media`
        ContentTemplateRepository::deleteContentTemplatesByContentId($content->id);
        //update new content-templates, its template media
        ContentTemplateService::updateContentTemplates($contentTemplatesArray);
    }

    public function setMetaCollection($force = false): void
    {
        if($force || !isset($this->relations['meta_collection']) || empty($this->relations['meta_collection'])){
            $this->relations['meta_collection'] = $this->getContentTemplates();
        }
    }

    public function setCategory()
    {
        if (isset($this->relations['category_name_array']) && !empty($this->relations['category_name_array'])) {
            return;
        }

        $content = CategoryContent::getFirstBy([
            'type' => $this->getContentType(),
            'element_id' => $this->id
        ]);

        if (!$content) {
            return;
        }

        $this->relations['leaf_category_id'] = $content->leaf_category_id;
        $this->relations['category_name_array'] = CategoryService::getCategoryNameTreeArrayByLeafCategoryId($content->leaf_category_id);
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
}