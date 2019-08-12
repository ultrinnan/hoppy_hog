<?php

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        <?php wp_title(); ?>
    </title>
    <?php wp_head(); ?>
</head>
<body>
<!--    <div class="beer-hog" >-->
<!--        <div class="beer-hog-before" id="hog">-->
    <header class="fixed-header">
        <div class="wrapper">
            <div class="top-navigation">
                <nav class="social-nav">
                    <a class="social-nav__item fb" href="#"></a>
                    <a class="social-nav__item ig" href="#"></a>
                    <a class="social-nav__item yt" href="#"></a>
                </nav>
                <!--                <nav class="main-nav" id="dot-nav">-->
                <!--                    <ul>-->
                <!--                        <li class="main-nav__item"><a href="#"></a></li>-->
                <!--                        <li class="main-nav__item"><a href="#sorts"></a></li>-->
                <!--                        <li class="main-nav__item"><a href="#articles"></a></li>-->
                <!--                        <li class="main-nav__item"><a href="#gallery"></a></li>-->
                <!--                        <li class="main-nav__item"><a href="#form"></a></li>-->
                <!--                    </ul>-->
                <!--                </nav>-->
                <nav id="dot-nav"></nav>
            </div>
        </div>
    </header>
    <main>