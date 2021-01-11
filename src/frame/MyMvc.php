<?php

namespace frame;

defined("CORE_PATH") or define("CORE_PATH", __DIR__); // frame root path

/**
 * Class MyMvc
 * @package frame
 */
class MyMvc
{
    protected $cfg = [];

    /**
     * MyMvc constructor.
     * @param $cfg
     */
    public function __construct($cfg)
    {
        $this->cfg = $cfg;
    }

    /**
     * Start application.
     */
    public function run()
    {
        spl_autoload_register(array($this, "loadClass"));
        $this->setReporting();
        $this->removeMagicQuotes();
        $this->unregisterGlobals();
        $this->setDBConfig();
        $this->route();
    }

    /**
     * Handle route.
     * Get URL, controller's name, method's name and URL parameters.
     */
    public function route()
    {
        $controllerName = $this->cfg["defaultController"];
        $actionName = $this->cfg["defaultAction"];
        $param = array();

        $url = $_SERVER["REQUEST_URI"];

        $position = strpos($url, "?");
        $url = $position === false ? $url : substr($url, 0, $position);
        $url = trim($url, "/");

        if ($url) {
            $urlArr = explode("/", $url);
            $urlArr = array_filter($urlArr);

            $controllerName = ucfirst($urlArr[0]);

            array_shift($urlArr);
            $actionName = $urlArr ? $urlArr[0] : $actionName;

            array_shift($urlArr);
            $param = $urlArr ? $urlArr : array();
        }

        $controller = "app\\controller\\" . $controllerName . "Controller";

        if (!class_exists($controller)) {
            exit($controller . " controller does not exist.");
        }

        if (!method_exists($controller, $actionName)) {
            exit($actionName . " method does not exist.");
        }

        $dispatch = new $controller($controllerName, $actionName);

        call_user_func_array(array($dispatch, $actionName), $param);
    }

    /**
     * Check dev env.
     */
    public function setReporting()
    {
        if (APP_DEBUG === true) {
            error_reporting(E_ALL);
            ini_set("display_errors", "On");
        } else {
            error_reporting(E_ALL);
            ini_set("display_errors", "Off");
            ini_set("log_errors", "On");
        }
    }

    /**
     * Remove chars.
     *
     * @param $val
     * @return mixed
     */
    public function stripSlashesDeep($val)
    {
        $val = is_array($val) ? array_map(array($this, "stripSlashesDeep"), $val) : stripslashes($val);

        return $val;
    }

    /**
     * Check and remove chars.
     */
    public function removeMagicQuotes()
    {
        $_GET = isset($_GET) ? $this->stripSlashesDeep($_GET) : "";
        $_POST = isset($_POST) ? $this->stripSlashesDeep($_POST) : "";
        $_COOKIE = isset($_COOKIE) ? $this->stripSlashesDeep($_COOKIE) : "";
        $_SESSION = isset($_SESSION) ? $this->stripSlashesDeep($_SESSION) : "";
    }

    /**
     * Check and remove global variable.
     */
    public function unregisterGlobals()
    {
        if (ini_get("register_globals")) {
            $array = array("_SESSION", "_POST", "_GET", "_COOKIES", "_REQUEST", "_SERVER", "_ENV", "_FILES");

            foreach ($array as $ele) {
                foreach ($GLOBALS[$ele] as $key => $var) {
                    if ($var === $GLOBALS[$key]) {
                        unset($GLOBALS[$key]);
                    }
                }
            }
        }
    }

    /**
     * Database configuration.
     */
    public function setDBConfig()
    {
        if ($this->cfg["db"]) {
            define("DB_HOST", $this->cfg["db"]["host"]);
            define("DB_NAME", $this->cfg["db"]["dbname"]);
            define("DB_USER", $this->cfg["db"]["username"]);
            define("DB_PWD", $this->cfg["db"]["password"]);
        }
    }

    /**
     * Autoload class.
     *
     * @param $className
     */
    public function loadClass($className)
    {
        $classMap = $this->classMap();

        if (isset($classMap[$className])) {
            $file = $classMap[$className];
        } elseif (strpos($className, "\\") !== false) {
            $file = APP_PATH . str_replace("\\", "/", $className) . ".php";

            if (!is_file($file)) return;
        } else {
            return;
        }

        include $file;
    }

    /**
     * Core file mapping.
     */
    protected function classMap()
    {
        return [
            "frame\base\Controller" => CORE_PATH . "/mvc/BaseController.php",
            "frame\base\Model" => CORE_PATH . "/mvc/BaseModel.php",
            "frame\base\View" => CORE_PATH . "/mvc/BaseView.php",
            "frame\db\DBConnection" => CORE_PATH . "/db/BasePDBC.php",
            "frame\db\BaseQuery" => CORE_PATH . "/db/BaseQuery.php",
        ];
    }
}