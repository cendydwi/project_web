
<section id="main-content">
  <section class="wrapper site-min-height">
    <div class="row mt">
      <div class="col-lg-12 mt">
        <div class="row content-panel">
          <div class="panel-heading">
            <ul class="nav nav-tabs nav-justified">
              <li class="active">
                <a data-toggle="tab" href="#edit">Edit Website</a>
              </li>
            </ul>
          </div>
          <!-- /panel-heading -->
          <div class="panel-body">
            <div class="tab-content">
              <div id="edit" class="tab-pane active">
                <div class="row">
                  <div class="col-lg-8 col-lg-offset-2 detailed">
                    <h4 class="mb">Website Information</h4>
                    <form role="form" class="form-horizontal" action="<?=base_url()?>admin/settings/application/update" method="post" enctype="multipart/form-data">
                      <div class="form-group last">
                        <label class="control-label col-md-3">Logo</label>
                        <div class="col-md-9">
                          <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                              <img src="<?=base_url()?>theme/images/<?=$this->db->get_where('settings' , array('key' => 'logo'))->row()->value?>" alt="" />
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                              <span class="btn btn-theme02 btn-file">
                              <span class="fileupload-new"><i class="fa fa-undo"></i> Change</span>
                              <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                              <input type="file" class="default" name="logo" accept="image/jpeg"/>
                              <input type="hidden" name="logo-old" value="<?=$this->db->get_where('settings' , array('key' => 'logo'))->row()->value?>">
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
                        <label class="col-lg-2 control-label">Website Name</label>
                        <div class="col-lg-6">
                          <input type="text" placeholder="Website Name" name="system_name" class="form-control" value="<?=$this->db->get_where('settings' , array('key' => 'system_name'))->row()->value?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Website Keyword</label>
                        <div class="col-lg-6">
                          <input type="text" placeholder="Website Keyword" name="website_keywords" class="form-control" value="<?=$this->db->get_where('settings' , array('key' => 'website_keywords'))->row()->value?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Website Description</label>
                        <div class="col-lg-10">
                          <textarea rows="10" cols="30" class="form-control textarea1" name="website_description"><?=$this->db->get_where('settings' , array('key' => 'website_description'))->row()->value?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Customer Care Email</label>
                        <div class="col-lg-6">
                          <input type="text" placeholder="Customer Care Email" class="form-control" name="system_email" value="<?=$this->db->get_where('settings' , array('key' => 'system_email'))->row()->value?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Address</label>
                        <div class="col-lg-6">
                          <input type="text" placeholder="Address" class="form-control" name="address" value="<?=$this->db->get_where('settings' , array('key' => 'address'))->row()->value?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Phone</label>
                        <div class="col-lg-6">
                          <input type="text" placeholder="Phone Number" class="form-control" name="phone" value="<?=$this->db->get_where('settings' , array('key' => 'phone'))->row()->value?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                          <button class="btn btn-theme" type="submit">Save</button>
                          <button class="btn btn-theme04" type="button">Cancel</button>
                        </div>
                      </div>
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
