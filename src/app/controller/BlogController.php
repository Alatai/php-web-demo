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
     * Blog index page.
     */
    public function index()
    {
        $blogs = (new BlogModel)->fetchAll();

        $this->assign("blogs", $blogs);

        $this->render();
    }
}
