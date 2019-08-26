<?php get_header();
$gen_options = get_option('general_options');

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
                    <a class='go' href="#description">⌄</a>
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
                <article class="article-slider">
                    <div class="article-img">
                        <img src="/wp-content/themes/hoppy_hog/images/article-img.jpg" alt="article image">
                    </div>
                    <div class="article-content">
                        <div class="art-logo">
                            <img src="/wp-content/themes/hoppy_hog/images/logo-black.png" alt="logo">
                        </div>
                        <header class="article-header">
                            <h7>Семейная пивоварня</h7>
                            <h5>HOPPY HOG</h5>
                            <h4>Пиво, созданное с целью</h4>
                        </header>
                        <div class="article-txt">
                            В пивоварне <strong>Hoppy Hog</strong> всегда стремятся к самым высоким стандартам. Каждый день мы бросаем вызов сами себе. Наша погоня за высококим качеством приводит нас к постоянным поискам и исследованиям. Это путешествие по изведанному и неизведанному, позволяет нам создавать каждый раз нечто инересное, что дарит радость, объединяет и вдохновляет друзей. Наше пиво создаёт общество. Захватывающие истории и приключение движат нами, и наше пиво является их частью. Частью такого мира, который наполнен желаниями и возможностями. И мы постоянно стремимся к таким ощущениям. Это те вещи, которые были когда-то сказаны в те далёкие времена, когда идея пивоварени ещё только витала в воздухе.
                        </div>
                        <button class="about-button">o нашем пиве</button>
                    </div>
                </article>
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
                    <h4 class="trigger-header">Расширяющиеся горизонты</h4>
                    <div class="trigger-txt">
                        <h4 class="trigger-header-left">Расширяющиеся</h4>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta facere ipsam quaerat quisquam temporibus. Dicta, dolor eveniet ex explicabo impedit magnam non obcaecati pariatur placeat provident quam repudiandae ullam voluptatem.
                    </div>
                    <div class="trigger-img">
                        <img src="/wp-content/themes/hoppy_hog/images/trigger-bottle.png" alt="beer">
                    </div>
                    <div class="trigger-txt">
                        <h4 class="trigger-header-right">горизонты</h4>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis dolor eos eveniet illo impedit magnam quia quibusdam repellat rerum tempora? Accusantium autem facilis magni maiores minus molestiae saepe sequi temporibus.
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

        <div class="wrapper">
            <div class="main-video">
                <iframe width="820" height="400" src="https://www.youtube.com/embed/xzIt3Q7uaAE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="about-company">
                <h4>Hoppy Hog Family Brewery</h4>
                <div class="about-company-txt">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit </p>
                    <p>voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                </div>

            </div>
        </div>
    </section>
    <section class="gallery-screen" id="gallery">
        <div class="wrapper">
            <?php
            if ( is_active_sidebar( 'gallery' ) ) {
                dynamic_sidebar( 'gallery' );
            }
            ?>
            <div class="gallery">
                <div class="gallery-item">
                    <a href="images/1.jpg" data-fancybox="images">
                        <img src="/wp-content/themes/hoppy_hog/images/1.jpg" alt="">
                    </a>
                </div>
                <div class="gallery-item">
                    <a href="images/2.jpg" data-fancybox="images">
                        <img src="/wp-content/themes/hoppy_hog/images/2.jpg" alt="">
                    </a>
                </div>
                <div class="gallery-item">
                    <a href="images/3.jpg" data-fancybox="images">
                        <img src="/wp-content/themes/hoppy_hog/images/3.jpg" alt="">
                    </a>
                </div>
                <div class="gallery-item">
                    <a href="images/4.jpg" data-fancybox="images">
                        <img src="/wp-content/themes/hoppy_hog/images/4.jpg" alt="">
                    </a>
                </div>
                <div class="gallery-item">
                    <a href="images/5.jpg" data-fancybox="images">
                        <img src="/wp-content/themes/hoppy_hog/images/5.jpg" alt="">
                    </a>
                </div>
                <div class="gallery-item">
                    <a href="images/6.jpg" data-fancybox="images">
                        <img src="/wp-content/themes/hoppy_hog/images/6.jpg" alt="">
                    </a>
                </div>
                <div class="gallery-item">
                    <a href="images/7.jpg" data-fancybox="images">
                        <img src="/wp-content/themes/hoppy_hog/images/7.jpg" alt="">
                    </a>
                </div>
                <div class="gallery-item">
                    <a href="images/8.jpg" data-fancybox="images">
                        <img src="/wp-content/themes/hoppy_hog/images/8.jpg" alt="">
                    </a>
                </div>
                <div class="gallery-item">
                    <a href="images/9.jpg" data-fancybox="images">
                        <img src="/wp-content/themes/hoppy_hog/images/9.jpg" alt="">
                    </a>
                </div>
                <div class="gallery-item">
                    <a href="images/10.jpg" data-fancybox="images">
                        <img src="/wp-content/themes/hoppy_hog/images/10.jpg" alt="">
                    </a>
                </div>
                <div class="gallery-item">
                    <a href="videos/test.mp4" data-fancybox="images">
                        <video src="videos/test.mp4"></video>
                    </a>
                    <!--                        <a href="images/11.jpg" data-fancybox="images">-->
                    <!--                            <img src="/wp-content/themes/hoppy_hog/images/11.jpg" alt="">-->
                    <!--                        </a>-->
                </div>
                <div class="gallery-item">
                    <a href="images/12.jpg" data-fancybox="images">
                        <img src="/wp-content/themes/hoppy_hog/images/12.jpg" alt="">
                    </a>
                </div>
                <div class="insta-link">
                    <span>больше фотографий</span>
                    <a href="https://www.instagram.com/hoppyhog/">@HoppyHog</a>
                </div>
            </div>
        </div>
    </section>
    <section class="principle-screen">
        <div class="witch-screen">
            <div class="wrapper">
                <div class="principles">
                    <?php
                    // query for the page
                    $principles = new WP_Query('pagename=principles');
                    // "loop" through query (even though it's just one page)
                    while ($principles->have_posts()) : $principles->the_post();
                        the_content();
                    endwhile;
                    // reset post data (important!)
                    wp_reset_postdata();
                    ?>
                </div>
                <div class="main-principle">
                    <?php
                    if ( is_active_sidebar( 'principles' ) ) {
                        dynamic_sidebar( 'principles' );
                    }
                    ?>
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
                        Семейная крафтовая пивоварня
                        <strong>"Хмельной Кабан"</strong>, Одесса, Украина
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
