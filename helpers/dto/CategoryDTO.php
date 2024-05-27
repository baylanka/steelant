<?php

namespace helpers\dto;

use helpers\pools\LanguagePool;
use helpers\services\CategoryService;
use helpers\translate\Translate;
use model\Category;
use model\RelevantPage;

class CategoryDTO
{
    public int $id;
    public string $name_de;
    public string $name_en;
    public string $name_fr;

    public bool $is_leaf_category;

    public int $level;
    public ?int $parent_category_id;
    public ?int $display_order;
    public bool $is_published;

    public ?string $title;
    public ?string $icon_url;
    public string $icon_name;
    public ?string $banner_url;
    public string $banner_name;

    private Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
        $this->id = $category->id;
        $this->setName($category);
        $this->is_leaf_category = $category->isLeafCategroy();
        $this->level = $category->level;
        $this->parent_category_id = $category->parent_category_id ?? null;
        $this->setIsPublished($category);
        //updating media relation forcefully
        //newly set media object does not exist on earlier collection
        $category->setMedia(true);
        $this->icon_url = $category->getThumbnailUrl();
        $this->icon_name = $category->getThumbnailImageName();
        $this->banner_url = $category->getBannerUrl();
        $this->banner_name = $category->getBannerImageName();
    }

    private function setName(Category $category)
    {
        $this->name_en = $category->getNameEn();
        $this->name_de = $category->getNameDe();
        $this->name_fr = $category->getNameFr();
    }

    private function setIsPublished(Category $category)
    {
        $this->is_published = $category->isPublished();
    }

    public function getTitle()
    {
        $lang = Translate::getLang();
        switch ($lang) {
            case LanguagePool::FRENCH()->getLabel():
                return $this->category->getTitleFr();
            case LanguagePool::GERMANY()->getLabel():
                return $this->category->getTitleDe();
            case LanguagePool::UK_ENGLISH()->getLabel():
            case LanguagePool::US_ENGLISH()->getLabel():
                return $this->category->getTitleEn();
        }
    }

    public function hasRelevantCategories()
    {
        $pages = RelevantPage::getAllBy(['category_id'=> $this->category->id]);
        return !empty($pages);
    }

    public function getRelevantCategories()
    {
        $lang = Translate::getLang();
        $pages = RelevantPage::getAllBy(['category_id'=> $this->category->id]);
        $arr = [];
        foreach ($pages as $page)
        {
            $parentRelevantCategory = CategoryService::getParentCategory($page->relevant_category_id);
            $parentRelevantCategoryDTO = new CategoryDTO($parentRelevantCategory);
            $descriptionArr = json_decode($page->description ?? "{}",  true);
            $titleArr = json_decode($page->title ?? "{}", true);
            $arr[] = json_decode(json_encode([
                                                'category' => $parentRelevantCategoryDTO,
                                                'description'=> $descriptionArr[$lang] ?? "-",
                                                'title' => $titleArr[$lang] ?? "-",
                                                'relevant_category_id' => $page->relevant_category_id
                                            ]));
        }

        return $arr;
    }
}