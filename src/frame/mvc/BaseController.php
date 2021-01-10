<?php

namespace frame\mvc;

/**
 * Class BaseController
 * @package frame\mvc
 */
class BaseController
{
    protected $_controller;
    protected $_action;
    protected $_view;

    /**
     * BaseController constructor.
     *
     * @param $controller
     * @param $action
     */
    public function __construct($controller, $action)
    {
        $this->_controller = $controller;
        $this->_action = $action;
        $this->_view = new BaseView($controller, $action);
    }

    /**
     * Assign variable.
     *
     * @param $name
     * @param $val
     */
    public function assign($name, $val)
    {
        $this->_view->assign($name, $val);
    }

    /**
     * Render pages.
     */
    public function render()
    {
        $this->_view->render();
    }
}