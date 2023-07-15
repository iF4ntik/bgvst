<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>baguettvest</title>
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png" sizes="32x32">
	<?php wp_head(); ?>
	<?php
	$custom_logo_id = get_theme_mod('custom_logo');
	$image = wp_get_attachment_image_src($custom_logo_id, 'full');
	?>
</head>
<body class="bodySett">
	<main>
		<div class="container">
            <div class="header">
			    <div class="menuLeft">
				  <ul>
					<a href="/">Главная</a>
					<a href="#">О нас</a>
					<a href="/menu/">Меню</a>
				  </ul>
			    </div>
			    <button class="burgerBtn" id="burger">
			    	<span></span>
			    	<span></span>
			    	<span></span>
			    </button>
			    <div class="logo">
			    	<img src="<?php echo esc_url($image[0]); ?>" alt="<?php bloginfo('name'); ?>">
			    </div>
			    <div class="menuRight">
			    	<ul>
			    		<a href="#">Оплата и доставка</a>
			    		<a href="#">Контакты</a>
			    	</ul>
			    </div>
			    <div class="icons">
			    	<object type="image/svg+xml" data="<?php echo get_template_directory_uri() . '/assets/img/home/search.svg'; ?>">
			    		<img src="<?php echo get_template_directory_uri() . '/assets/img/home/search.png'; ?>">
			    	</object>
			    	<a href="/cart/">
			    	<object type="image/svg+xml" data="<?php echo get_template_directory_uri() . '/assets/img/home/cart.svg'; ?>">
			    		<img src="<?php echo get_template_directory_uri() . '/assets/img/home/cart.png'; ?>">
			    	</object>
			    	</a>
			    	<div class="cartCounter">
			    		<p id="cart-count"></p>
			    	</div>
			    </div>
            </div>