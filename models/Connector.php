<?php

namespace model;

use helpers\pools\LanguagePool;
use helpers\services\CategoryService;
use model\BaseModel;

class Connector extends BaseModel
{
    protected string $table = "connectors";

    public int $id;
    public string $name;
    public string $grade;
    public string $description;

    public array|string $weight_m;
    public array|string $weight_i;

    public string $thickness_m;
    public string $thickness_i;

    public string $standard_length_m;
    public string $standard_length_i;
    public bool $visibility;

    CONST UNPUBLISHED = 0;
    const PUBLISHED = 1;

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

        $this->relations['category_name_array'] = CategoryService::getCategoryNameTreeByLeafCategoryId($content->root_category_id);
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