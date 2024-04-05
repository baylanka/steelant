<?php

namespace controllers\user;

use app\Request;
use controllers\BaseController;
use helpers\repositories\CategoryContentRepository;
use helpers\services\ContentService;
use helpers\translate\Translate;

class ContentController extends BaseController
{
    public function getContentsByCategoryId(Request $request)
    {
        if (!isset($_GET["id"])) {
            header('Location: ' . url("/"));
        }
        $categoryId = $request->get('id');
        $activatedLanguage = Translate::getLang();
        $templates = ContentService::getTemplatesByCategoryId($categoryId, $activatedLanguage);
        $data = [
            'templates' => $templates,
        ];

        return view("user/connector.view.php", $data);
    }
}