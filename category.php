<?php
get_header();

$main_thumbnail = has_post_thumbnail() ? get_the_post_thumbnail_url() : '/wp-content/themes/hoppy_hog/images/night_sky.jpg';
?>
<section class="section title" style="background: url('<?=$main_thumbnail?>') center no-repeat; background-size: cover;">
    <div class="wrapper">
        <h1><?php echo single_cat_title( '', false ); ?></h1>
    </div>

</section>
<section class="section content">
    <div class="wrapper">
        <div class="sorts" id="sorts">
		    <?php
		    $beer_args = array( 'category_name' => 'beer');
		    //wp query
		    $beer_query = new WP_Query($beer_args);
		    while ( $beer_query->have_posts() ) :
			    $beer_query->the_post();
			    $beer_url = get_permalink();
			    $beer_name = get_the_title();
			    $thumb = get_the_post_thumbnail_url()?get_the_post_thumbnail_url():'';
			    ?>
                <a href="<?=$beer_url?>" class="sort-box">
                    <img src="<?=$thumb?>" alt="<?=$beer_name?>">
                    <span><?=$beer_name?></span>
                </a>
		    <?php
		    endwhile;?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
