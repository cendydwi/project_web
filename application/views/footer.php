<!-- Brands -->

<div class="brands">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="brands_slider_container">

          <!-- Brands Slider -->

          <div class="owl-carousel owl-theme brands_slider">

            <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="<?= base_url()?>theme/images/brands_1.jpg" alt=""></div></div>
            <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="<?= base_url()?>theme/images/brands_2.jpg" alt=""></div></div>
            <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="<?= base_url()?>theme/images/brands_3.jpg" alt=""></div></div>
            <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="<?= base_url()?>theme/images/brands_4.jpg" alt=""></div></div>
            <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="<?= base_url()?>theme/images/brands_5.jpg" alt=""></div></div>
            <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="<?= base_url()?>theme/images/brands_6.jpg" alt=""></div></div>
            <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="<?= base_url()?>theme/images/brands_7.jpg" alt=""></div></div>
            <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="<?= base_url()?>theme/images/brands_8.jpg" alt=""></div></div>

          </div>

          <!-- Brands Slider Navigation -->
          <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
          <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- Footer -->

<footer class="footer">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 footer_col">
        <div class="footer_column footer_contact">
          <div class="logo_container">
            <div class="logo"><a href="#"><img src="<?= base_url()?>theme/images/Logo.png" alt=""></a></div>
          </div>
          <div class="footer_title">Got Question? Call Us 24/7</div>
          <div class="footer_phone"><a href="tel:<?=$this->db->get_where('settings' , array('key' => 'phone'))->row()->value?>"><?=$this->db->get_where('settings' , array('key' => 'phone'))->row()->value?></a></div>
          <div class="footer_contact_text">
            <p><?=$this->db->get_where('settings' , array('key' => 'address'))->row()->value?></p>
          </div>
          <div class="footer_social">
            <ul>
              <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#"><i class="fab fa-youtube"></i></a></li>
              <li><a href="#"><i class="fab fa-google"></i></a></li>
              <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-lg-2 offset-lg-2">
        <div class="footer_column">
          <div class="footer_title">Find it Fast</div>
          <ul class="footer_list">
          <?php $query=$this->db->get('category');
          $split_cat=round($query->num_rows()/2);
          $j=0;
          foreach ($query->result_array() as $cat):
            $j++;
            $cat_name=$cat['category_name'];
            if ($j<=$split_cat) {?>
              <li><a href="<?= base_url()?>search/searchproduct/<?=$cat_name?>"><?=$cat_name?></a></li>
            <?php }
            if ($j==$split_cat) {
              break;
            }
            endforeach;?>
          </ul>
        </div>
      </div>

      <div class="col-lg-2">
        <div class="footer_column">
          <ul class="footer_list footer_list_2">
            <?php
            $j=0;
            foreach ($query->result_array() as $cat):
              $j++;
              $cat_name=$cat['category_name'];
              if ($j>$split_cat) {?>
                <li><a href="<?= base_url()?>search/searchproduct/<?=$cat_name?>"><?=$cat_name?></a></li>
              <?php }
              endforeach;?>
          </ul>
        </div>
      </div>

      <div class="col-lg-2">
        <div class="footer_column">
          <div class="footer_title">Customer Care</div>
          <ul class="footer_list">
            <li><a href="#">My Account</a></li>
            <li><a href="#">Order Tracking</a></li>
            <li><a href="#">Wish List</a></li>
            <li><a href="#">Customer Services</a></li>
            <li><a href="#">Returns / Exchange</a></li>
            <li><a href="#">FAQs</a></li>
            <li><a href="#">Product Support</a></li>
          </ul>
        </div>
      </div>

    </div>
  </div>
</footer>

<!-- Copyright -->

<div class="copyright">
  <div class="container">
    <div class="row">
      <div class="col">

        <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
          <div class="logos ml-sm-auto">
            <ul class="logos_list">
              <li><a href="#"><img src="<?= base_url()?>theme/images/logos_1.png" alt=""></a></li>
              <li><a href="#"><img src="<?= base_url()?>theme/images/logos_2.png" alt=""></a></li>
              <li><a href="#"><img src="<?= base_url()?>theme/images/logos_3.png" alt=""></a></li>
              <li><a href="#"><img src="<?= base_url()?>theme/images/logos_4.png" alt=""></a></li>
            </ul>
          </div>
      </div>
    </div>
  </div>
</div>
</div>

<script src="<?= base_url()?>theme/js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url()?>theme/js/carousel.js"></script>
<script src="<?= base_url()?>theme/js/TweenMax.min.js"></script>
<script src="<?= base_url()?>theme/js/isotope.pkgd.min.js"></script>
<script src="<?= base_url()?>theme/js/jquery-ui.js"></script>
<script src="https://kit.fontawesome.com/d50aa71a39.js" crossorigin="anonymous"></script>
<script src="<?= base_url()?>theme/js/custom.js"></script>
<script type="text/javascript">
var BASE_URL = "<?php echo base_url();?>";

$('#searchbtn').click(function () {
  var category = $('#category_value').text();
  var search = $('#searchtext').val();
  $('#displayvalue').attr('action', BASE_URL+'search/searchproduct/'+category+'/'+search);
});

$('#searchmobile').on('keypress',function(e) {
    if(e.which == 13) {
      var search = $('#searchmobile').val();
      $('#searchmobileform').attr('action', BASE_URL+'search/searchproduct/All%20Categories%20/'+search);
    }
});
</script>

</body>


</html>
