<?php

//удаляем ненужные пункты меню и виджеты - start
add_action( 'admin_menu', 'remove_menu_items' );
function remove_menu_items() {
    // тут мы указываем ярлык пункты который удаляем.
   //  remove_menu_page( 'index.php' );                  // Консоль
    // remove_menu_page( 'edit.php' );                   // Записи
    // remove_menu_page( 'post-new.php' );                   // Записи
    // remove_menu_page( 'upload.php' );                 // Медиафайлы
    // remove_menu_page( 'edit.php?post_type=page' );    // Страницы
    remove_menu_page( 'edit-comments.php' );          // Комментарии
    // remove_menu_page( 'themes.php' );                 // Внешний вид
    // remove_menu_page( 'plugins.php' );                // Плагины
    // remove_menu_page( 'users.php' );                  // Пользователи
    // remove_menu_page( 'tools.php' );                  // Инструменты
    // remove_menu_page( 'options-general.php' );        // Настройки
    }
add_action( 'admin_menu', 'remove_sub_menu_items' );
function remove_sub_menu_items() {
  // Первый параметр это ярлык основного элемента меню
  // Второй параметр это ярлык дочернего элемента данного пункта
  // remove_submenu_page( 'options-general.php', 'options-discussion.php' );
  // remove_submenu_page( 'options-general.php', 'options-writing.php' );
}

add_action( 'wp_before_admin_bar_render', 'my_admin_bar_render' );
// Полный список этих меню можно найти в файле "wp-includes/admin-bar.php"
function my_admin_bar_render() {
  global $wp_admin_bar;
  // $wp_admin_bar->remove_menu('post');
  // $wp_admin_bar->remove_menu('my-account'); // ссылка на меню профиля (при отключенных граватарах)
  // $wp_admin_bar->remove_menu('my-account-with-avatar'); // ссылка на меню профиля (граватары включены)
  // $wp_admin_bar->remove_menu('my-blogs'); // ссылка на меню "мои сайты"
  // $wp_admin_bar->remove_menu('get-shortlink'); // меню "короткая ссылка" для текущей записи
  // $wp_admin_bar->remove_menu('edit'); // меню "редактировать запись"
  // $wp_admin_bar->remove_menu('new-content'); // все меню "новый материал"
  // $wp_admin_bar->remove_menu('new-post'); // меню "новый материал - запись"
  // $wp_admin_bar->remove_menu('new-page'); // меню "новый материал - страница"
  $wp_admin_bar->remove_menu('comments'); // меню "комментарии"
  // $wp_admin_bar->remove_menu('appearance'); // меню "внешний вид"
  // $wp_admin_bar->remove_menu('updates'); // меню "обновления"
}

/* Удаление виджетов из Консоли WordPress */
function clear_dash(){
  global $wp_meta_boxes;
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['bbp-dashboard-right-now']);
}
remove_action( 'welcome_panel', 'wp_welcome_panel' );
add_action('wp_dashboard_setup', 'clear_dash' );
//а свои виджеты пишем в кастомизаторе
//удаляем ненужные пункты меню и виджеты - end

//логотип в админке и при старте, наш копирайт - start
//тут быстрее, чем в стилях
function my_admin_logo() {
   echo '
    <style type="text/css">
    	.wp-admin #wpadminbar #wp-admin-bar-site-name>.ab-item:before { 
        content: "";
        background: black url('. get_bloginfo("template_directory") .'/img/logo_small.png) no-repeat 0px 1px !important;
        width: 30px;
        height: 30px;
        position: relative;
        padding: 0;
        margin: -2px 10px 0px 0px;
		  }
      #wpadminbar {
        border-bottom: 2px solid #41ee41;
        background-color: black;
        color: white;
      }
      #wpadminbar #wp-admin-bar-site-name>a.ab-item {
        /* height: 38px; */
        color: white;
      }

    	/* wide WP logo */
    	#wpadminbar #wp-admin-bar-wp-logo>.ab-item {
    		display: none;
			}

      #adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap {
        background: #777;
      }
      #wpadminbar .ab-empty-item, #wpadminbar a.ab-item, #wpadminbar>#wp-toolbar span.ab-label, #wpadminbar>#wp-toolbar span.noticon {
        color: #333;
        font-weight: bold;
      }
      #footer-thankyou {
        font-style: normal;
      }
      #wpfooter {
        background-color: #777;
        color: #333;
        border-top: 2px solid #41ee41;
      }
      #wpfooter a:hover {
        text-decoration: underline;
        color: #41ee41;
        /* text-decoration: none; */
        transition: 0.5s;
      }
      #wpfooter a {
        color: #333333;
        text-decoration: underline;
      }
    </style>

    <script>
      window.onload = function() {
        document.getElementById("footer-thankyou").innerHTML = "Разработка сайта: <a target=\"_blank\" href=\"https://fedirko.pro\">FEDIRKO.PRO</a>";        
      }
    </script>';
}
add_action('admin_head', 'my_admin_logo');

