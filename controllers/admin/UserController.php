<?php

namespace controllers\admin;

use app\Request;
use controllers\BaseController;
use helpers\clients\EmailClient;
use helpers\dto\UserDTO;
use helpers\mappers\UserCreateRequestMapper;
use helpers\utilities\ResponseUtility;
use helpers\validators\AdminUserCreateValidator;
use helpers\validators\UserCreateRequestValidator;
use model\User;
use helpers\middlewares\UserMiddleware;

class UserController extends BaseController
{

    public function __construct()
    {
        UserMiddleware::isLoggedIn();
        UserMiddleware::isAdmin();
    }

    public function index()
    {
        $users = User::getAll();
        $data = [
            "users" => $users
        ];
        return view("admin/users/index.view.php", $data);
    }

    public function create()
    {

        $data = [];
        return view("admin/users/create.view.php", $data);
    }

    public function store(Request $request)
    {
        global $container;
        $db = $container->resolve('DB');
        try {
            $db->beginTransaction();
            AdminUserCreateValidator::validate($request);
            $user = UserCreateRequestMapper::getModel($request);
            $user->save();

            $userDTO = new UserDTO($user);
            $email = new EmailClient();
            $email->sendCredentials($userDTO->email, $request->get("password"));

            $db->commit();
            ResponseUtility::sendResponseByArray([
                "message" => "Successfully registered",
                "data" => $userDTO
            ]);
        } catch (\Exception $ex) {
            $db->rollBack();
            parent::response($ex->getMessage(), [], 422);
        }
    }



}