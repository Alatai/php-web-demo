<?php

namespace app\controller;

use frame\mvc\BaseController;
use app\model\BlogModel;

/**
 * Class BlogController
 * @package app\controller
 * @author 斉鵬
 */
class BlogController extends BaseController
{
    /**
     * Blog home/index page.
     */
    public function index()
    {
        session_start();

        if ($_SESSION["username"]) {
            $pageResult = (new BlogModel)->paginate(1, 5);

            $this->assign("pageResult", $pageResult);

            $this->render();
        } else {
            header("Location: http://localhost:8080/login.html");
        }
    }

    /**
     * Blog update.
     */
    public function update() {
        echo $_SERVER['PHP_SELF']."<br>";
    }
}
