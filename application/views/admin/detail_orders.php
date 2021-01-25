    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12 main-chart showback">
              <div class="row mt">
                <div class="col-md-12">
                  <?php foreach ($orders->result_array() as $order):
                    $order_id = $order['orders_id'];
                    $user_fullname = $order['full_name'];
                    $user_address = $order['address'];
                    $total_price = $order['orders_price'];
                    ?>
                  <div class="col-md-12">
                    <h3><a href="<?=base_url()?>admin/order">Orders</a> < ORDR<?=$order_id?></h3>
                  </div>
                  <div class="col-md-12">
                    <table class="details-order mb">
                      <tr>
                        <td>Transaction Code:</td>
                        <td colspan="3">ORDR<?=$order_id?></td>
                      </tr>
                      <tr>
                        <td>Order Name:</td>
                        <td colspan="3"><?=$user_fullname?></td>
                      </tr>
                      <tr>
                        <td>Adress:</td>
                        <td colspan="3"><?=$user_address?></td>
                      </tr>
                      <tr>
                        <td colspan="3"><h4>Transaction Details:</h4></td>
                      </tr>
                      <tr>
                        <th>Nama Barang</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <tbody>
                          <?php foreach ($details_orders->result_array() as $details):
                            $prod_name = $details['product_name'];
                            $order_quant = $details['orders_quantity'];
                            $order_price = $details['orders_total_price'];
                            ?>
                          <tr>
                            <td><?=$prod_name?></td>
                            <td><?=$order_quant?></td>
                            <td>Rp. <?=number_format($order_price, 0, ",", ".")?></td>
                          </tr>
                        <?php endforeach; ?>
                        </tbody>
                      </tr>
                      <tr>
                        <td>Total Price:</td>
                        <td colspan="3">Rp. <?=number_format($total_price, 0, ",", ".")?></td>
                      </tr>
                    </table>
                  </div>
                <?php endforeach; ?>
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
