<?php
// Start the session
session_start();

// is login ?
if (!$_SESSION["username"]) {
    header("Location: http://localhost:8080/login.html");
}
?>
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
    <title>HOME</title>
</head>
<body>

<!-- navigation -->
<div class="uk-margin-large-bottom uk-background-muted">
    <div class="uk-container">
        <div class="uk-navbar-container" uk-navbar>
            <div class="uk-navbar-left">
                <ul class="uk-navbar-nav">
                    <li class="uk-active"><a href="#">HOME | ホーム</a></li>
                    <li><a href="#">BLOG | ブログ</a></li>
                    <li><a href="#">OTHER | その他</a></li>
                </ul>
            </div>

            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav">
                    <li class="uk-active"><a href="#">WELCOME: <?php echo $_SESSION["username"]; ?> 様</a></li>
                    <li><a href="/login/logout">logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
