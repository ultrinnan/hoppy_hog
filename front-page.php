<?php get_header();
$gen_options = get_option('general_options');

$address = isset($gen_options['address']) ? $gen_options['address'] : '';
$phone = isset($gen_options['phone']) ? $gen_options['phone'] : '';
$email = isset($gen_options['email']) ? $gen_options['email'] : '';

$options = get_option('social_options');

$facebook = isset($options['facebook']) ? $options['facebook'] : '';
$instagram = isset($options['instagram']) ? $options['instagram'] : '';
$youtube = isset($options['youtube']) ? $options['youtube'] : '';
?>

<div class="beer-hog">
        <div class="beer-hog-before" id="hog">
            <div id="background-wrap">
                <div class="bubble x1"></div>
                <div class="bubble x2"></div>
                <div class="bubble x3"></div>
                <div class="bubble x4"></div>
                <div class="bubble x5"></div>
                <div class="bubble x6"></div>
                <div class="bubble x7"></div>
                <div class="bubble x8"></div>
                <div class="bubble x9"></div>
                <div class="bubble x10"></div>
            </div>
        </div>
    </div>
    <section class="front-screen">
        <div class="rt">
            <div class="wrapper">
                <img class='logo' src="/wp-content/themes/hoppy_hog/images/logo.png" alt="hoppy-hog-logo">
                <p class="slogan">
                    <span>born to</span>
                    <strong class="brew">BREW</strong>
                    <span class="slogan-small">can't make it bad</span>
                </p>
            </div>
        </div>
    </section>
    <section class="sorts-screen">
        <div class="wrapper">
            <div class="description" id="description">
                <?php
                $introText = get_page_by_path('intro-text');
                echo get_post_field('post_content', $introText->ID);
                ?>
            </div>
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

    <section>
        <div class="facts-screen">
            <div class="wrapper">
	            <?php
	            if ( is_active_sidebar( 'beer-facts' ) ) {
		            dynamic_sidebar( 'beer-facts' );
	            }
	            ?>
            </div>
        </div>

        <div class="articles-screen">
            <div class="wrapper">
	            <?php
	            $args = array( 'category_name' => 'articles');
	            //wp query
	            $query = new WP_Query($args);
	            while ( $query->have_posts() ) :
		            $query->the_post();
		            $url = get_permalink();
		            $name = get_the_title();
		            $content = get_the_content();
		            $thumb = get_the_post_thumbnail_url()?get_the_post_thumbnail_url():'';
		            ?>
                <div class="article-box">
                    <article class="article-slider" style="width: 100%; max-width: 100%">
                        <a href="<?=$url;?>" class="article-img">
                            <img src="<?=$thumb;?>" alt="<?=$name;?>">
                        </a>
                        <div class="article-content">
                            <div class="art-logo">
                                <img src="/wp-content/themes/hoppy_hog/images/logo-black.png" alt="logo">
                            </div>
                            <header class="article-header">
                                <div class="h7">Семейная пивоварня</div>
                                <h5>HOPPY HOG</h5>
                                <h4><a href="<?=$url;?>"><?=$name;?></a></h4>
                            </header>
                            <div class="article-txt">
				                <?=$content;?>
                            </div>
                            <a href="<?=$url;?>" class="about-button">Читать дальше</a>
                        </div>
                    </article>
                </div>
	            <?php
	            endwhile;?>
            </div>
        </div>
    </section>
    <section>
        <div class="main-slider-screen">
            <div class="wrapper">
                <div class="main-slider">
                    <?php
                        echo do_shortcode('[smartslider3 slider=2]');
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="trigger-screen">
            <div class="wrapper">
                <div class="trigger">
	                <?php
	                // query for the about page
	                $horizonts = new WP_Query('pagename=horizonts');
	                // "loop" through query (even though it's just one page)
	                while ($horizonts->have_posts()) : $horizonts->the_post();
	                    $title = get_the_title();
		                $content = get_the_content();
		                $thumb = get_the_post_thumbnail_url();
	                endwhile;
	                // reset post data (important!)
	                wp_reset_postdata();
	                ?>
                    <h4 class="trigger-header">
                        <?=$title;?>
                    </h4>
                    <div class="trigger-txt">
                        <?=$content;?>
                        <div class="trigger-img">
                            <img src="<?=$thumb;?>" alt="beer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-company-screen">
        <div class="wrapper">
            <?php
            // query for the about page
            $aboutPage = new WP_Query('pagename=about-company');
            // "loop" through query (even though it's just one page)
            while ($aboutPage->have_posts()) : $aboutPage->the_post();
                the_content();
            endwhile;
            // reset post data (important!)
            wp_reset_postdata();
            ?>
        </div>
    </section>
    <section class="gallery-screen" id="gallery">
        <div class="wrapper">
	        <?php if (have_posts()): while (have_posts()): the_post(); ?>
		        <?php the_content(); ?>
	        <?php endwhile; endif; ?>
        </div>
    </section>
    <section class="principle-screen">
	    <?php
	    // query for the page
	    $principles = new WP_Query('pagename=principles');
	    // "loop" through query (even though it's just one page)
	    while ($principles->have_posts()) : $principles->the_post();
		    $thumb = get_the_post_thumbnail_url();
		    $content = get_the_content();
	    endwhile;
	    // reset post data (important!)
	    wp_reset_postdata();
	    ?>
        <div class="witch-screen" style="background: url(<?=$thumb;?>) 50% 100% no-repeat;">
            <div class="wrapper">
                <div class="principles">
                    <?=$content;?>
                </div>
            </div>
        </div>
    </section>
    <section class="form-screen" id="form">
        <div class="wrapper">
            <div class="form-box">
                <?php
                if ( is_active_sidebar( 'form-contacts' ) ) {
                    dynamic_sidebar( 'form-contacts' );
                }
                ?>
                <div class="credentials">
                    <div class="form-logo">
                        <img src="/wp-content/themes/hoppy_hog/images/form-logo.png" alt="hoppy hog">
                    </div>
                    <p class="address">
                        <?=stripslashes($address);?>
                    </p>
                    <p class="email">
                        <a href="mailto:<?=$email;?>"><?=$email;?></a>
                    </p>
                    <p class="phone">
                        <a href="tel:<?=$phone;?>"><?=$phone;?></a>
                    </p>
                    <div class="socials">
                        <nav class="social-nav">
                            <a target="_blank" class="social-nav__item fb" href="<?=$facebook?>"></a>
                            <a target="_blank" class="social-nav__item ig" href="<?=$instagram?>"></a>
                            <a target="_blank" class="social-nav__item yt" href="<?=$youtube?>"></a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
