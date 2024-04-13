<?php

namespace helpers\services;

use helpers\dto\CategoryDTO;
use helpers\dto\LeafCategoryDTO;
use helpers\dto\LeafCategoryDTOCollection;
use helpers\pools\LanguagePool;
use helpers\translate\Translate;
use model\Category;

class RouterService
{
    public static function setAllLeafCategoryRoutes(): void
    {
        $categories = Category::getAll();
        $germanyLang = LanguagePool::GERMANY()->getLabel();
        $leafCategoryDTOCollection =  LeafCategoryDTOCollection::getCollection($categories, $germanyLang,
            '/');
        self::setCategoryCollectionRoute($leafCategoryDTOCollection);

        $frenchLang = LanguagePool::FRENCH()->getLabel();
        $leafCategoryDTOCollection =  LeafCategoryDTOCollection::getCollection($categories, $frenchLang,
            '/');
        self::setCategoryCollectionRoute($leafCategoryDTOCollection);

        $englishLang = LanguagePool::ENGLISH()->getLabel();
        $leafCategoryDTOCollection =  LeafCategoryDTOCollection::getCollection($categories, $englishLang,
            '/');
        self::setCategoryCollectionRoute($leafCategoryDTOCollection);

    }

    private static function setCategoryCollectionRoute($categoryCollection): void
    {
        foreach ($categoryCollection as $each)
        {
            self::setCategoryRoute($each);
        }
    }

    private static function setCategoryRoute(LeafCategoryDTO $category): void
    {
        if(!$category->isPublished){
            return;
        }

        global $app;
        $categoryURI = $category->treePathStr;
        $categoryURI = '/' . strtolower(implode('-', explode(' ', $categoryURI)));
        if (!$app->isRouteRegistered($categoryURI, 'GET')) {
            $app->get($categoryURI, ["user\ContentController", "getContentsByCategoryId"]);
        }
    }

    public static function getCategoryPageRoute($categoryId)
    {
        $lang = Translate::getLang();
        $lang = in_array($lang, [LanguagePool::US_ENGLISH()->getLabel(), LanguagePool::UK_ENGLISH()->getLabel()])
                    ? LanguagePool::ENGLISH()->getLabel() : $lang;
        $categoryArray  = CategoryService::getCategoryNameTreeByLeafCategoryId($categoryId);
        $categoryURI  = implode('/', $categoryArray[$lang]);
        $categoryURI = '/' . strtolower(implode('-', explode(' ', $categoryURI)));
        $params = ['id'=>$categoryId, 'lang'=>$lang];
        $categoryURI .=  '?' . http_build_query($params);
        return url($categoryURI);
    }
}