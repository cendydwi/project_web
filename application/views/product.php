<?php include 'header.php'; ?>
<!-- Single Product -->

<div class="single_product">
  <div class="container">
    <div class="row">

      <!-- Images -->
      <div class="col-lg-2 order-lg-1 order-2">
        <ul class="image_list">
          <li data-image="<?=base_url()?>theme/images/new_1.jpg"><img src="<?=base_url()?>theme/images/new_1.jpg" alt=""></li>
          <li data-image="<?=base_url()?>theme/images/new_2.jpg"><img src="<?=base_url()?>theme/images/new_2.jpg" alt=""></li>
          <li data-image="<?=base_url()?>theme/images/new_3.jpg"><img src="<?=base_url()?>theme/images/new_3.jpg" alt=""></li>
        </ul>
      </div>

      <!-- Selected Image -->
      <div class="col-lg-5 order-lg-2 order-1">
        <div class="image_selected"><img src="<?=base_url()?>theme/images/new_1.jpg" alt=""></div>
      </div>

      <!-- Description -->
      <div class="col-lg-5 order-3">
        <div class="product_description_in_product">
          <div class="product_category_in_product">Laptops</div>
          <div class="product_name_in_product">MacBook Air 13</div>
          <div class="rating_r rating_r_4 product_rating_in_product"><i></i><i></i><i></i><i></i><i></i></div>
          <div class="product_text_in_product"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum. laoreet turpis, nec sollicitudin dolor cursus at. Maecenas aliquet, dolor a faucibus efficitur, nisi tellus cursus urna, eget dictum lacus turpis.</p></div>
          <div class="order_info d-flex flex-row">
            <form action="#">
              <div class="clearfix" style="z-index: 1000;">

                <!-- Product Quantity -->
                <div class="product_quantity_in_product clearfix">
                  <span>Quantity: </span>
                  <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                  <div class="quantity_buttons">
                    <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                    <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                  </div>
                </div>

                <!-- Product Color -->
                <ul class="product_color_in_product">
                  <li>
                    <span>Color: </span>
                    <div class="color_mark_container"><div id="selected_color" class="color_mark"></div></div>
                    <div class="color_dropdown_button"><i class="fas fa-chevron-down"></i></div>

                    <ul class="color_list">
                      <li><div class="color_mark" style="background: #999999;"></div></li>
                      <li><div class="color_mark" style="background: #b19c83;"></div></li>
                      <li><div class="color_mark" style="background: #000000;"></div></li>
                    </ul>
                  </li>
                </ul>

              </div>

              <div class="product_price_in_product">Rp. 2.000.000</div>
              <div class="button_container">
                <button type="button" class="button cart_button">Add to Cart</button>
                <div class="product_fav_in_product"><i class="fas fa-heart"></i></div>
              </div>

            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
