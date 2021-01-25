
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12 main-chart">
              <div class="row mt">
                <div class="col-md-12">
                  <div class="content-panel">
                  <div class="col-md-12">
                    <h3>Product Data</h3>
                    <a href="<?= base_url() ?>admin/product/form_product" class="pull-right btn btn-round btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;ADD PRODUCT</a>
                  </div>
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th># Id</th>
                          <th><i class="fa fa-question-circle"></i> Product Name</th>
                          <th><i class=" fa fa-edit"></i> Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $no = 1;
                          foreach ($product->result_array() as $prod):
                          $prod_id=$prod['product_id'];
                          $prod_name=$prod['product_name'];
                          $prod_cat=$prod['category_name'];
                          $prod_desc=$prod['product_desc'];
                          $prod_quant=$prod['product_quantity'];
                          $prod_price=$prod['product_price'];
                          $prod_img_1=$prod['product_image_1'];
                          $prod_img_2=$prod['product_image_2'];
                          $prod_img_3=$prod['product_image_3'];
                          ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $prod_name ?></td>
                          <td>
                            <button class="btn btn-warning btn-xs btn-det-prod" data-toggle="modal" data-target="#detailproduct" data-name="<?= $prod_name;?>" data-cat="<?= $prod_cat;?>" data-desc="<?= $prod_desc;?>" data-quant="<?= $prod_quant;?>" data-price="<?= $prod_price;?>" data-img1="<?= $prod_img_1;?>" data-img2="<?= $prod_img_2;?>" data-img3="<?= $prod_img_3;?>"><i class="fa fa-eye"></i></button>

                            <a href="<?=base_url()?>admin/product/form_edit_product/<?=$prod_id?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>

                            <button class="btn btn-danger btn-xs btn-del-prod" data-toggle="modal" data-target="#deleteproduct" data-id="<?= $prod_id;?>"><i class="fa fa-trash-o "></i></button>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /content-panel -->
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
  <div class="modal fade" id="detailproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Details Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body col-md-11">
          <table class="details-product">
            <tr>
              <td>Product Name:</td>
              <td colspan="3"><span class="prod_name"></span></td>
            </tr>
            <tr>
              <td>Product Category:</td>
              <td colspan="3"><span class="prod_cat"></span></td>
            </tr>
            <tr>
              <td>Description:</td>
              <td colspan="3"><span class="prod_desc"></span></td>
            </tr>
            <tr>
              <td>Quantity:</td>
              <td colspan="3"><span class="prod_quant"></span> </td>
            </tr>
            <tr>
              <td>Price:</td>
              <td colspan="3"><span class="prod_price"></span> </td>
            </tr>
            <tr>
              <td>Image:</td>
              <td><img alt="" width="120" height="120" class="prod_img_1"></td>
              <td><img alt="" width="120" height="120" class="prod_img_2"></td>
              <td><img alt="" width="120" height="120" class="prod_img_3"></td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form class="" action="<?=base_url()?>admin/product/delete" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body col-md-11">
          <label class="col-sm-11 col-sm-11 control-label">Are You Sure To Delete This Product!</label>
          <input type="hidden" class="prod_id" name="del_prod_id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </form>
    </div>
  </div>
