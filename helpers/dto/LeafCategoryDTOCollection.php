<?php

namespace helpers\dto;

use helpers\services\CategoryService;

class LeafCategoryDTOCollection
{
    public array $collection;
    public function __construct($categories, $lang='de')
    {
        $this->setCollection($categories, $lang);
    }

    public function setCollection($categories, $lang)
    {
        $categoriesContainer = CategoryService::groupLeafCategoriesAssociateWithParents($categories);
        foreach ($categoriesContainer as $categoryGroup){
            $this->collection[] = new LeafCategoryDTO($categoryGroup, $lang);
        }
    }
}