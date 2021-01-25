
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12 main-chart showback">
              <div class="row mt">
                <div class="col-md-12">
                  <div class="col-md-12">
                    <h3><a href="<?=base_url()?>admin/product">Product</a> < Product Data</h3>
                  </div>
                  <div class="col-md-12">
                    <?php foreach ($product->result_array() as $prod):
                      $prod_id=$prod['product_id'];
                      $prod_name=$prod['product_name'];
                      $prod_desc=$prod['product_desc'];
                      $prod_quant=$prod['product_quantity'];
                      $prod_price=$prod['product_price'];
                      $prod_img_1=$prod['product_image_1'];
                      $prod_img_2=$prod['product_image_2'];
                      $prod_img_3=$prod['product_image_3'];
                      $prod_cat=$prod['category_id'];
                      ?>

                    <?php endforeach; ?>
                    <form class="form-horizontal style-form" action="<?=base_url()?>admin/product/update" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="prod_id" value="<?=$prod_id?>">
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"><h4>Product Name</h4></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="prod_name" value="<?=$prod_name?>">
                        </div>
                      </div>
                        <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label"><h4>Product Category</h4></label>
                          <div class="col-sm-10">
                          <select class="form-control" name="prod_cat">
                            <?php foreach ($category->result_array() as $cat):
                              $cat_id=$cat['category_id'];
                              $cat_name=$cat['category_name'];?>
                              <?php if ($prod_cat==$cat_id){ ?>
                                <option value="<?=$cat_id;?>" selected><?= $cat_name;?></option>
                              <?php }else{ ?>
                                <option value="<?=$cat_id;?>"><?= $cat_name;?></option>
                              <?php } ?>
                            <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"><h4>Product Description</h4></label>
                        <div class="col-sm-10">
                          <textarea class='textarea1' name='prod_desc'><?php echo $prod_desc ?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"><h4>Product Quantity</h4></label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" min="0" name="prod_quant" value="<?=$prod_quant?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"><h4>Product Price</h4></label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" min="0" name="prod_price" value="<?=$prod_price?>">
                        </div>
                      </div>
                      <div class="form-group last">
                        <label class="control-label col-md-3"><h4>Image 1</h4></label>
                        <div class="col-md-9">
                          <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                              <img src="<?=base_url()?>theme/images/prod_img/<?=$prod_img_1?>" alt="" />
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                              <span class="btn btn-theme02 btn-file">
                              <span class="fileupload-new"><i class="fa fa-undo"></i> Change</span>
                              <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                              <input type="file" class="default" name="image-1" accept="image/jpeg"/>
                              <input type="hidden" name="image-1-old" value="<?=$prod_img_1?>">
                              </span>
                            </div>
                          </div>
                          <span class="label label-info">NOTE!</span>
                          <span>
                            Aspect Ratio Must Be 1:1
                            </span>
                        </div>
                      </div>
                      <div class="form-group last">
                        <label class="control-label col-md-3"><h4>Image 2</h4></label>
                        <div class="col-md-9">
                          <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                              <img src="<?=base_url()?>theme/images/prod_img/<?=$prod_img_2?>" alt="" />
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                              <span class="btn btn-theme02 btn-file">
                              <span class="fileupload-new"><i class="fa fa-undo"></i> Change</span>
                              <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                              <input type="file" class="default" name="image-2" accept="image/jpeg"/>
                              <input type="hidden" name="image-2-old" value="<?=$prod_img_2?>">
                              </span>
                            </div>
                          </div>
                          <span class="label label-info">NOTE!</span>
                          <span>
                            Aspect Ratio Must Be 1:1
                            </span>
                        </div>
                      </div>
                      <div class="form-group last">
                        <label class="control-label col-md-3"><h4>Image 3</h4></label>
                        <div class="col-md-9">
                          <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                              <img src="<?=base_url()?>theme/images/prod_img/<?=$prod_img_3?>" alt="" />
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                              <span class="btn btn-theme02 btn-file">
                              <span class="fileupload-new"><i class="fa fa-undo"></i> Change</span>
                              <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                              <input type="file" class="default" name="image-3" accept="image/jpeg"/>
                              <input type="hidden" name="image-3-old" value="<?=$prod_img_3?>">
                              </span>
                            </div>
                          </div>
                          <span class="label label-info">NOTE!</span>
                          <span>
                            Aspect Ratio Must Be 1:1
                            </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <button type="submit" name="button" class="btn btn-success pull-right">SAVE</button>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- /col-md-12 -->
              </div>
          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
        </div>
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->
  </section>
