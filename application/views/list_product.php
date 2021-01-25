
	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title"><?= $category['category_name']; ?></h2>
		</div>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<ul class="sidebar_categories">
                <?php foreach ($all_category->result_array() as $cat):
                  $cat_name = $cat['category_name'];
                  ?>
                  <li><a href="<?= base_url()?>search/searchproduct/<?=$cat_name?>" class="<?php if ($category['category_name'] == $cat_name) {
                    echo "active";
                  }?>"><?=$cat_name?></a></li>
                <?php endforeach; ?>
							</ul>
						</div>
						<div class="sidebar_section filter_by_section">
							<div class="sidebar_title">Filter By</div>
							<div class="sidebar_subtitle">Price</div>
							<div class="filter_price">
								<div id="slider-range" class="slider_range" data-max="<?=$this->db->select_max('product_price')->get('product')->row()->product_price;?>"></div>
								<p>Range: </p>
								<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							</div>
						</div>
					</div>

				</div>

				<div class="col-lg-9">

					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span><?=$product->num_rows()?></span> products found</div>
							<div class="shop_sorting">
								<span>Sort by:</span>
								<ul>
									<li>
										<span class="sorting_text">newest<i class="fas fa-chevron-down"></span></i>
										<ul>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>newest</li>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
											<li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>

						<div class="shop_product_grid">
							<div class="shop_product_grid_border"></div>

              <?php foreach ($product->result_array() as $prod):
								$prod_id = $prod['product_id'];
                $prod_name = $prod['product_name'];
                $prod_price = $prod['product_price'];
								$prod_create = $prod['product_created_at'];
                $prod_img_1 = $prod['product_image_1'];
                ?>

							<!-- Product Item -->
							<div class="shop_product_item <?php if (date("Y-m-d") == date_format(date_create($prod_create),"Y-m-d")){ echo "is_new";}?>">
								<div class="shop_product_border"></div>
								<div class="shop_product_image d-flex flex-column align-items-center justify-content-center"><img src="<?=base_url()?>theme/images/prod_img/<?=$prod_img_1?>" alt=""></div>
								<div class="shop_product_content">
									<div class="shop_product_price">Rp. <?=number_format($prod_price, 0, ",", ".");?></div>
									<div class="shop_product_name"><div><a href="<?=base_url()?>product/details/<?=$prod_id?>" tabindex="0"><?=$prod_name?></a></div></div>
								</div>
								<div class="shop_product_fav"><i class="fas fa-heart"></i></div>
								<ul class="shop_product_marks">
									<li class="shop_product_mark shop_product_discount">-25%</li>
									<li class="shop_product_mark shop_product_new">new</li>
								</ul>
							</div>

            <?php endforeach; ?>
						</div>

						<!-- Shop Page Navigation -->

						<!-- <div class="shop_page_nav d-flex flex-row">
							<div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
							<ul class="page_nav d-flex flex-row">
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">...</a></li>
								<li><a href="#">21</a></li>
							</ul>
							<div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
						</div> -->
            <?php echo $this->pagination->create_links(); ?>
					</div>

				</div>
			</div>
		</div>
	</div>
