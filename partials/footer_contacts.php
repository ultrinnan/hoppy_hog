<?php
$contacts = get_option('general_options');
if ($contacts) {
    foreach ($contacts as $key => $value) {
//    	var_dump($value);
        if ($value) {
            switch ($key){
                case 'tel1':
                    echo '<div><a class="contact ' . $key . '" href="tel:' . $value . '">' . $value . '</a></div>';
                    break;
                case 'tel2':
                    echo '<div><a class="contact ' . $key . '" href="tel:' . $value . '">' . $value . '</a></div>';
                    break;
                case 'email':
                    echo '<div><a class="contact ' . $key . '" href="mailto:' . $value . '">' . $value . '</a></div>';
                    break;
                case 'address':
                    echo '<div><span class="contact ' . $key . '">' . $value . '</span></div>';
                    break;
            }
        }
    }
}