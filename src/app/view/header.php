<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no,
     initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../static/css/uikit.min.css" type="text/css"/>
    <link rel="stylesheet" href="../../static/css/main.css" type="text/css"/>
    <link rel="icon" href="../../static/img/site.png">
    <script type="text/javascript" src="../../static/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../../static/js/uikit.min.js"></script>
    <script type="text/javascript" src="../../static/js/uikit-icons.min.js"></script>
    <script type="text/javascript" src="../../static/js/main.js"></script>
    <title><?php echo strtoupper(substr($_SERVER["PHP_SELF"], 11, 4)); ?></title>
</head>
<body>

<!-- Nav -->
<div class="uk-margin-medium-bottom uk-sticky uk-navbar-transparent"
     uk-sticky="show-on-up: true; animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent;">
    <div class="uk-navbar-container uk-visible@m uk-background-secondary uk-light" uk-navbar>
        <div class="uk-navbar-left uk-margin-large-left">
            <ul class="uk-navbar-nav">
                <li><a href="/blog/index">HOME | ホーム</a></li>
                <li><a href="/blog/edit">BLOG | ブログ</a></li>
                <?php if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1): ?>
                    <li><a href="/user/index">USER | ユーザ</a></li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="uk-navbar-right uk-margin-large-right">
            <?php if (isset($_SESSION["username"])): ?>
                <ul class="uk-navbar-nav">
                    <li>
                        <a>WELCOME:<?php echo $_SESSION["username"] ?> 様</a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li><a href="/user/edit/<?php echo $_SESSION["userid"] ?>">EDIT</a></li>
                                <li><a href="/login/logout">LOGOUT</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            <?php else: ?>
                <ul class="uk-navbar-nav">
                    <li><a href="/login/login">LOGIN</a></li>
                    <li><a href="/user/edit">SIGN IN</a></li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>
