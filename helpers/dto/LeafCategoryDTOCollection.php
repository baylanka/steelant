<?php

namespace helpers\dto;

use helpers\services\CategoryService;

class LeafCategoryDTOCollection
{
    private array $collection;
    public function __construct($categories, $lang='de', $treeSeparator = ' > ')
    {
        $this->setCollection($categories, $lang, $treeSeparator);
    }

    public function setCollection($categories, $lang, $treeSeparator)
    {
        $categoriesContainer = CategoryService::groupLeafCategoriesAssociateWithParents($categories);
        foreach ($categoriesContainer as $categoryGroup){
            $this->collection[] = new LeafCategoryDTO($categoryGroup, $lang, $treeSeparator);
        }
    }

    public function getCollection()
    {
        return $this->collection;
    }
}