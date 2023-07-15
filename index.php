<?php 
	get_header();
?>
            <div class="row">
            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            		<div class="itemSlider">


            						<?php

            						$my_posts = get_posts( array(
            							'numberposts' => -1,
            							'category'    => 0,
            							'orderby'     => 'date',
            							'order'       => 'DESC',
            							'include'     => array(),
            							'exclude'     => array(),
            							'meta_key'    => '',
            							'meta_value'  =>'',
            							'post_type'   => 'product',
            							'suppress_filters' => true,
            						) );

            						global $post;

            						foreach( $my_posts as $post ){
            							setup_postdata( $post );

            						?>
            						
            						<div class="item">
            							<div class="itemImg">
            							<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="donuts">
            							</div>
            							<div class="itemBtn">
            							<button onclick="addToCartBtn(this)" data-product-id="<?php echo get_the_ID(); ?>" class="add-to-cart-button">Добавить в корзину</button>
            							</div>
            						</div>

            						<?php

            							
            						}

            						wp_reset_postdata(); // сброс
            						?>
            		</div>
            	</div>
            </div>
		</div>
	</main>
	<section class="showcase parallax-window" data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri() . '/assets/img/showcase/bg.jpg'; ?>">
		<div class="container">
			<div class="row">
				<div class="showcaseHeader">
					<h1>Добавь сладости в сегодняшний день</h1>
				</div>
				<div class="ear">
					<img src="<?php echo get_template_directory_uri() . '/assets/img/showcase/ear.svg'; ?>" alt="ear">
				</div>

							<?php

							$my_posts = get_posts( array(
								'numberposts' => 6,
								'category'    => 0,
								'orderby'     => 'date',
								'order'       => 'DESC',
								'include'     => array(),
								'exclude'     => array(),
								'meta_key'    => '',
								'meta_value'  =>'',
								'post_type'   => 'product',
								'suppress_filters' => true,
							) );

							global $post;

							foreach( $my_posts as $post ){
								setup_postdata( $post );

							?>
							
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
								<div class="product" data-id="01">
									<div class="productImg">
										<img class="productImage" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="lemon">
										<button onclick="addToCartBtn(this)" data-product-id="<?php echo get_the_ID(); ?>" class="add-to-cart-button">Добавить в корзину</button>
									</div>
									<div class="decription">
										<h2 class="itemTitle"><?php the_title(); ?></h2>
										<p><?php
    									global $product;

    									$categories = $product->get_category_ids();

    									foreach ($categories as $category_id) {
        								$category = get_term($category_id, 'product_cat');
        								echo '<a href="' . get_category_link($category_id) . '">' . $category->name . '</a>';
    									}
										?></p>
				                                    <style> a {text-decoration: none; color: #767676;}
				                                            a:hover {color: #767676;}
				                                    </style>
										<div class="price">
											<h2 class="itemPrice"><?php echo $product->get_regular_price(); ?>₽</h2>
										</div>
									</div>
								</div>
							</div>

							<?php

								
							}

							wp_reset_postdata(); 
							?>
			</div>
		</div>
	</section>
	<section class="feedback parallax-window" data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri() . '/assets/img/feedback/bg.png'; ?>">
		<div class="container">
			<div class="row">
				<div class="col-xl-8 offset-xl-2">
					<div class="reviewSlider">


					<?php
					$my_posts = get_posts( array(
						'numberposts' => -1,
						'category'    => 0,
						'orderby'     => 'date',
						'order'       => 'DESC',
						'include'     => array(),
						'exclude'     => array(),
						'meta_key'    => '',
						'meta_value'  =>'',
						'post_type'   => 'review',
						'suppress_filters' => true,
					) );

					global $post;

					foreach( $my_posts as $post ){
						setup_postdata( $post );

					?>

					<div class="review">
						<div class="profilePic">
							<?php
							$pods = pods('review', get_the_ID());
							$image = $pods->field('_avatar');

							if ($image) {
    						$image_url = wp_get_attachment_image_url($image['ID'], 'full');
    						echo '<img src="' . esc_url($image_url) . '" alt="Image">';
								}
							?>
						</div>
						<div class="reviewText">
							<p><?php echo get_post_meta(get_the_ID(), '_reviewtext', true); ?></p>
						</div>
						<div class="reviewLine"></div>
						<div class="reviewName">
							<h1><?php echo get_post_meta(get_the_ID(), '_reviewname', true); ?></h1>
							<p>- <?php echo get_post_meta(get_the_ID(), '_jobtitle', true); ?></p>
						</div>
					</div>

					<?php
						
					}

					wp_reset_postdata();
					?>

					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="blog">
		<div class="container">
			<div class="row">
				<div class="blogHeader">
					<h1>Наша история</h1>
				</div>
				<div class="ear earBlog">
					<img src="<?php echo get_template_directory_uri() . '/assets/img/showcase/ear.svg'; ?>" alt="ear">
				</div>
				<div class="col-xl-4 offset-xl-0 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
					<div class="post">
						<div class="postImg">
							<img src="<?php echo get_template_directory_uri() . '/assets/img/blog/1.png'; ?>" alt="cake">
						</div>
						<div class="postDate">
							<p>Авг. 20, 2022</p>
						</div>
						<div class="postHeader">
							<a href="#">Создайте собственный торт</a>
						</div>
                        <div class="postTag">
                        	<p>Статья</p>
                        </div>
                        <div class="postDescription">
                        	<p>У каждого бывают моменты, когда хочется сделать особенный подарок себе или близкому человеку. Мы можем предоставить такую возможность, вам всего лишь...</p>
                        </div>
                        <div class="postReadMore">
                        	<a href="#">Читать далее</a>
                        </div>
					</div>
				</div>
    				<div class="col-xl-4 offset-xl-0 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
    					<div class="post">
    						<div class="postImg">
    							<img src="<?php echo get_template_directory_uri() . '/assets/img/blog/2.png'; ?>" alt="cake">
    						</div>
    						<div class="postDate">
    							<p>Июль 25, 2022</p>
    						</div>
    						<div class="postHeader">
    							<a href="#">Тыквенные кексы</a>
    						</div>
                            <div class="postTag">
                            	<p>Статья</p>
                            </div>
                            <div class="postDescription">
                            	<p>Наша жизнь построена на отрытиях чего-то нового и необычного. Представляем вам жемчужину нашего заведения - неповторимые...</p>
                            </div>
                            <div class="postReadMore">
                            	<a href="#">Читать далее</a>
                            </div>
    					</div>
    				</div>
    				<div class="col-xl-4 offset-xl-0 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
    					<div class="post">
    						<div class="postImg">
    							<img src="<?php echo get_template_directory_uri() . '/assets/img/blog/3.png'; ?>" alt="cake">
    						</div>
    						<div class="postDate">
    							<p>Июль 05, 2022</p>
    						</div>
    						<div class="postHeader">
    							<a href="#">Проследите за процессом</a>
    						</div>
                            <div class="postTag">
                            	<p>Статья</p>
                            </div>
                            <div class="postDescription">
                            	<p>Наши продукты - это не просто способ утолить голод, а настоящий труд десятков пекарей, технологов и дегустаторов. Приглашаем вас познакомиться...</p>
                            </div>
                            <div class="postReadMore">
                            	<a href="#">Читать далее</a>
                            </div>
    					</div>
    				</div>
			</div>
		</div>
	</section>
	<section class="order parallax-window" data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri() . '/assets/img/order/bg.png'; ?>">
		<div class="container">
			<div class="row">
				<div class="col-xl-8 offset-xl-2 col-md-12">
					<div class="orderBox">
						<div class="row">
						<div class="col-xl-6 offset-xl-0 col-lg-6 offset-lg-0">
							<div class="orderAdress">
								<h1>м. Беговая</h1>
								<h2>Савушкина, 126</h2>
								<a href="#">info@baguettevest.ru</a>
								<a href="#">+7 911 263-43-26</a>
							</div>
							<div class="orderAdress">
								<h1>м. Крестовский остров</h1>
								<h2>Кемская, 1</h2>
								<a href="#">info@baguettevest.ru</a>
								<a href="#">+7 911 127-95-78</a>
							</div>
							<div class="orderAdress">
								<h1>м. Сенная площадь</h1>
								<h2>Типанова, 21</h2>
								<a href="#">info@baguettevest.ru</a>
								<a href="#">+7 911 243-65-97</a>
							</div>
							</div>
							<div class="col-xl-6 offset-xl-0 col-lg-6 offset-lg-0">
								<div class="orderForm">
									<div class="orderFormHeader">
										<h1>Закажите прямо сейчас</h1>
									</div>
									<div class="orderFormUnderHeader">
									    <p>Оставьте заявку, и наш менеджер перезвонит вам в течение пяти минут с уточнением деталей заказа</p>
									</div>
									<form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST">
									    <input type="hidden" name="action" value="submit_form">
									    <label class="labelForm" for="name">Имя*</label>
									    <input class="inputForm nameInput" type="text" name="name" required>
									    <label class="labelForm" for="email">Email*</label>
									    <input class="inputForm mailInput" type="email" name="email" required>
									    <label class="labelForm" for="phone">Номер телефона*</label>
									    <input class="inputForm phoneInput maska" type="tel" name="phone" required>
									    <label class="labelForm" for="wishes">Особые пожелания</label>
									    <input class="inputForm wishInput" type="text" name="wishes">
									    <button class="buttonForm" type="submit">Отправить</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php 
	get_footer();
?>