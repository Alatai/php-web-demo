<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no,
     initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../../static/img/site.png">
    <link rel="stylesheet" href="../../static/css/main.css" type="text/css"/>
    <link rel="stylesheet" href="../../static/css/all.min.css" type="text/css"/>
    <script type="text/javascript" src="../../static/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../../static/js/main.js"></script>
    <title><?php echo strtoupper(substr($_SERVER["PHP_SELF"], 11, 4)); ?></title>
</head>
<body>

<!-- Nav -->
<header>
    <div class="nav">
        <div class="row">
            <div class="left">
                <ul>
                    <li><a href="/blog/index">HOME</a></li>
                    <li><a href="/blog/edit">BLOG</a></li>
                    <?php if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1): ?>
                        <li><a href="/user/index">USERS</a></li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="right">
                <?php if (isset($_SESSION["username"])): ?>
                    <ul>
                        <li class="last">
                            <a>WELCOME: <?php echo $_SESSION["username"] ?> 様</a>
                            <ul class="user-panel">
                                <li>
                                    <a href="/user/edit/<?php echo $_SESSION["userid"] ?>">Edit</a>
                                </li>
                                <li><a href="/login/logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php else: ?>
                    <ul>
                        <li><a href="/login/login">LOGIN</a></li>
                        <li class="last"><a href="/user/edit">SIGN IN</a></li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>
