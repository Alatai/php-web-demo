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

        $keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : "";
        $currentPage = isset($_POST["currentPage"]) ? $_POST["currentPage"] : 1;

        $pageResult = (new BlogModel)->paginate($keyword, $currentPage);

        $this->assign("pageResult", $pageResult);
        $this->assign("keyword", $keyword);
        $this->render();
    }

    /**
     * Read more page.
     * @param $id
     */
    public function read($id)
    {
        session_start();

        $blog = (new BlogModel)->searchById($id);

        $this->assign("blog", $blog);
        $this->render();
    }

    /**
     * Edit page.
     * @param $id
     */
    public function edit($id = null)
    {
        session_start();

        // update
        if ($id) {
            $blog = (new BlogModel)->searchById($id);

            if ($_SESSION["username"] == $blog["writer"]) {
                $this->assign("blog", $blog);
            } else {
                header("Location: http://localhost:8080/login.html");
            }

            $this->render();
        } else { // add
            if ($_SESSION["username"]) {
                $this->render();
            } else {
                header("Location: http://localhost:8080/login.html");
            }
        }
    }

    /**
     * Add blog.
     */
    public function add()
    {
        session_start();

        $userId = $_SESSION["userid"];

        $data = array("user_id" => $userId, "title" => $_POST["title"], "summary" => $_POST["summary"],
            "content" => $_POST["content"], "created_at" => date("Y-m-d H:i:s"));

        (new BlogModel)->add($data);

        header("Location: http://localhost:8080/blog/index");
    }

    /**
     * Update blog.
     */
    public function update()
    {
        $data = array("id" => $_POST["id"], "title" => $_POST["title"],
            "summary" => $_POST["summary"], "content" => $_POST["content"]);

        (new BlogModel)->where(["id = :id"], [":id" => $data["id"]])->update($data);

        header("Location: http://localhost:8080/blog/index");
    }

    /**
     * Delete blog.
     * @param $id
     */
    public function delete($id)
    {
        session_start();

        $blog = (new BlogModel)->searchById($id);

        if ($_SESSION["username"] == $blog["writer"]) {
            (new BlogModel)->delete($id);
        }

        header("Location: http://localhost:8080/blog/index");
    }
}
