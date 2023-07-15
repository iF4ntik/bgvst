<?php get_header(); ?>

<?php
/*
 * Template name: Satisfying
 */
?>



            <div class="row">
            <div class="col-xl-2 offset-xl-0 col-lg-2 offset-lg-0 col-md-2 offset-md-0 col-sm-12 offset-sm-0">
            	<div class="categories">
            		<div class="categoriesHeader">
            			<h1>Категории</h1>
            		</div>
                        <div class="category">
                              <a href="/sweet/"><?php $category_id = 16;
                              $category = get_term( $category_id, 'product_cat' );
                              if ( ! empty( $category ) ) {
                              $category_name = $category->name;
                              $category_count = $category->count;
                              echo $category_name . ' (' . $category_count . ')';
                              } else {
                              echo 'Категория не найдена';
                              }?>
                              </a>
                        </div>
                        <div class="category">
                              <a href="/satisfying/"><?php $category_id = 17;
                              $category = get_term( $category_id, 'product_cat' );
                              if ( ! empty( $category ) ) {
                              $category_name = $category->name;
                              $category_count = $category->count;
                              echo $category_name . ' (' . $category_count . ')';
                              } else {
                              echo 'Категория не найдена';
                              }?></a>
                        </div>
            		<div class="categoriesLine"></div>
            	</div>
            </div>
            <div class="col-xl-10 offset-xl-0 col-lg-10 col-md-10 offset-md-0 col-sm-12">
            	<div class="catalog">
            		<div class="row">

            			<?php

            			$my_posts = get_posts( array(
            				'numberposts' => -1,
            				'tax_query' => array(
                                        array(
                                            'taxonomy' => 'product_cat',
                                            'field' => 'term_id',
                                            'terms' => 17,
                                        ),
                                    ),
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
            			
            			<div class="col-xl-3 offset-xl-0 col-lg-4 offset-lg-0 col-md-6 offset-md-0 col-sm-12">
            				<div class="product" data-id="01">
            					<div class="productImg">
            						<img class="productImage" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="lemon">
            						<button onclick="addToCartBtn(this)" data-product-id="<?php echo get_the_ID(); ?>" class="add-to-cart-button addToCartButton">Добавить в корзину</button>
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
            </div>
            </div>
        </div>
    </main>

<?php get_footer(); ?>