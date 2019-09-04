<?php
$options = get_option('social_options');

$facebook = isset($options['facebook']) ? $options['facebook'] : '';
$instagram = isset($options['instagram']) ? $options['instagram'] : '';
$youtube = isset($options['youtube']) ? $options['youtube'] : '';
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
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
    <?php wp_head(); ?>
</head>
<body>
<!--    <div class="beer-hog" >-->
<!--        <div class="beer-hog-before" id="hog">-->
    <header class="fixed-header">
        <div class="wrapper">
            <?php
            if (!is_front_page()){
                echo '<a class="home-url" href="' . home_url() . '">На главную</a>';
            }
            ?>
            <div class="top-navigation">
                <nav class="social-nav">
                    <a target="_blank" class="social-nav__item fb" href="<?=$facebook?>"></a>
                    <a target="_blank" class="social-nav__item ig" href="<?=$instagram?>"></a>
                    <a target="_blank" class="social-nav__item yt" href="<?=$youtube?>"></a>
                </nav>
	            <?php
	            if (is_front_page()){
		            echo '<nav id="dot-nav"></nav>';
	            }
	            ?>
            </div>
        </div>
    </header>
    <main>