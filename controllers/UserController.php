<?php

namespace controllers;

use app\Request;
use helpers\clients\EmailClient;
use helpers\dto\ConnectorDTO;
use helpers\dto\UserDTO;
use helpers\mappers\ConnectorStoreRequestMapper;
use helpers\mappers\UserCreateRequestMapper;
use helpers\middlewears\UserMiddlewear;
use helpers\pools\LanguagePool;
use helpers\repositories\UserRepository;
use helpers\services\UserService;
use helpers\utilities\ResponseUtility;
use Exception;
use helpers\validators\SendVerificationRequestValidator;
use helpers\validators\UserCreateRequestValidator;
use helpers\validators\UserEmailVerifyRequestValidator;
use helpers\validators\UserLoginRequestValidator;
use helpers\validators\UserUpdatePasswordRequestValidator;
use helpers\validators\UserUpdateRequestValidator;
use model\User;

class UserController extends BaseController
{

    public function login_view(Request $request)
    {
        if (isset($_SESSION["auth"]) && $_SESSION["auth"] === true) {
            header('Location: ' . url("/"));
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
                "data" => $userDTO
            ]);
        } catch (\Exception $err) {
            parent::response($err->getMessage(), [], 422);
        }

    }

    public function register_view(Request $request)
    {
        if (isset($_SESSION["auth"]) && $_SESSION["auth"] === true) {
            header('Location: ' . url("/"));
        }
        $data = [];
        return view("auth/register.view.php", $data);
    }

    public function register(Request $request)
    {
        global $container;
        $db = $container->resolve('DB');
        try {
            $db->beginTransaction();
            UserCreateRequestValidator::validate($request);
            $user = UserCreateRequestMapper::getModel($request);
            $user->save();

            $userDTO = new UserDTO($user);
            $email = new EmailClient();
            $email->sendVerificationMail($userDTO->email, $userDTO->verification_key);

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


    public function logout()
    {
        session_destroy();
        header('Location: ' . url("/"));
    }

    public function subscribe()
    {
        $user = User::getById($_SESSION["user"]->id);
        $user->newsletter = 1;
        $user->save();

        $userDTO = new UserDTO($user);

        $_SESSION["user"] = $userDTO;
        header('Location: ' . url("/newsletter"));
    }

    public function unsubscribe()
    {
        $user = User::getById($_SESSION["user"]->id);
        $user->newsletter = 0;
        $user->save();

        $userDTO = new UserDTO($user);

        $_SESSION["user"] = $userDTO;
        header('Location: ' . url("/newsletter"));
    }

    public function verify_mail(Request $request)
    {
        try {
            UserEmailVerifyRequestValidator::validate($request);
            $user = UserService::verify_email($request);
            header('Location: ' . url("/login?mail=").$user->email.'&mail_verified=true');
            die;
        } catch (\Exception $err) {
            parent::response($err->getMessage(), [], 422);
        }

    }

    public function sendMessage(Request $request)
    {
        try {
            $email = new EmailClient();
            $email->sendInquiryMail($request);
            header('Location: ' . url("/contact?alert=Inquiry mail successfully sent&alert_type=success"));
            die;
        } catch (\Exception $err) {
            parent::response($err->getMessage(), [], 422);
        }

    }

    public function profile(Request $request)
    {
        UserMiddlewear::isLoggedIn();
        $data = [];
        return view("user/profile.view.php", $data);
    }


    public function update(Request $request)
    {
        global $container;
        $db = $container->resolve('DB');
        try {
            $db->beginTransaction();
            UserUpdateRequestValidator::validate($request);

            User::updateById($_SESSION["user"]->id,$request->all());

            $user = User::getById($_SESSION["user"]->id);
            $userDTO = new UserDTO($user);

            $_SESSION["user"] = $userDTO;
            $db->commit();
            ResponseUtility::sendResponseByArray([
                "message" => "Successfully updated",
                "data" => $userDTO
            ]);
        } catch (\Exception $ex) {
            $db->rollBack();
            parent::response($ex->getMessage(), [], 422);
        }

    }

    public function update_password(Request $request)
    {
        global $container;
        $db = $container->resolve('DB');
        try {
            $db->beginTransaction();
            UserUpdatePasswordRequestValidator::validate($request);

            User::updateById($_SESSION["user"]->id,["password" => password_hash(md5($request->get('new_password')), PASSWORD_BCRYPT)]);

            $user = User::getById($_SESSION["user"]->id);
            $userDTO = new UserDTO($user);

            $_SESSION["user"] = $userDTO;
            $db->commit();
            ResponseUtility::sendResponseByArray([
                "message" => "Successfully updated",
                "data" => $userDTO
            ]);
        } catch (\Exception $ex) {
            $db->rollBack();
            parent::response($ex->getMessage(), [], 422);
        }

    }

}