
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12 main-chart">
              <div class="row mt">
                <div class="col-md-12">
                  <div class="content-panel">
                  <div class="col-md-12">
                    <h3>Category Data</h3>
                    <button type="button" name="button" class="pull-right btn btn-round btn-primary" data-toggle="modal" data-target="#addcategory"><i class="fa fa-plus"></i>&nbsp;&nbsp;ADD CATEGORY</button>
                    <!-- Modal -->
                    <div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <form class="" action="<?=base_url()?>admin/category/add" method="post">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body col-md-11">
                              <div class="form-group">
                                <label class="col-sm-3 col-sm-3 control-label">Category Name</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="cat_name">
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
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th># Id</th>
                          <th><i class="fa fa-question-circle"></i> Category Name</th>
                          <th><i class=" fa fa-edit"></i> Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                            $no = 1;
                            foreach ($category->result_array() as $cat):
                            $cat_id=$cat['category_id'];
                            $cat_name=$cat['category_name'];
                            ?>
                            <tr>
                              <td>
                                <?php echo $no++; ?>
                              </td>
                              <td><?php echo $cat_name; ?></td>
                              <td>
                                <button class="btn btn-primary btn-xs btn-edt-cat" data-toggle="modal" data-target="#editcategory" data-id="<?= $cat_id;?>" data-name="<?= $cat_name;?>"><i class="fa fa-pencil"></i></button>

                                <button class="btn btn-danger btn-xs btn-del-cat" data-toggle="modal" data-target="#deletecategory" data-id="<?= $cat_id;?>"><i class="fa fa-trash-o "></i></button>

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
  <div class="modal fade" id="editcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form class="" action="<?=base_url()?>admin/category/edit" method="post">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body col-md-11">
            <div class="form-group">
              <label class="col-sm-3 col-sm-3 control-label">Category Name</label>
              <div class="col-sm-8">
                <input type="hidden" class="cat_id" name="edt_cat_id">
                <input type="text" class="form-control cat_name" name="edt_cat_name">
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
<div class="modal fade" id="deletecategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form class="" action="<?=base_url()?>admin/category/delete" method="post">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body col-md-11">
            <div class="form-group">
              <label class="col-sm-11 col-sm-11 control-label">Are You Sure To Delete This Product!</label>
              <input type="hidden" class="cat_id" name="del_cat_id">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Delete</button>
          </div>
        </div>
      </form>
    </div>
  </div>
