<?php

namespace helpers\dto;

class LeafCategoryDTO
{
    public int $id;
    public string $name;
    public string $treePathStr;

    public function __construct(array $categoriesGroup, $lang, $treeSeparator)
    {
        $leafCategoryIndex = sizeof($categoriesGroup) - 1;
        $leafCategory = $categoriesGroup[$leafCategoryIndex];
        $this->id = $leafCategory->id;
        $this->name = $leafCategory->getNameByLang($lang);
        $this->treePathStr = $this->getCategoriesTree($categoriesGroup, $lang, $treeSeparator);
    }

    public function getCategoriesTree(array $categoriesGroup, string $lang, $treeSeparator)
    {
        $nameArr = [];
        foreach ($categoriesGroup as $category){
            $nameArr[] = $category->getNameByLang($lang);
        }

        return implode($treeSeparator, $nameArr);
    }
}