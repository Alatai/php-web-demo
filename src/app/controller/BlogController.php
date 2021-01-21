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
        $pageResult = (new BlogModel)->paginate(1, 5);

        $this->assign("pageResult", $pageResult);

        $this->render();
    }
}
