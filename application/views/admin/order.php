
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12 main-chart">
              <div class="row mt">
                <div class="col-md-12">
                  <div class="content-panel">
                  <div class="col-md-12">
                    <h3>Order Data</h3>
                    <a href="" class="pull-right btn btn-round btn-primary">PRINT DATA</a>
                  </div>
                    <table class="table table-striped table-advance table-hover">
                      <thead>
                        <tr>
                          <th># Transaction Code</th>
                          <th><i class="fa fa-dollar"></i> Total Price</th>
                          <th><i class="fa fa-user"></i> Order Name</th>
                          <th><i class="fa fa-home"></i> Address</th>
                          <th><i class=" fa fa-bullhorn"></i> Status</th>
                          <th><i class=" fa fa-edit"></i> Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($orders->result_array() as $order):
                          $order_id = $order['orders_id'];
                          $user_fullname = $order['full_name'];
                          $order_price = $order['orders_price'];
                          $user_address = $order['address'];
                           ?>
                        <tr>
                          <td>ORDR<?=$order_id?></td>
                          <td><?=$user_fullname?></td>
                          <td><?=number_format($order_price, 0, ",", ".")?></td>
                          <td><?=$user_address?></td>
                          <td><span class="label label-info label-mini">Proses</span><span class="label label-success label-mini">Selesai</span><span class="label label-danger label-mini">Batal</span></td>
                          <td>
                            <form class="" action="<?=base_url()?>admin/order/details" method="post">
                              <input type="text" name="order_id" value="<?=$order_id?>" hidden>
                              <button class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></button>
                              <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                              <button class="btn btn-danger btn-xs"><i class="fa fa-times "></i></button>
                            </form>
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
