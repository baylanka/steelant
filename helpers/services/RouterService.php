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
        $activeLang = Translate::getLang();
        if(in_array($activeLang,
            [LanguagePool::US_ENGLISH()->getLabel(), LanguagePool::UK_ENGLISH()->getLabel()])){
            $activeLang = LanguagePool::ENGLISH()->getLabel();
        }

        $categories = Category::getAll();
        $leafCategoryDTOCollection =  LeafCategoryDTOCollection::getCollection($categories, $activeLang,
            '/');
        self::setCategoryCollectionRoute($leafCategoryDTOCollection, $activeLang);
    }

    private static function setCategoryCollectionRoute($categoryCollection,$lang): void
    {
        foreach ($categoryCollection as $each)
        {
            self::setCategoryRoute($each, $lang);
        }
    }

    private static function setCategoryRoute(LeafCategoryDTO $category, $lang): void
    {
        if(!$category->isPublished){
            return;
        }

        global $app, $pageRoutes;
        $categoryURI = $category->treePathStr;
        $categoryURI = '/' . strtolower(implode('-', explode(' ', $categoryURI)));
        $pageRoutes[$category->id][$lang] = url($categoryURI);
        if (!$app->isRouteRegistered($categoryURI, 'GET')) {
            $app->get($categoryURI, ["user\ContentController", "getContentsByCategoryId"]);
        }
    }

    public static function getCategoryPageRoute($categoryId)
    {
        global $pageRoutes;
        $sessionLang = Translate::getLang();
        $lang = in_array($sessionLang, [LanguagePool::US_ENGLISH()->getLabel(), LanguagePool::UK_ENGLISH()->getLabel()])
                    ? LanguagePool::ENGLISH()->getLabel() : $sessionLang;
        $paramArray = [
            'id' => $categoryId,
            'lang' => $sessionLang,
        ];
        $params = "?" . http_build_query($paramArray);

        if(isset($pageRoutes[$categoryId]) && isset($pageRoutes[$categoryId][$lang])){
            return $pageRoutes[$categoryId][$lang] . $params;
        }

        $uri = "contents" . $params;
        return url($uri);
    }
}