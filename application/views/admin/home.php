
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12 main-chart">
            <!--CUSTOM CHART START -->
              <div class="col-lg-4 col-md-4 col-sm-4 mb">
                <div class="product-panel-2 pn order">
                  <i class="fa fa-shopping-cart"></i>
                  <h5 class="mt">Order</h5>
                  <h6>TOTAL ORDER: <?=$orders->num_rows();?></h6>
                  <a class="btn btn-small btn-theme04" href="<?=base_url()?>admin/order">FULL REPORT</a>
                </div>
              </div>
                <div class="col-lg-4 col-md-4 col-sm-4 mb">
                  <div class="product-panel-2 pn product">
                    <i class="fa fa-dropbox"></i>
                    <h5 class="mt">Product</h5>
                    <h6>TOTAL PRODUCT: <?=$product->num_rows();?></h6>
                    <a class="btn btn-small btn-theme04" href="<?=base_url()?>admin/product">FULL REPORT</a>
                  </div>
                </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 mb">
                    <div class="product-panel-2 pn user-dash">
                      <i class="fa fa-user"></i>
                      <h5 class="mt">User</h5>
                      <h6>TOTAL USER: <?=$users->num_rows();?></h6>
                      <a class="btn btn-small btn-theme04" href="<?=base_url()?>admin/user">FULL REPORT</a>
                    </div>
                  </div>
            <!--custom chart end-->
            <div class="row mt">
              <?php foreach ($new_product->result_array() as $prod):
                $prod_name=$prod['product_name'];
                $prod_image_1=$prod['product_image_1'];
                ?>
              <div class="col-lg-4 col-md-4 col-sm-4 mb">
                <div class="grey-panel pn donut-chart">
                  <div class="grey-header">
                    <h5>NEWEST PRODUCT</h5>
                  </div>
                  <img src="<?=base_url()?>/theme/images/prod_img/<?=$prod_image_1?>" alt="" width="120" height="120">
                  <div class="row">
                    <div class="col-sm-6 col-xs-6 goleft">
                      <p><?=$prod_name?></p>
                    </div>
                  </div>
                </div>
                <!-- /grey-panel -->
              </div>
            <?php endforeach; ?>
            </div>
          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
        </div>
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->
  </section>
