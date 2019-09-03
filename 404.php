<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 */

get_header();

$main_thumbnail = has_post_thumbnail() ? get_the_post_thumbnail_url() : '/wp-content/themes/hoppy_hog/images/night_sky.jpg';
?>
    <section class="section title" style="background: url('<?=$main_thumbnail?>') center no-repeat; background-size: cover;">
        <div class="wrapper">
            <h1>404</h1>
            <h2 class="center"><?php _e( 'Ooops... Page not found...', 'hoppy_hog' ); ?></h2>
        </div>

    </section>
    <section class="section content">
        <div class="wrapper">
            <div class="center">
                <img src="/wp-content/themes/hoppy_hog/images/404_beer_man.jpg" alt="404">
            </div>
        </div>
    </section>
<?php get_footer(); ?>