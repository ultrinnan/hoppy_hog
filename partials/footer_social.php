<?php
$social = get_option('social_options');

if ($social) {
	echo '<nav class="social-list"><ul>';
    foreach ($social as $key => $value) {
        if ($value) {
            echo '<li class="li-' . $key . '"><a href="' . $value . '" target="_blank" style="font-size:40px;" title="' . $key . '"><i class="fa fa-' . $key . '"></i></a></li>';
        }
    }
    echo '</ul></nav>';
}