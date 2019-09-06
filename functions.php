<?php
add_filter('widget_text','do_shortcode');

add_theme_support('menus');
add_theme_support('post-thumbnails');

//security hooks
require 'admin/security_hooks.php';

//dashboard customization
require 'admin/admin_customizations.php';

// Common scripts and styles
function f_scripts_styles()
{
    // Connect styles
//    wp_enqueue_style('fancy_box', get_template_directory_uri() . '/css/jquery.fancybox.min.css');
    wp_enqueue_style('slick_css', "//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css");
    wp_enqueue_style('slick_css_theme', "//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css");
    wp_enqueue_style('f_style', get_template_directory_uri() . '/css/main.min.css');

//	wp_enqueue_script('jquery');
//	wp_enqueue_script('jquery_fancy', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('slick_js', "//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js", array('jquery'), '1.0', true);
	wp_enqueue_script('f_scripts', get_template_directory_uri() . '/js/main.min.js', array('jquery'), '1.0', true);
}
// Create action where we connected scripts and styles in function f_scripts_styles
add_action('wp_enqueue_scripts', 'f_scripts_styles', 1);

//custom locations for menus
function f_register_menus() {
    register_nav_menu( 'footer', __( 'Footer menu', 'theme-slug' ) );
}
add_action( 'after_setup_theme', 'f_register_menus' );

//remove titles for all widgets
add_filter('widget_title','my_widget_title');
function my_widget_title($t)
{
	return null;
}

// create widget for Contacts page
register_sidebar(array(
	'name' => 'Contacts page form',
	'id' => 'form-contacts',
	'before_widget' => '<div class="form-content">',
	'after_widget' => '</div>',
));

// create widgets for facts
register_sidebar(array(
	'name' => 'Beer facts',
	'id' => 'beer-facts',
	'before_widget' => '',
	'after_widget' => '',
));

// create widget for gallery
register_sidebar(array(
	'name' => 'Gallery',
	'id' => 'gallery',
	'before_widget' => '',
	'after_widget' => '',
));
// create widget for principles
register_sidebar(array(
	'name' => 'Principles',
	'id' => 'principles',
	'before_widget' => '',
	'after_widget' => '',
));