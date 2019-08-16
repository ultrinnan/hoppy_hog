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
        <div class="footer-box">
            <div class="footer-col-beer">
                <h4>Пиво</h4>
                <div class="footer-col-beer-box">
                    <a href="#">Sweet Dreams</a>
                    <a href="#">IPA</a>
                    <a href="#">GingeriAle</a>
                    <a href="#">Amber Ale</a>
                    <a href="#">Neipa</a>
                    <a href="#">Milkshake</a>
                    <a href="#">Belgian</a>
                    <a href="#">Alt Bier</a>
                    <a href="#">Panama</a>
                    <a href="#">Gruit</a>
                    <a href="#">Gembale</a>
                    <a href="#">Salty Caramel</a>
                    <a href="#">Red Wedding</a>
                    <a href="#">УПА</a>
                </div>
            </div>
            <div class="footer-col-about">
                <h4>О пивоварне</h4>
                <a href="#">Достижения</a>
                <a href="#">О нашем пиве</a>
                <a href="#">Перспективы</a>
                <a href="#">Технологии</a>
                <a href="#">История создания</a>

            </div>
            <div class="footer-col-contacts">
                <h4>Контакты</h4>
                <a href="#">Обратная связь</a>
                <a href="#">Подписка на новости</a>
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
                <a href="#">Youtube</a>
            </div>
        </div>
        <div class="footer-credentials">
            <a href="mailto:<?=$email;?>"><?=$email;?></a>
            <a href="tel:<?=$phone;?>"><?=$phone;?></a>
            <span>HoppyHog © <?=date('Y')?></span>
            <span>created by <a href="https://fedirko.pro">FEDIRKO.PRO</a></span>
        </div>
    </div>
</footer>
<!--        </div>-->
<!--    </div>-->

<?php wp_footer(); ?>

</body>
</html>