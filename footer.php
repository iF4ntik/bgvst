	<?php wp_head(); ?>
	<?php
	$custom_logo_id = get_theme_mod('custom_logo');
	$image = wp_get_attachment_image_src($custom_logo_id, 'full');
	?>
	<section class="footer">
		<div class="container">
			<div class="row">
				<div class="col-xl-2 offset-xl-1 col-lg-12 offset-lg-0">
					<div class="footerLogo">
						<img src="<?php echo esc_url($image[0]); ?>" alt="<?php bloginfo('name'); ?>">
					</div>
				</div>
				<div class="col-xl-4 offset-xl-1 col-lg-6 offset-lg-0">
					<div class="footerForm">
						<form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST">
						    <input type="hidden" name="action" value="subscribe_newsletter">
						    <label class="labelFooter" for="email">Получать новости первым</label>
						    <input class="inputFooter" type="email" name="email" placeholder="Ваш email адрес" required>
						    <button class="buttonFooter" type="submit">Подписаться</button>
						</form>
						<p>Мы не будем слать надоедливую рекламу*</p>
					</div>
				</div>
				<div class="col-xl-2 offset-xl-1 col-lg-6 offset-lg-0">
					<div class="footerHours">
						<h1>Часы работы</h1>
						<p>Понедельник - Пятница:</p>
						<p>08:00 - 22:00</p>
						<p>Суббота - Воскресенье:</p>
						<p>9:00 - 22:30</p>
					</div>
				</div>
			</div>
		</div>
	</section>	
	

	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<!-- <script type="text/javascript" src="src/slick/slick.js"></script> -->

	<?php wp_footer(); ?>
	
	<script type="text/javascript">
	  $(document).ready(function(){
	    $('.itemSlider').slick({
	      prevArrow: '<button type="button" class="ItemSliderBtn prevBtn"><img class="imgPrevBtn" src="<?php echo get_template_directory_uri() . '/assets/img/home/prevBtn.svg'; ?>"></button>',
	      nextArrow: '<button type="button" class="ItemSliderBtn nextBtn"><img class="imgNextBtn" src="<?php echo get_template_directory_uri() . '/assets/img/home/nextBtn.svg'; ?>"></button>',
	      fade: true,
	      autoplay: true,
	      autoplaySpeed: 5000,
	    });
	  });
	</script>

	<script type="text/javascript">
	  $(document).ready(function(){
	    $('.reviewSlider').slick({
	      fade: true,
	      arrows: false,
	      //autoplay: true,
	      autoplaySpeed: 5000,
	      dots: true,
	    });
	  });
	</script>

	<!--  Маска номера -->
	<!-- <script src="src/js/maska.js" type="text/javascript"></script> -->
	<script>
	$('.maska').mask('+7 (999) 999-99-99');

	$.fn.setCursorPosition = function(pos) {
	  if ($(this).get(0).setSelectionRange) {
	    $(this).get(0).setSelectionRange(pos, pos);
	  } else if ($(this).get(0).createTextRange) {
	    var range = $(this).get(0).createTextRange();
	    range.collapse(true);
	    range.moveEnd('character', pos);
	    range.moveStart('character', pos);
	    range.select();
	  }
	};


	$('input[type="tel"]').click(function(){
	    $(this).setCursorPosition(4);  // set position number
	  });
	</script>

	<script>
		jQuery(document).ready(function($) {
		  $('.add-to-cart-button').click(function(e) {
		    e.preventDefault();
		    
		    var product_id = $(this).attr('data-product-id');

		    $.ajax({
		      type: 'POST',
		      url: wc_add_to_cart_params.ajax_url,
		      data: {
		        'action': 'woocommerce_ajax_add_to_cart',
		        'product_id': product_id,
		      },
		      success: function(response) {
		        $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $(this)]);
		      }
		    });
		  });
		});
	</script>

	<script>
	  function updateCartCount() {
	    $.ajax({
	      url: '<?php echo admin_url("admin-ajax.php"); ?>',
	      type: 'POST',
	      data: {
	        action: 'get_cart_count'
	      },
	      success: function(response) {
	        $('#cart-count').text(response);
	      }
	    });
	  }
	  $(document).ready(function() {
	    updateCartCount();
	  });
	  $(document.body).on('added_to_cart', function() {
	    updateCartCount();
	  });
	</script>

</body>
</html>