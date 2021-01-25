
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12 main-chart">
              <div class="row mt">
                <div class="col-md-12">
                  <div class="content-panel">
                  <div class="col-md-12">
                    <h3>Users Data</h3>
                  </div>
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th># Id</th>
                          <th><i class="fa fa-question-circle"></i> Name</th>
                          <th><i class="fa fa-envelope"></i> Email</th>
                          <th><i class="fa fa-user"></i> Role</th>
                          <th><i class="fa fa-bullhorn"></i> Status</th>
                          <th><i class=" fa fa-edit"></i> Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                            $no = 1;
                            foreach ($user->result_array() as $usr):
                            $usr_id=$usr['user_id'];
                            $usr_name=$usr['full_name'];
                            $usr_email=$usr['email'];
                            $usr_role=$usr['role'];
                            $usr_active=$usr['is_active'];
                            ?>
                            <tr>
                              <td>
                                <?php echo $no++; ?>
                              </td>
                              <td><?php if ($usr_name == NULL) {
                                echo "<i>NULL</i>";
                              }else {
                                echo $usr_name;
                              } ?></td>
                              <td><?php echo $usr_email; ?></td>
                              <td><?php echo $usr_role; ?></td>
                              <td><?php if ($usr_active == 0) {
                                echo "<span class='label label-danger label-mini'>Not Active</span>";
                              }else {
                                echo "<span class='label label-success label-mini'>Active</span>";
                              } ?>
                            </td>
                              <td>
                                <button class="btn btn-primary btn-xs btn-edt-usr" data-toggle="modal" data-target="#edituser" data-id="<?= $usr_id;?>" data-name="<?= $usr_name;?>" data-role="<?= $usr_role?>" data-active="<?= $usr_active?>"><i class="fa fa-pencil"></i></button>

                                <button class="btn btn-danger btn-xs btn-del-usr" data-toggle="modal" data-target="#deletecategory" data-id="<?= $usr_id;?>"><i class="fa fa-trash-o "></i></button>

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
  <div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form class="" action="<?=base_url()?>admin/user/edit" method="post">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body col-md-11">
            <div class="form-group">
              <label class="col-sm-3 col-sm-3 control-label">User Full Name</label>
              <div class="col-sm-8">
                <input type="hidden" class="usr_id" name="edt_usr_id">
                <input type="text" class="form-control usr_name" name="edt_usr_name">
              </div>
            </div>
              <div class="form-group">
                <label class="col-sm-3 col-sm-3 control-label">Role</label>
                <div class="col-sm-8">
                <select class="form-control usr_role" name="edt_usr_role">
                  <option value="admin">Admin</option>
                  <option value="employe">Employe</option>
                  <option value="user">User</option>
                </select>
                </div>
              </div>
                <div class="form-group">
                  <label class="col-sm-3 col-sm-3 control-label">Status</label>
                  <div class="col-sm-8">
                  <select class="form-control usr_active" name="edt_usr_active">
                    <option value="0">Not Active</option>
                    <option value="1">Active</option>
                  </select>
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
        <form class="" action="<?=base_url()?>admin/user/delete" method="post">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body col-md-11">
            <div class="form-group">
              <label class="col-sm-11 col-sm-11 control-label">Are You Sure To Delete This Product!</label>
              <input type="hidden" class="usr_id" name="del_usr_id">
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
