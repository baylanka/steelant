<?php

namespace helpers\dto;

use helpers\repositories\CategoryRepository;
use model\Category;

class ConnectorPageCategoryCollection
{
    public Category $parentCategory;
    public array $children;
    public bool $multiLevelExists;
    public string $bannerURL;
    public string $bannerName;

    public string $thumbnailURL;
    public string $thumbnailName;

    public function __construct(Category $category, int $selectedCategoryId)
    {
        $this->parentCategory = $category;
        $this->multiLevelExists = CategoryRepository::hasThirdLevelsOfChildren($this->parentCategory->id);
        $this->setChildren($category);
        $this->setBannerAttributes($selectedCategoryId);
    }

    private function setThumbnailAttributes()
    {
        $this->thumbnailURL = $this->parentCategory->getThumbnailUrl();
        $this->thumbnailName = $this->parentCategory->getThumbnailImageName();
    }

    private function setBannerAttributes($selectedCategoryId)
    {
        foreach ($this->children as $group){
            foreach ($group as $child){
                if($child->id == $selectedCategoryId){
                    if($child->bannerExists()){
                        $this->bannerURL = $child->getBannerUrl();
                        $this->bannerName = $child->getBannerImageName();
                    }else{
                        $this->bannerURL = $this->parentCategory->getBannerUrl();
                        $this->bannerName = $this->parentCategory->getBannerImageName();
                    }

                    return;
                }
            }
        }
    }
    private function setChildren($category)
    {
        $this->multiLevelExists
            ? self::setMultiLevelChildren($category)
            : self::setDirectChildren($category);
    }

    private function setMultiLevelChildren(Category $category)
    {
        $arr = [];
        $children = $category->getChildren();
        foreach ($children as $child){
            $arr[] = $child;
            $grandChildren = $child->getChildren();
            foreach ($grandChildren as $grandChild){
                $arr[] = $grandChild;
            }

            if(empty($arr)) continue;
            $this->children[] = $arr;
            $arr = [];
        }
    }

    private function setDirectChildren(Category $category)
    {
        $children = $category->getChildren();
        $arr = [];
        foreach ($children as $child){
            $arr[] = $child;
        }
        $this->children[] = $arr;
    }
}