
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12 main-chart">
              <div class="row mt">
                <div class="col-md-12">
                  <div class="content-panel">
                  <div class="col-md-12">
                    <h3>Deals Of The Weeks Data</h3>
                    <button type="button" name="button" class="pull-right btn btn-round btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>&nbsp;&nbsp;ADD PRODUCT</button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <form class="" action="<?=base_url()?>admin/dotw/add" method="post">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body col-md-11">
                            <div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Product</label>
                              <div class="col-sm-8">
                                <select class="form-control dropdown-search" style="width:100%!important;" name="dotw_prod">
                                <?php foreach ($product->result_array() as $prod):
                                  $prod_id=$prod['product_id'];
                                  $prod_name=$prod['product_name'];
                                  $prod_quant=$prod['product_quantity'];
                                  $prod_price=$prod['product_price']; ?>
                                <option value="<?=$prod_id?>"><?php echo $prod_id.'-'.substr($prod_name,0,50).'-'.$prod_quant.'-'.$prod_price; ?></option>
                              <?php endforeach; ?>
                            </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-4">Expired</label>
                              <div class="col-sm-8">
                                <input type="date" class="form-control" name="dotw_expired">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-4">Price</label>
                              <div class="col-sm-8">
                                <input type="number" class="form-control" name="dotw_price" min="0">
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                    <table class="table table-striped table-advance table-hover">
                      <thead>
                        <tr>
                          <th class="hidden-phone"># Id</th>
                          <th><i class="fa fa-question-circle"></i> Product Name</th>
                          <th class="hidden-phone"><i class="fa fa-clock-o"></i> Created At</th>
                          <th><i class=" fa fa-clock-o"></i> Expired At</th>
                          <th><i class=" fa fa-dollar"></i> Price</th>
                          <th><i class="fa fa-edit"></i> Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $no = 1;
                          foreach ($dotw->result_array() as $dotw):
                            $dotw_id=$dotw['dotw_id'];
                            $dotw_prod_id=$dotw['product_id'];
                            $dotw_prod=$dotw['product_name'];
                            $dotw_create=$dotw['dotw_created'];
                            $dotw_expired=$dotw['dotw_expired'];
                            $dotw_price=$dotw['dotw_price'];
                          ?>
                        <tr>
                          <td class="hidden-phone">
                            <?php echo $no++; ?>
                          </td>
                          <td><?php echo $dotw_prod; ?></td>
                          <td class="hidden-phone"><?php echo $dotw_create; ?> </td>
                          <td><?php echo $dotw_expired; ?></td>
                          <td><?php echo $dotw_price; ?></td>
                          <td>
                            <button class="btn btn-primary btn-xs btn-edt-dotw" data-toggle="modal" data-target="#editdotw" data-id='<?=$dotw_id?>' data-prod='<?=$dotw_prod_id?>' data-expired='<?=$dotw_expired?>' data-price='<?=$dotw_price?>'><i class="fa fa-pencil"></i></button>

                            <button class="btn btn-danger btn-xs btn-del-dotw" data-toggle="modal" data-target="#deletedotw" data-id="<?=$dotw_id?>"><i class="fa fa-trash-o"></i></button>
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

  <div class="modal fade" id="editdotw" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form class="" action="<?=base_url()?>/admin/dotw/edit" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body col-md-11">
          <input type="hidden" name="dotw_id" class="dotw_id">
          <div class="form-group">
            <label class="col-sm-4 col-sm-4 control-label">Product</label>
            <div class="col-sm-8">
              <select class="form-control dropdown-search" style="width:100%!important;" name="dotw_prod" id="dotw_prod">
              <?php foreach ($product->result_array() as $prod):
                $prod_id=$prod['product_id'];
                $prod_name=$prod['product_name'];
                $prod_quant=$prod['product_quantity'];
                $prod_price=$prod['product_price']; ?>
              <option value="<?=$prod_id?>"><?php echo $prod_id.'-'.substr($prod_name,0,50).'-'.$prod_quant.'-'.$prod_price; ?></option>
            <?php endforeach; ?>
          </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4">Expired</label>
            <div class="col-sm-8">
              <input type="date" class="form-control dotw_expired" name="dotw_expired">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4">Price</label>
            <div class="col-sm-8">
              <input type="number" class="form-control dotw_price" name="dotw_price" min="0">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </div>
    </form>
    </div>
  </div>

  <div class="modal fade" id="deletedotw" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form class="" action="<?=base_url()?>admin/dotw/delete" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body col-md-11">
          <label class="col-sm-11 col-sm-11 control-label">Are You Sure To Delete This Product!</label>
          <input type="hidden" class="dotw_id" name="del_dotw_id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </form>
    </div>
  </div>
