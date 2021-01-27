<?php

namespace app\controller;

use frame\mvc\BaseController;
use app\model\UserModel;

/**
 * Class LoginController
 * @package app\controller
 * @author 斉鵬
 */
class LoginController extends BaseController
{
    /**
     * Login.
     */
    public function login()
    {
        $account = $_POST["account"];
        $password = $_POST["password"];

        $user = (new UserModel())->login($account, $password);

        if ($user) {
            session_start();

            $_SESSION["userid"] = $user["id"];
            $_SESSION["username"] = $user["name"];
            $_SESSION["admin"] = $user["admin"];

            header("Location: http://localhost:8080/blog/index");
        } else {
            header("Location: http://localhost:8080/login.html");
        }
    }

    /**
     * Logout.
     */
    public function logout()
    {
        session_start();
        session_destroy();

        header("Location: http://localhost:8080/blog/index");
    }
}