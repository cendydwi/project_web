
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
                    <form class="form-horizontal style-form" action="<?=base_url()?>admin/product/add" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"><h4>Product Name</h4></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="prod_name" required>
                        </div>
                      </div>
                        <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label"><h4>Product Category</h4></label>
                          <div class="col-sm-10">
                          <select class="form-control" name="prod_cat">
                            <?php foreach ($category->result_array() as $cat):
                              $cat_id=$cat['category_id'];
                              $cat_name=$cat['category_name'];?>
                              <option value="<?=$cat_id;?>"><?= $cat_name;?></option>
                            <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"><h4>Product Description</h4></label>
                        <div class="col-sm-10">
                          <textarea class='textarea1' name='prod_desc' required></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"><h4>Product Quantity</h4></label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" min="0" name="prod_quant" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"><h4>Product Price</h4></label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" min="0" name="prod_price" required>
                        </div>
                      </div>
                      <div class="form-group last">
                        <label class="control-label col-md-3"><h4>Image 1</h4></label>
                        <div class="col-md-9">
                          <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                              <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                              <span class="btn btn-theme02 btn-file">
                                <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                              <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                              <input type="file" class="default" name="image-1" accept="image/jpeg" required/>
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
                              <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                              <span class="btn btn-theme02 btn-file">
                                <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                              <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                              <input type="file" class="default" name="image-2" accept="image/jpeg" required/>
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
                              <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                              <span class="btn btn-theme02 btn-file">
                                <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                              <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                              <input type="file" class="default" name="image-3" accept="image/jpeg" required/>
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
