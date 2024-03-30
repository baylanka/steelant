<?php

namespace controllers;

use app\Request;
use helpers\dto\ConnectorDTO;
use helpers\dto\UserDTO;
use helpers\mappers\ConnectorStoreRequestMapper;
use helpers\mappers\UserCreateRequestMapper;
use helpers\pools\LanguagePool;
use helpers\repositories\UserRepository;
use helpers\services\UserService;
use helpers\utilities\ResponseUtility;
use Exception;
use helpers\validators\UserCreateRequestValidator;
use helpers\validators\UserLoginRequestValidator;

class UserController extends BaseController
{

    public function login_view(Request $request)
    {
        if(isset($_SESSION["auth"]) && $_SESSION["auth"] === true){
            header('Location: '.url("/"));
        }
        $data = [];
        return view("auth/login.view.php", $data);
    }

    public function login(Request $request)
    {
        try {
            UserLoginRequestValidator::validate($request);
            $user = UserService::login($request);
            $userDTO = new UserDTO($user);

            $_SESSION["user"] = $userDTO;
            $_SESSION["auth"] = true;
            ResponseUtility::sendResponseByArray([
                "auth" => true,
                "login" => "success",
                "data"=>$userDTO
            ]);
        } catch (\Exception $err) {
            parent::response($err->getMessage(), [], 422);
        }

    }


    public function register_view(Request $request)
    {
        if(isset($_SESSION["auth"]) && $_SESSION["auth"] === true){
            header('Location: '.url("/"));
        }
        $data = [];
        return view("auth/register.view.php", $data);
    }


    public function register(Request $request)
    {
        global $container;
        $db = $container->resolve('DB');
        try{
            $db->beginTransaction();
            UserCreateRequestValidator::validate($request);
            $user = UserCreateRequestMapper::getModel($request);
            $user->save();
            $db->commit();

            $userDTO = new UserDTO($user);

            $_SESSION["user"] = $userDTO;
            $_SESSION["auth"] = true;
            ResponseUtility::sendResponseByArray([
                "message" => "Successfully registered",
                "data" => $userDTO
            ]);
        }catch(\Exception $ex){
            $db->rollBack();
            parent::response($ex->getMessage(),[],422);
        }
    }


    public function logout()
    {
        session_destroy();
        header('Location: '.url("/"));
    }

}