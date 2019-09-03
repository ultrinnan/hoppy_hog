<?php
$options = get_option('general_options');

$phone = isset($options['phone']) ? $options['phone'] : '';
$email = isset($options['email']) ? $options['email'] : '';
?>

</main>
<footer>
    <div class="wrapper">
        <?php wp_nav_menu([
		    'theme_location' => 'footer',
		    'container' => false,
		    'menu_class' => 'footer-box'
	    ]);?>
        <div class="footer-credentials">
            <a href="mailto:<?=$email;?>"><?=$email;?></a>
            <a href="tel:<?=$phone;?>"><?=$phone;?></a>
            <span>HoppyHog © <?=date('Y')?></span>
            <span class="creators">created by <a target="_blank" href="https://fedirko.pro">FEDIRKO.PRO</a></span>
        </div>
    </div>
</footer>
<!--        </div>-->
<!--    </div>-->

<?php wp_footer(); ?>

</body>
</html>