function my_login_logo(){
   echo '
   <style type="text/css">
        .login h1 a { 
   				background: url('. get_bloginfo('template_directory') .'/img/logo.png) no-repeat 0 0 !important;
   				width: 158px;
    			height: 55px;
   			}
    </style>';
}
add_action('login_head', 'my_login_logo');

/* Ставим ссылку с логотипа на сайт, а не на wordpress.org */
add_filter( 'login_headerurl', create_function('', 'return get_home_url();') );
 
/* убираем title в логотипе "сайт работает на wordpress" */
add_filter( 'login_headertitle', create_function('', 'return false;') );   
//логотип в админке - end

//русификация дат - start ------------------------------------------------------------------------
function true_russian_date_forms($the_date = '') {
  if ( substr_count($the_date , '---') > 0 ) {
    return str_replace('---', '', $the_date);
  }
  // массив замен для русской локализации движка и для английской
  $replacements = array(
    "Январь" => "января", // "Jan" => "января"
    "Февраль" => "февраля", // "Feb" => "февраля"
    "Март" => "марта", // "Mar" => "марта"
    "Апрель" => "апреля", // "Apr" => "апреля"
    "Май" => "мая", // "May" => "мая"
    "Июнь" => "июня", // "Jun" => "июня"
    "Июль" => "июля", // "Jul" => "июля"
    "Август" => "августа", // "Aug" => "августа"
    "Сентябрь" => "сентября", // "Sep" => "сентября"
    "Октябрь" => "октября", // "Oct" => "октября"
    "Ноябрь" => "ноября", // "Nov" => "ноября"
    "Декабрь" => "декабря" // "Dec" => "декабря"
  );
  return strtr($the_date, $replacements);
}
 
// если хотите, вы можете применить только некоторые из фильтров
add_filter('the_time', 'true_russian_date_forms');
add_filter('get_the_time', 'true_russian_date_forms');
add_filter('the_date', 'true_russian_date_forms');
add_filter('get_the_date', 'true_russian_date_forms');
add_filter('the_modified_time', 'true_russian_date_forms');
add_filter('get_the_modified_date', 'true_russian_date_forms');
add_filter('get_post_time', 'true_russian_date_forms');
add_filter('get_comment_date', 'true_russian_date_forms');
//русификация дат - end ------------------------------------------------------------------------

// наши виджеты в админке start --------------------------------------
function dashboard_widget_1(){
  // Показать то, что вы хотите показать
  echo "в этом месте могла бы быть ваша реклама :)";
}

// Создаем функцию, используя хук действия
function add_dashboard_widgets() {
  wp_add_dashboard_widget('dashboard_widget_id_1', 'Пример виджета админки1', 'dashboard_widget_1');
}
// Хук в 'wp_dashboard_setup', чтобы зарегистрировать наши функции среди других
add_action('wp_dashboard_setup', 'add_dashboard_widgets' );
// наши виджеты в админке end --------------------------------------

// вставляем CSS и JS для админки start ------------------
function admin_css_js() {
  wp_enqueue_style('bootstrap', get_template_directory_uri() .'/css/bootstrap.min.css');
  wp_enqueue_style('admin_style', get_template_directory_uri() .'/css/admin_styles.css', array('bootstrap'));
  wp_enqueue_style('fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css');
  
  wp_enqueue_script('bootstrap_js', get_template_directory_uri ().'/js/bootstrap.min.js', array('jquery'), true);
  wp_enqueue_script('admin_js', get_template_directory_uri ().'/js/admin_scripts.js', array('bootstrap_js'), true );
}
add_action( 'admin_enqueue_scripts', 'admin_css_js' );
// вставляем CSS и JS для админки end ------------------
?>