<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;
use helpers\dto\TemplateDTO;
use helpers\mappers\TemplateStoreRequestMapper;
use helpers\middlewares\UserMiddleware;
use helpers\utilities\ResponseUtility;
use helpers\validators\TemplateDeleteRequestValidator;
use helpers\validators\TemplateStoreRequestValidator;
use helpers\validators\TemplateTypeUpdateRequestValidator;
use model\Template;

class TemplateController extends BaseController
{
    public function __construct()
    {
        UserMiddleware::isLoggedIn();
        UserMiddleware::isAdmin();
    }
    public function index(Request $request)
    {
        $templates = Template::getAll();
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
        $data = [
            'template' => Template::getById($request->get('id'))
        ];
        return view('admin/templates/edit.view.php', $data);
    }

    public function update(Request $request)
    {
        global $container;
        $db = $container->resolve('DB');
        try{
            TemplateTypeUpdateRequestValidator::validate($request);
            $db->beginTransaction();
            $template = Template::getById($request->get('id'));
            $template->type = $request->get('type');
            $template->save();
            $db->commit();
            $templateDTO = new TemplateDTO($template);
            ResponseUtility::sendResponseByArray([
                "message" => "Successfully updated",
                "data" => $templateDTO
            ]);
        } catch (\Exception $ex) {
            $db->rollBack();
            parent::response($ex->getMessage(), [], 422);
        }
    }

    public function destroy(Request $request)
    {
        global $container;
        $db = $container->resolve('DB');
        try{
            TemplateDeleteRequestValidator::validate($request);
            $db->beginTransaction();
            Template::deleteById($request->get('id'));
            $db->commit();
            parent::response("Successfully deleted",);
        }catch(\Exception $ex){
            $db->rollBack();
            parent::response($ex->getMessage(),[
                $ex->getTraceAsString()
            ],422);
        }
    }
}