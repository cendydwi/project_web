<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<form class="" action="<?=base_url()?>checkout" method="post">
						<div class="cart_container">
							<div class="cart_title">Shopping Cart</div>
							<div class="cart_items">
								<ul class="cart_list">
									<?php foreach ($cart->result_array() as $cart):
										$cart_id = $cart['cart_id'];
										$cart_prod_name = $cart['product_name'];
										$prod_img_1 = $cart['product_image_1'];
										$cart_prod_quant = $cart['cart_product_quantity'];
										$cart_prod_price = $cart['cart_product_price'];
										$cart_prod_total_price = $cart['cart_product_total_price'];
										?>
										<li class="cart_item clearfix">
											<div class="cart_item_image"><img src="<?=base_url()?>theme\images\prod_img\<?=$prod_img_1?>" alt=""></div>
											<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
												<div class="cart_item_name cart_info_col">
													<div class="cart_item_title">Name</div>
													<div class="cart_item_text"><?=$cart_prod_name?></div>
												</div>
												<div class="cart_item_quantity cart_info_col">
													<div class="cart_item_title">Quantity</div>
													<div class="cart_item_text"><?=$cart_prod_quant?></div>
												</div>
												<div class="cart_item_price cart_info_col">
													<div class="cart_item_title">Price</div>
													<div class="cart_item_text">Rp. <?=number_format($cart_prod_price, 0, ",", ".");?></div>
												</div>
												<div class="cart_item_total cart_info_col">
													<div class="cart_item_title">Total</div>
													<div class="cart_item_text">Rp. <?=number_format($cart_prod_total_price, 0, ",", ".");?></div>
												</div>
												<div class="cart_item_total cart_info_col">
													<div class="cart_item_title"></div>
													<div class="cart_item_text">
														<form class="" action="<?=base_url()?>cart/delcart" method="post">
															<input type="text" name="cart_id" value="<?=$cart_id?>" hidden>
															<button type="submit" name="button" class="button cart_button_clear">Remove</button>
														</form></div>
													</div>
												</div>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>

								<!-- Order Total -->
								<div class="order_total">
									<div class="order_total_content text-md-right">
										<div class="order_total_title">Order Total:</div>
										<div class="order_total_amount">Rp. <?=number_format($this->db->select_sum('cart_product_total_price')->where('user_id', $this->session->userdata('user_id'))->get('cart')->row()->cart_product_total_price, 0, ",", ".");?></div>
									</div>
								</div>

								<div class="cart_buttons">
									<a class="button cart_button_clear" href="<?=base_url()?>cart/clearcart">Clear Cart</a>
									<input type="text" name="total_price" value="<?=$this->db->select_sum('cart_product_total_price')->where('user_id', $this->session->userdata('user_id'))->get('cart')->row()->cart_product_total_price?>" hidden>
									<button type="submit" class="button cart_button_checkout">Checkout</button>
								</div>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>
