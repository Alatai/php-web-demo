<?php

namespace app\controller;

use frame\mvc\BaseController;
use app\model\UserModel;

/**
 * Class UserController
 * @package app\controller
 * @author 斉鵬
 */
class UserController extends BaseController
{
    /**
     * User management index page.
     */
    public function index()
    {
        session_start();

        if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) {
            $users = (new UserModel)->fetchAll();

            $this->assign("users", $users);
            $this->render();
        } else {
            echo "You have no permission.";
        }
    }

    /**
     * Edit page.
     *
     * @param $id
     */
    public function edit($id = null)
    {
        session_start();

        if ($id) {
            $user = (new UserModel)->searchById($id);
            $this->assign("user", $user);
        }

        $this->render();
    }

    /**
     * Add user.
     */
    public function add()
    {
        $data = array("name" => $_POST["name"], "email" => $_POST["email"],
            "password" => $_POST["password"], "created_at" => date("Y-m-d H:i:s"), "admin" => 0);

        (new UserModel)->add($data);

        header("Location: http://localhost:8080/login.html");
    }

    /**
     * Update user.
     */
    public function update()
    {
        $data = array("id" => $_POST["id"], "name" => $_POST["name"], "email" => $_POST["email"],
            "password" => $_POST["password"], "created_at" => date("Y-m-d H:i:s"), "admin" => 0);

        (new UserModel)->where(["id = :id"], [":id" => $data["id"]])->update($data);

        header("Location: http://localhost:8080/login.html");

    }

    /**
     * Delete user.
     *
     * @param $id
     */
    public function delete($id)
    {
        (new UserModel)->delete($id);

        header("Location: http://localhost:8080/user/index");
    }
}

