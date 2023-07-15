<?php

function bgvst_assets() {

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );

    wp_enqueue_style( 'slickCSS', get_template_directory_uri() . '/assets/slick/slick.css' );

    wp_enqueue_style( 'slicktheme', get_template_directory_uri() . '/assets/slick/slick-theme.css' );


    if ( is_front_page() ) {
        wp_enqueue_style( 'maincss', get_template_directory_uri() . '/assets/css/style.css' );
      } 
    elseif ( is_page( 'menu' ) ) {
        wp_enqueue_style( 'shopcss', get_template_directory_uri() . '/assets/css/shop.css' );
      }
    elseif ( is_page( 'sweet' ) ) {
        wp_enqueue_style( 'shopcss', get_template_directory_uri() . '/assets/css/shop.css' );
      }
    elseif ( is_page( 'satisfying' ) ) {
        wp_enqueue_style( 'shopcss', get_template_directory_uri() . '/assets/css/shop.css' );
      }
    elseif ( is_page( 'cart' ) ) {
        wp_enqueue_style( 'cartcss', get_template_directory_uri() . '/assets/css/cart.css' );
    }
    elseif ( is_page( 'thank' ) ) {
        wp_enqueue_style( 'maincss', get_template_directory_uri() . '/assets/css/style.css' );
    }

	wp_enqueue_script( 'jqueryHeader', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js');
    
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array(), null, true);

    wp_enqueue_script( 'parallax', get_template_directory_uri() . '/assets/js/parallax.min.js', array(), null, false );

    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Lobster&family=Lora:ital@0;1&display=swap' );

    wp_enqueue_script( 'slickJS', get_template_directory_uri() . '/assets/slick/slick.js', array(), null, true );

    wp_enqueue_script( 'maska', get_template_directory_uri() . '/assets/js/maska.js', array(), null, true );
}

add_action( 'wp_enqueue_scripts', 'bgvst_assets' );

show_admin_bar(false);

add_theme_support( 'post-thumbnails' );

add_theme_support('post-thumbnails', array ('product'));


// подключаем скрипты и стили для AJAX
function my_theme_scripts() {
  wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );

// активация AJAX в Woocommerce
add_action( 'wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart' );
add_action( 'wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart' );

function woocommerce_ajax_add_to_cart() {
  global $woocommerce;
  
  $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
  
  $woocommerce->cart->add_to_cart($product_id);
  
  ob_start();
  $woocommerce->cart->calculate_totals();
  $fragments = WC_AJAX::get_refreshed_fragments();
  ob_get_clean();
  
  echo json_encode(array(
    'fragments' => $fragments,
    'cart_hash' => $woocommerce->cart->get_cart_hash(),
  ));
  
  die();
}


//Кастомные стили woocommerce
function woo_style() {
wp_register_style( 'mihalica-woocommerce', get_template_directory_uri() . '/woocommerce.css', null, 1.0, 'screen' );
wp_enqueue_style( 'mihalica-woocommerce' ); } add_action( 'wp_enqueue_scripts', 'woo_style' );


//Удаление ссылок
add_filter( 'woocommerce_product_is_visible','product_invisible');
function product_invisible(){
    return false;
}

//Удаление индивидуальных страниц товаров
add_filter( 'woocommerce_register_post_type_product','hide_product_page',12,1);
function hide_product_page($args){
    $args["publicly_queryable"]=false;
    $args["public"]=false;
    return $args;
}

//Поддержка логотипов
function custom_theme_logo() {
    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'custom_theme_logo');

//Обновление счетчика товаров в корзине
function get_cart_count() {
  echo WC()->cart->get_cart_contents_count();
  wp_die();
}
add_action('wp_ajax_get_cart_count', 'get_cart_count');
add_action('wp_ajax_nopriv_get_cart_count', 'get_cart_count');

// Обработчик запроса формы заказа
function handle_form_submission() {
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $wishes = sanitize_text_field($_POST['wishes']);

    $to = 'example@gmail.com';
    $subject = 'Новая заявка с сайта';
    $message = "Имя: $name\n"
             . "Email: $email\n"
             . "Номер телефона: $phone\n"
             . "Особые пожелания: $wishes\n";
    $headers = array('Content-Type: text/html; charset=UTF-8');

    wp_mail($to, $subject, $message, $headers);
    
    wp_redirect(home_url('/thank'));
    
    exit;
}
add_action('admin_post_nopriv_submit_form', 'handle_form_submission');
add_action('admin_post_submit_form', 'handle_form_submission');

// Обработчик запроса маленькой формы в футере
function handle_newsletter_subscription() {
    $email = sanitize_email($_POST['email']);

    $to = 'example@gmail.com';
    $subject = 'Новая подписка на рассылку';
    $message = "Email: $email";
    $headers = array('Content-Type: text/html; charset=UTF-8');

    wp_mail($to, $subject, $message, $headers);

    wp_redirect(home_url('/thank'));

    exit;
}
add_action('admin_post_nopriv_subscribe_newsletter', 'handle_newsletter_subscription');
add_action('admin_post_subscribe_newsletter', 'handle_newsletter_subscription');