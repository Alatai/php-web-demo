<?php

/*
 * index page
 * enter into the application
 * 参考：https://github.com/yeszao/fastphp
 */

define("APP_PATH", __DIR__ . "/"); // set application's path
define("APP_DEBUG", true); // use debug mode

// load frame file
require(APP_PATH . "frame/MyMvc.php");

// load configuration file
$cfg = require(APP_PATH . "config/config.php");

// create frame's instance
(new frame\MyMvc($cfg))->run();