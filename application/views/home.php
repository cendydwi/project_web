	<!-- Banner -->

	<div class="banner">
		<div class="banner_background" style="background-image:url(<?= base_url()?>/theme/images/banner_background.jpg)"></div>
		<div class="container fill_height">
			<div class="row fill_height">
				<div class="banner_product_image"><img src="<?= base_url()?>/theme/images/banner_product.png" alt=""></div>
				<div class="col-lg-5 offset-lg-4 fill_height">
					<div class="banner_content">
						<h1 class="banner_text">new era of smartphones</h1>
						<div class="banner_price"><span>Rp. 5.000.000</span><br>Rp. 2.500.000</div>
						<div class="banner_product_name">Apple Iphone 6s</div>
						<div class="button banner_button"><a href="#">Shop Now</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Characteristics -->

	<div class="characteristics">
		<div class="container">
			<div class="row">

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">

					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="<?= base_url()?>/theme/images/char_1.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from Rp. 50.000</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">

					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="<?= base_url()?>/theme/images/char_2.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from Rp. 50.000</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">

					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="<?= base_url()?>/theme/images/char_3.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from Rp. 50.000</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">

					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="<?= base_url()?>/theme/images/char_4.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Deals of the week -->

	<div class="deals_featured">
		<div class="container">
			<div class="row">
				<div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

					<!-- Deals -->

					<div class="deals">
						<div class="deals_title">Deals of the Week</div>
						<div class="deals_slider_container">

							<!-- Deals Slider -->
							<div class="owl-carousel owl-theme deals_slider">

								<!-- Deals Item -->
								<?php foreach ($dotw->result_array() as $dotw):
									$dotw_id=$dotw['dotw_id'];
									$dotw_prod_name=$dotw['product_name'];
									$dotw_prod_cat=$dotw['category_name'];
									$dotw_prod_price=$dotw['product_price'];
									$dotw_prod_img=$dotw['product_image_1'];
									$dotw_price=$dotw['dotw_price'];
									$dotw_expired=$dotw['dotw_expired'];
									?>

									<div class="owl-item deals_item">
										<div class="deals_image"><img src="<?= base_url()?>/theme/images/prod_img/<?=$dotw_prod_img?>" alt=""></div>
										<div class="deals_content">
											<div class="deals_info_line d-flex flex-row justify-content-start">
												<div class="deals_item_category"><a href="#"><?=$dotw_prod_cat?></a></div>
												<div class="deals_item_price_a ml-auto">Rp. <?=number_format($dotw_prod_price, 0, ",", ".");?></div>
											</div>
											<div class="deals_info_line d-flex flex-row justify-content-start">
												<div class="deals_item_name"><a href="<?=base_url()?>dotw/details/<?=$dotw_id?>"><?=$dotw_prod_name?></a></div>
												<div class="deals_item_price ml-auto">Rp. <?=number_format($dotw_price, 0, ",", ".");?></div>
											</div>
											<div class="available">
												<div class="available_line d-flex flex-row justify-content-start">
													<div class="available_title">Available: <span>6</span></div>
													<div class="sold_title ml-auto">Already sold: <span>28</span></div>
												</div>
												<div class="available_bar"><span style="width:17%"></span></div>
											</div>
											<div class="deals_timer d-flex flex-row align-items-center justify-content-start">
												<div class="deals_timer_title_container">
													<div class="deals_timer_title">Hurry Up</div>
													<div class="deals_timer_subtitle">Offer ends in:</div>
												</div>
												<div class="deals_timer_content ml-auto">
													<div class="deals_timer_box clearfix" data-target-time="<?=date_format(date_create($dotw_expired),"m d, Y");?>">
														<div class="deals_timer_unit">
															<div id="deals_timer1_hr" class="deals_timer_hr"></div>
															<span>hours</span>
														</div>
														<div class="deals_timer_unit">
															<div id="deals_timer1_min" class="deals_timer_min"></div>
															<span>mins</span>
														</div>
														<div class="deals_timer_unit">
															<div id="deals_timer1_sec" class="deals_timer_sec"></div>
															<span>secs</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach; ?>

							</div>

						</div>

						<div class="deals_slider_nav_container">
							<div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
							<div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
						</div>
					</div>

					<!-- Featured -->
					<div class="featured">
						<div class="tabbed_container">
							<div class="tabs">
								<ul class="clearfix">
									<li class="active">Featured</li>
								</ul>
								<div class="tabs_line"><span></span></div>
							</div>

							<!-- Product Panel -->
							<div class="product_panel panel active">
								<div class="featured_slider slider">

									<!-- Slider Item -->
									<?php foreach ($product_featured->result_array() as $prod):
										$prod_id=$prod['product_id'];
										$prod_name=$prod['product_name'];
										$prod_price=$prod['product_price'];
										$prod_create=$prod['product_created_at'];
										$prod_img=$prod['product_image_1'];
										?>
										<div class="featured_slider_item">
											<div class="border_active"></div>
											<div class="product_item discount is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="<?= base_url()?>/theme/images/prod_img/<?=$prod_img?>" alt="" width=150 heigth=150></div>
												<div class="product_content">
													<div class="product_price">Rp. <?=number_format($prod_price, 0, ",", ".");?></div>
													<div class="product_name"><div><a href="<?=base_url().'product/details/'.$prod_id?>"><?=$prod_name?></a></div></div>
													<div class="product_extras">
														<form class="" action="<?=base_url().'product/details/'.$prod_id?>" method="post">
															<button class="product_cart_button active">Add to Cart</button>
														</form>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<?php if (date("Y-m-d") == date_format(date_create($prod_create),"Y-m-d")){ ?>
														<li class="product_mark product_new">new</li>
													<?php } ?>
												</ul>
											</div>
										</div>

									<?php endforeach; ?>

								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Popular Categories -->

	<div class="popular_categories">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="popular_categories_content">
						<div class="popular_categories_title">Popular Categories</div>
						<div class="popular_categories_slider_nav">
							<div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
							<div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
						</div>
						<div class="popular_categories_link"><a href="#">full catalog</a></div>
					</div>
				</div>

				<!-- Popular Categories Slider -->

				<div class="col-lg-9">
					<div class="popular_categories_slider_container">
						<div class="owl-carousel owl-theme popular_categories_slider">

							<!-- Popular Categories Item -->
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="<?= base_url()?>/theme/images/popular_1.png" alt=""></div>
									<div class="popular_category_text">Smartphones & Tablets</div>
								</div>
							</div>

							<!-- Popular Categories Item -->
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="<?= base_url()?>/theme/images/popular_2.png" alt=""></div>
									<div class="popular_category_text">Computers & Laptops</div>
								</div>
							</div>

							<!-- Popular Categories Item -->
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="<?= base_url()?>/theme/images/popular_3.png" alt=""></div>
									<div class="popular_category_text">Gadgets</div>
								</div>
							</div>

							<!-- Popular Categories Item -->
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="<?= base_url()?>/theme/images/popular_4.png" alt=""></div>
									<div class="popular_category_text">Video Games & Consoles</div>
								</div>
							</div>

							<!-- Popular Categories Item -->
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="<?= base_url()?>/theme/images/popular_5.png" alt=""></div>
									<div class="popular_category_text">Accessories</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Banner -->

	<div class="banner_2">
		<div class="banner_2_background" style="background-image:url(<?= base_url()?>/theme/images/banner_2_background.jpg)"></div>
		<div class="banner_2_container">
			<div class="banner_2_dots"></div>
			<!-- Banner 2 Slider -->

			<div class="owl-carousel owl-theme banner_2_slider">

				<!-- Banner 2 Slider Item -->
				<div class="owl-item">
					<div class="banner_2_item">
						<div class="container fill_height">
							<div class="row fill_height">
								<div class="col-lg-4 col-md-6 fill_height">
									<div class="banner_2_content">
										<div class="banner_2_category">Laptops</div>
										<div class="banner_2_title">MacBook Air 13</div>
										<div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</div>
										<div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="button banner_2_button"><a href="#">Explore</a></div>
									</div>

								</div>
								<div class="col-lg-8 col-md-6 fill_height">
									<div class="banner_2_image_container">
										<div class="banner_2_image"><img src="<?= base_url()?>/theme/images/banner_2_product.png" alt=""></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Banner 2 Slider Item -->
				<div class="owl-item">
					<div class="banner_2_item">
						<div class="container fill_height">
							<div class="row fill_height">
								<div class="col-lg-4 col-md-6 fill_height">
									<div class="banner_2_content">
										<div class="banner_2_category">Laptops</div>
										<div class="banner_2_title">MacBook Air 13</div>
										<div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</div>
										<div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="button banner_2_button"><a href="#">Explore</a></div>
									</div>

								</div>
								<div class="col-lg-8 col-md-6 fill_height">
									<div class="banner_2_image_container">
										<div class="banner_2_image"><img src="<?= base_url()?>/theme/images/banner_2_product.png" alt=""></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Banner 2 Slider Item -->
				<div class="owl-item">
					<div class="banner_2_item">
						<div class="container fill_height">
							<div class="row fill_height">
								<div class="col-lg-4 col-md-6 fill_height">
									<div class="banner_2_content">
										<div class="banner_2_category">Laptops</div>
										<div class="banner_2_title">MacBook Air 13</div>
										<div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</div>
										<div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="button banner_2_button"><a href="#">Explore</a></div>
									</div>

								</div>
								<div class="col-lg-8 col-md-6 fill_height">
									<div class="banner_2_image_container">
										<div class="banner_2_image"><img src="<?= base_url()?>/theme/images/banner_2_product.png" alt=""></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

  <!-- Hot New Arrivals -->

  <div class="new_arrivals">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="tabbed_container">
            <div class="tabs clearfix tabs-right">
              <div class="new_arrivals_title">Hot New Arrivals</div>
              <ul class="clearfix">
                <li class="active">Featured</li>
              </ul>
              <div class="tabs_line"><span></span></div>
            </div>
            <div class="row">
              <div class="col-lg-9" style="z-index:1;">

                <!-- Product Panel -->
                <div class="product_panel panel active">
                  <div class="arrivals_slider slider">

										<?php foreach ($hot_new_arrivals->result_array() as $hna):
											$prod_id=$hna['product_id'];
											$prod_name=$hna['product_name'];
											$prod_price=$hna['product_price'];
											$prod_img_1=$hna['product_image_1'];
											?>

											<!-- Slider Item -->
											<div class="arrivals_slider_item">
												<div class="border_active"></div>
												<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
													<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="<?= base_url()?>/theme/images/prod_img/<?=$prod_img_1?>" alt=""></div>
													<div class="product_content">
														<div class="product_price">Rp. <?=number_format($prod_price, 0, ",", ".")?></div>
														<div class="product_name"><div><a href="<?=base_url().'product/details/'.$prod_id?>"><?=$prod_name?></a></div></div>
														<div class="product_extras">
															<form class="" action="<?=base_url().'product/details/'.$prod_id?>" method="post">
																<button class="product_cart_button">Add to Cart</button>
															</form>
														</div>
													</div>
													<div class="product_fav"><i class="fas fa-heart"></i></div>
													<ul class="product_marks">
														<li class="product_mark product_discount">-25%</li>
														<li class="product_mark product_new">new</li>
													</ul>
												</div>
											</div>
										<?php endforeach; ?>
                  </div>
                  <div class="arrivals_slider_dots_cover"></div>
                </div>

              </div>

						<?php foreach ($big_hot_new_arrivals->result_array() as $bhna):
							$prod_id=$bhna['product_id'];
							$prod_name=$bhna['product_name'];
							$prod_cat=$bhna['category_name'];
							$prod_price=$bhna['product_price'];
							$prod_img_1=$bhna['product_image_1'];
							?>
              <div class="col-lg-3">
                <div class="arrivals_single clearfix">
                  <div class="d-flex flex-column align-items-center justify-content-center">
                    <div class="arrivals_single_image"><img src="<?= base_url()?>/theme/images/prod_img/<?=$prod_img_1?>" alt=""></div>
                    <div class="arrivals_single_content">
                      <div class="arrivals_single_category"><a href="#"><?=$prod_cat?></a></div>
                      <div class="arrivals_single_name_container clearfix">
                        <div class="arrivals_single_name"><a href="<?=base_url().'product/details/'.$prod_id?>"><?=$prod_name?></a></div>
                        <div class="arrivals_single_price text-right">Rp. <?=number_format($prod_price, 0, ",", ".")?></div>
                      </div>
                      <div class="rating_r rating_r_4 arrivals_single_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <form action="<?=base_url().'product/details/'.$prod_id?>"><button class="arrivals_single_button">Add to Cart</button></form>
                    </div>
                    <div class="arrivals_single_fav product_fav active"><i class="fas fa-heart"></i></div>
                    <ul class="arrivals_single_marks product_marks">
                      <li class="arrivals_single_mark product_mark product_new">new</li>
                    </ul>
                  </div>
                </div>
              </div>
						<?php endforeach;?>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

	<!-- Best Sellers -->

	<div class="best_sellers">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title">Hot Best Sellers</div>
							<ul class="clearfix">
								<li class="active">Top 20</li>
							</ul>
							<div class="tabs_line"><span></span></div>
						</div>

						<div class="bestsellers_panel panel active">

							<!-- Best Sellers Slider -->

							<div class="bestsellers_slider slider">

								<!-- Best Sellers Item -->
								<div class="bestsellers_item">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="<?= base_url()?>/theme/images/best_1.png" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">Rp. 225.000</div>
										</div>
									</div>
									<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="<?= base_url()?>/theme/images/best_2.png" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="product.html">Samsung J730F...</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">Rp. 225.000</div>
										</div>
									</div>
									<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="<?= base_url()?>/theme/images/best_3.png" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="product.html">Nomi Black White</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">Rp. 225.000</div>
										</div>
									</div>
									<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="<?= base_url()?>/theme/images/best_4.png" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="product.html">Samsung Charm Gold</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">Rp. 225.000</div>
										</div>
									</div>
									<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="<?= base_url()?>/theme/images/best_5.png" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="product.html">Beoplay H7</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">Rp. 225.000</div>
										</div>
									</div>
									<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="<?= base_url()?>/theme/images/best_6.png" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="product.html">Huawei MediaPad T3</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">Rp. 225.000</div>
										</div>
									</div>
									<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="<?= base_url()?>/theme/images/best_1.png" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">Rp. 225.000</div>
										</div>
									</div>
									<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="<?= base_url()?>/theme/images/best_2.png" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">Rp. 225.000</div>
										</div>
									</div>
									<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="<?= base_url()?>/theme/images/best_3.png" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">Rp. 225.000</div>
										</div>
									</div>
									<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="<?= base_url()?>/theme/images/best_4.png" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">Rp. 225.000</div>
										</div>
									</div>
									<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="<?= base_url()?>/theme/images/best_5.png" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">Rp. 225.000</div>
										</div>
									</div>
									<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="<?= base_url()?>/theme/images/best_6.png" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">Rp. 225.000</div>
										</div>
									</div>
									<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Adverts -->

	<div class="adverts">
		<div class="container">
			<div class="row">

				<div class="col-lg-4 advert_col">

					<!-- Advert Item -->

					<div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_title"><a href="#">Trends 2020</a></div>
							<div class="advert_text">Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</div>
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="<?= base_url()?>/theme/images/adv_1.png" alt=""></div></div>
					</div>
				</div>

				<div class="col-lg-4 advert_col">

					<!-- Advert Item -->

					<div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_subtitle">Trends 2020</div>
							<div class="advert_title_2"><a href="#">Sale -45%</a></div>
							<div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="<?= base_url()?>/theme/images/adv_2.png" alt=""></div></div>
					</div>
				</div>

				<div class="col-lg-4 advert_col">

					<!-- Advert Item -->

					<div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_title"><a href="#">Trends 2020</a></div>
							<div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="<?= base_url()?>/theme/images/adv_3.png" alt=""></div></div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Reviews -->

	<div class="reviews">
		<div class="container">
			<div class="row">
				<div class="col">

					<div class="reviews_title_container">
						<h3 class="reviews_title">Latest Reviews</h3>
						<div class="reviews_all ml-auto"><a href="#">view all <span>reviews</span></a></div>
					</div>

					<div class="reviews_slider_container">

						<!-- Reviews Slider -->
						<div class="owl-carousel owl-theme reviews_slider">

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="<?= base_url()?>/theme/images/review_1.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Roberto Sanchez</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="<?= base_url()?>/theme/images/review_2.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Brandon Flowers</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="<?= base_url()?>/theme/images/review_3.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Emilia Clarke</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="<?= base_url()?>/theme/images/review_1.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Roberto Sanchez</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="<?= base_url()?>/theme/images/review_2.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Brandon Flowers</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="<?= base_url()?>/theme/images/review_3.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Emilia Clarke</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

						</div>
						<div class="reviews_dots"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
