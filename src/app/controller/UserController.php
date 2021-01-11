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
     *
     */
    public function index()
    {
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

        if ($keyword) {
            $users = (new UserModel)->searchByKeyword($keyword);
        } else {
            $users = (new UserModel)->where()->order(['id DESC'])->fetchAll();
        }

        $this->assign("users", $users);

        $this->render();
    }
}

