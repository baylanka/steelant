<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;
use helpers\dto\TemplateDTO;
use helpers\mappers\TemplateStoreRequestMapper;
use helpers\repositories\TemplateRepository;
use helpers\utilities\ResponseUtility;
use helpers\validators\TemplateStoreRequestValidator;
use model\Template;

class TemplateController extends BaseController
{
    public function index(Request $request)
    {
        $templates = TemplateRepository::getAllConnectorTypes();
        $data = [
            'heading' => "Templates",
            'templates' => $templates,
        ];

        return view('admin/templates/index.view.php', $data);
    }

    public function create(Request $request)
    {
        $data = [];
        return view('admin/templates/create.view.php', $data);
    }

    public function store(Request $request)
    {
        global $container;
        $db = $container->resolve('DB');
        try{
            TemplateStoreRequestValidator::validate($request);
            $template = TemplateStoreRequestMapper::getModel($request);

            $db->beginTransaction();
            $template->save();
            $db->commit();
            $templateDTO = new TemplateDTO($template);
            ResponseUtility::sendResponseByArray([
                "message" => "Successfully stored",
                "data" => $templateDTO
            ]);
        } catch (\Exception $ex) {
            $db->rollBack();
            parent::response($ex->getMessage(), [], 422);
        }
    }

    public function edit(Request $request)
    {

    }

    public function update(Request $request)
    {

    }

    public function destroy(Request $request)
    {

    }
}