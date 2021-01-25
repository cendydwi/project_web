
<section id="main-content">
  <section class="wrapper site-min-height">
    <div class="row mt">
      <div class="col-lg-12 mt">
        <div class="row content-panel">
          <div class="panel-heading">
            <ul class="nav nav-tabs nav-justified">
              <li class="active">
                <a data-toggle="tab" href="#edit">Edit Profile</a>
              </li>
            </ul>
          </div>
          <!-- /panel-heading -->
          <div class="panel-body">
            <div class="tab-content">
              <div id="edit" class="tab-pane active">
                <div class="row">
                  <div class="col-lg-8 col-lg-offset-2 detailed">
                    <h4 class="mb">Profile</h4>
                    <form role="form" class="form-horizontal" action="<?=base_url()?>admin/profile/update" method="post" enctype="multipart/form-data">
                      <?php foreach ($profile->result_array() as $profile):
                        $user_id = $profile['user_id'];
                        $full_name = $profile['full_name'];
                        $address = $profile['address'];
                        $photo = $profile['photo'];
                        ?>
                        <input type="text" name="user_id" value="<?=$user_id?>" hidden>
                      <div class="form-group last">
                        <label class="control-label col-md-3">Avatar</label>
                        <div class="col-md-9">
                          <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                              <img src="<?=base_url()?>theme/images/user_profile/<?=$photo?>" alt="" />
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                              <span class="btn btn-theme02 btn-file">
                              <span class="fileupload-new"><i class="fa fa-undo"></i> Change</span>
                              <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                              <input type="file" class="default" name="avatar" accept="image/jpeg"/>
                              <input type="hidden" name="avatar-old" value="<?=$photo?>">
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
                        <label class="col-lg-2 control-label">Full Name</label>
                        <div class="col-lg-6">
                          <input type="text" placeholder="Your Full Name" name="full_name" class="form-control" value="<?=$full_name?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Address</label>
                        <div class="col-lg-10">
                          <textarea rows="10" cols="30" class="form-control textarea1" name="address"><?=$address?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                          <button class="btn btn-theme" type="submit">Save</button>
                          <button class="btn btn-theme04" type="button">Cancel</button>
                        </div>
                      </div>
                    <?php endforeach; ?>
                    </form>
                  </div>
                </div>
                <!-- /row -->
              </div>
              <!-- /tab-pane -->
            </div>
            <!-- /tab-content -->
          </div>
          <!-- /panel-body -->
        </div>
        <!-- /col-lg-12 -->
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </section>
  <!-- /wrapper -->
</section>
