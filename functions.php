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
    wp_enqueue_style('fancy_box', get_template_directory_uri() . '/css/jquery.fancybox.min.css');
    wp_enqueue_style('f_style', get_template_directory_uri() . '/css/main.min.css');

    // Connect scripts
	wp_enqueue_script('jquery');
//	wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '1.0', true);
	wp_enqueue_script('jquery_fancy', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('f_scripts', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0', true);
//	wp_enqueue_script('f_scripts', get_template_directory_uri() . '/js/main.min.js', array('jquery'), '1.0', true);
}
// Create action where we connected scripts and styles in function f_scripts_styles
add_action('wp_enqueue_scripts', 'f_scripts_styles', 1);

//custom locations for menus
function f_register_menus() {
    register_nav_menu( 'footer', __( 'Footer menu', 'theme-slug' ) );
}
add_action( 'after_setup_theme', 'f_register_menus' );

// create widget for Contacts page
register_sidebar(array(
	'name' => 'Contacts page form',
	'id' => 'form-contacts',
	'before_widget' => '<div class="form-content">',
	'after_widget' => '</div>',
	'before_title' => '<h2 class="h2 title"><span class="contact_icon">',
	'after_title' => '</span></h2>',
));