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
        $sessionLang = Translate::getLang();
        $lang = in_array($sessionLang, [LanguagePool::US_ENGLISH()->getLabel(), LanguagePool::UK_ENGLISH()->getLabel()])
                    ? LanguagePool::ENGLISH()->getLabel() : $sessionLang;
        $categoryArray  = CategoryService::getCategoryNameTreeByLeafCategoryId($categoryId);
        if(empty($categoryArray)){
            return "";
        }
        $categoryURI  = implode('/', $categoryArray[$lang]);
        $categoryURI = '/' . strtolower(implode('-', explode(' ', $categoryURI)));
        $params = ['id'=>$categoryId, 'lang'=>$sessionLang];
        $categoryURI .=  '?' . http_build_query($params);
        $headers = get_headers(url($categoryURI));
        if ($headers && is_array($headers) && isset($headers[0]) && strpos($headers[0], '404') !== false) {
            return url("/contents");
        }

        return url($categoryURI);
    }
}