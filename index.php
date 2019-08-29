<?php
get_header();

$main_thumbnail = has_post_thumbnail() ? get_the_post_thumbnail_url() : '/wp-content/themes/hoppy_hog/images/night_sky.jpg';
?>
	<section class="section title" style="background: url('<?=$main_thumbnail?>') center no-repeat; background-size: cover;">
		<div class="wrapper">
			<h1><?php the_title(); ?></h1>
		</div>

	</section>
	<section class="section content">
		<div class="wrapper">
			<?php if (have_posts()): while (have_posts()): the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
		</div>
	</section>
<?php get_footer(); ?>