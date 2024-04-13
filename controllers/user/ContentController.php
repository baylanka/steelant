<?php

namespace controllers\user;

use app\Request;
use controllers\BaseController;
use helpers\dto\CategoryDTO;
use helpers\repositories\CategoryContentRepository;
use helpers\services\ContentService;
use helpers\translate\Translate;
use model\Category;

class ContentController extends BaseController
{
    public function getContentsByCategoryId(Request $request)
    {
        if (!$request->has('id')) {
            header('Location: ' . url("/"));
        }
        $categoryId = $request->get('id');
        $activatedLanguage = Translate::getLang();
        $templates = ContentService::getTemplatesByCategoryId($categoryId, $activatedLanguage);
        $category = Category::getById($categoryId);
        $categoryDTO = new CategoryDTO($category);
        $data = [
            'templates' => $templates,
            "title" => $categoryDTO->getTitle()
        ];

        return view("user/connector.view.php", $data);
    }
}