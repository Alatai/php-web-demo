<?php

namespace frame\mvc;

/**
 * Class BaseView
 * @package frame\mvc
 */
class BaseView
{
    protected $variables = array();
    protected $_controller;
    protected $_action;

    /**
     * BaseView constructor.
     *
     * @param $controller
     * @param $action
     */
    public function __construct($controller, $action)
    {
        $this->_controller = strtolower($controller);
        $this->_action = strtolower($action);
    }

    /**
     * Assign variable.
     *
     * @param $name
     * @param $val
     */
    public function assign($name, $val)
    {
        $this->variables[$name] = $val;
    }

    /**
     * Render pages.
     */
    public function render()
    {
        extract($this->variables);
        $defaultsHeader = APP_PATH . "app/view/header.php";
        $defaultsFooter = APP_PATH . "app/view/footer.php";

        $controllerHeader = APP_PATH . "app/view/" . $this->_controller . "header.php";
        $controllerFooter = APP_PATH . "app/view/" . $this->_controller . "footer.php";
        $controllerLayout = APP_PATH . "app/view/" . $this->_controller . "/" . $this->_action . ".php";

        // header file
        if (is_file($controllerHeader)) {
            include($controllerHeader);
        } else {
            include($defaultsHeader);
        }

        // mvc content file
        if (is_file($controllerLayout)) {
            include($controllerLayout);
        } else {
            echo "<h1>Can not find the file.</h1>";
        }

        // footer file
        if (is_file($controllerFooter)) {
            include($controllerFooter);
        } else {
            include($defaultsFooter);
        }
    }
}