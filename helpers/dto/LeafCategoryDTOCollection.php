<?php

namespace helpers\dto;

use helpers\services\CategoryService;

class LeafCategoryDTOCollection
{
    public static function getCollection($categories, $lang='de', $treeSeparator = ' > ')
    {
        $collection = [];
        $categoriesContainer = CategoryService::groupLeafCategoriesAssociateWithParents($categories);
        foreach ($categoriesContainer as $categoryGroup){
            $collection[] = new LeafCategoryDTO($categoryGroup, $lang, $treeSeparator);
        }
        return $collection;
    }
}