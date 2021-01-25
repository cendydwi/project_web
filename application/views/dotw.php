<?php
$url_segment2=$this->uri->segment(2);
$url_segment3=$this->uri->segment(3);
if ($url_segment2==null || $url_segment3==null){ ?>
  <div class="single_product">
    <div class="container">
      <div class="row">
        <h1 style="margin:auto!important; padding:auto!important;">DATA TIDAK DITEMUKAN</h1>
      </div>
    </div>
  </div>
<?php }else {
  if ($dotw->num_rows() == 0) {?>
    <div class="single_product">
      <div class="container">
        <div class="row">
          <h1 style="margin:auto!important; padding:auto!important;">DATA TIDAK DITEMUKAN</h1>
        </div>
      </div>
    </div>
  <?php }else {
    foreach ($dotw->result_array() as $prod):
      $prod_id=$prod['product_id'];
      $prod_name=$prod['product_name'];
      $prod_cat=$prod['category_name'];
      $prod_desc=$prod['product_desc'];
      $prod_quant=$prod['product_quantity'];
      $prod_price=$prod['dotw_price'];
      $prod_image_1=$prod['product_image_1'];
      $prod_image_2=$prod['product_image_2'];
      $prod_image_3=$prod['product_image_3'];
      ?>
      <!-- Single Product -->

      <div class="single_product">
        <div class="container">
          <div class="row">

            <!-- Images -->
            <div class="col-lg-2 order-lg-1 order-2">
              <ul class="image_list">
                <li data-image="<?=base_url()?>theme/images/prod_img/<?=$prod_image_1?>"><img src="<?=base_url()?>theme/images/prod_img/<?=$prod_image_1?>" alt=""></li>
                <li data-image="<?=base_url()?>theme/images/prod_img/<?=$prod_image_2?>"><img src="<?=base_url()?>theme/images/prod_img/<?=$prod_image_2?>" alt=""></li>
                <li data-image="<?=base_url()?>theme/images/prod_img/<?=$prod_image_3?>"><img src="<?=base_url()?>theme/images/prod_img/<?=$prod_image_3?>" alt=""></li>
              </ul>
            </div>

            <!-- Selected Image -->
            <div class="col-lg-5 order-lg-2 order-1">
              <div class="image_selected"><img src="<?=base_url()?>theme/images/prod_img/<?=$prod_image_1?>" alt=""></div>
            </div>

            <!-- Description -->
            <div class="col-lg-5 order-3">
              <div class="product_description_in_product">
                <div class="product_category_in_product"><?=$prod_cat?></div>
                <div class="product_name_in_product"><?=$prod_name?></div>
                <div class="rating_r rating_r_4 product_rating_in_product"><i></i><i></i><i></i><i></i><i></i></div>
                <div class="product_text_in_product"><p><?=$prod_desc?></p></div>
                <div class="order_info d-flex flex-row">
                  <form action="<?=base_url()?>cart/addcart" method="post">
                    <div class="clearfix" style="z-index: 1000;">

                      <!-- Product Quantity -->
                      <div class="product_quantity clearfix">
                        <span>Quantity: </span>
                        <input type="text" name="prod_id" value="<?=$prod_id?>" hidden>
                        <input type="text" name="prod_price" value="<?=$prod_price?>" hidden>
                        <input id="quantity_input" type="text" pattern="[0-9]*" value="1" data-max='<?=$prod_quant?>' name="prod_quantity">
                        <div class="quantity_buttons">
                          <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                          <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                        </div>
                      </div>

                    </div>

                    <div class="product_price_in_product">Rp. <?=number_format($prod_price, 0, ",", ".");?></div>
                    <div class="button_container">
                      <button type="submit" class="button cart_button">Add to Cart</button>
                      <div class="product_fav_in_product"><i class="fas fa-heart"></i></div>
                    </div>

                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    <?php endforeach;
  }
} ?>
