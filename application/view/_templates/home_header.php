<!DOCTYPE HTML>
<html lang="en-gb" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GO TO GYM</title>

    <!-- Favicon and Apple icon -->
    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <link href="apple_touch_icon.png" rel="apple-touch-icon-precomposed">

    <link href="<?= URL;?>assets/frontend/css/bootstrap.css" rel="stylesheet"><!-- Bootstrap Styles -->
    <link href="<?= URL;?>assets/frontend/css/theme.css" rel="stylesheet"><!-- Main Template Styles -->
    <link href="<?= URL;?>assets/frontend/css/schedule.css" rel="stylesheet"><!-- Schedule CSS -->
    <?php
    if(isset($plugin_css)){
        require $plugin_css;
    }
    ?>
    <?php
    if(isset($page_css)){
        require $page_css;
    }
    ?>
</head>
<body class="tm-isblog tm-page-workouts">
<div class="ak-page">
    <!-- START Main menu -->
    <nav class="tm-navbar uk-navbar uk-navbar-attached">
        <div class="uk-container uk-container-center">
            <!-- START Logo -->
            <a class="tm-logo" href="<?= URL;?>">
                <!-- <span class="color-1">GO TO </span><span class="color-2">GYM</span> -->
                <img src="<?= URL;?>assets/frontend/images/logo.png" style="margin-top: 10px;">
            </a>
            <!-- END Logo -->
            <ul class="uk-navbar-nav uk-hidden-small">
                <li class="uk-parent uk-active"><a href="<?= URL ?>">Home</a></li>
                <li><a href="<?= URL.'home/newfacility' ?>">New Facility</a></li>
                <li><a href="<?= URL.'home/contact' ?>">Contact</a></li>
                <li><a href="<?= URL.'home/login' ?>"">Login</a></li>
            </ul>
            <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas=""></a>
        </div>
    </nav>
    <!-- END Main menu -->
