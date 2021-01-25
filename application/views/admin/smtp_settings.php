
<section id="main-content">
  <section class="wrapper site-min-height">
    <div class="row mt">
      <div class="col-lg-12 mt">
        <div class="row content-panel">
          <div class="panel-heading">
            <ul class="nav nav-tabs nav-justified">
              <li class="active">
                <a data-toggle="tab" href="#edit">Edit SMTP Website</a>
              </li>
            </ul>
          </div>
          <!-- /panel-heading -->
          <div class="panel-body">
            <div class="tab-content">
              <div id="edit" class="tab-pane active">
                <div class="row">
                  <div class="col-lg-8 col-lg-offset-2 detailed">
                    <h4 class="mb">SMTP Information</h4>
                    <form role="form" class="form-horizontal" action="<?=base_url()?>admin/settings/smtp/update" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Protocol</label>
                        <div class="col-lg-6">
                          <input type="text" placeholder="SMTP PROTOCOL" name="protocol" class="form-control" value="<?=$this->db->get_where('settings' , array('key' => 'protocol'))->row()->value?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">SMTP HOST</label>
                        <div class="col-lg-6">
                          <input type="text" placeholder="SMTP HOST" name="host" class="form-control" value="<?php if ($this->db->get_where('settings' , array('key' => 'smtp_host'))->row()->value == NULL) {
                            echo "ssl://";
                          }else {
                            echo $this->db->get_where('settings' , array('key' => 'smtp_host'))->row()->value;
                          }?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">SMTP PORT</label>
                        <div class="col-lg-6">
                          <input type="text" placeholder="465" class="form-control" name="port" value="<?=$this->db->get_where('settings' , array('key' => 'smtp_port'))->row()->value?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">SMTP USER</label>
                        <div class="col-lg-6">
                          <input type="text" placeholder="SMTP USER" class="form-control" name="user" value="<?=$this->db->get_where('settings' , array('key' => 'smtp_user'))->row()->value?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">SMTP PASSWORD</label>
                        <div class="col-lg-6">
                          <input type="text" placeholder="SMTP PASSWORD" class="form-control" name="password" value="<?=$this->db->get_where('settings' , array('key' => 'smtp_pass'))->row()->value?>">
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
