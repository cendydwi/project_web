<?php $this->db->where('dotw_expired <=', date("Y-m-d"))->delete('dotw'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8">
  <link rel="icon" href="<?= base_url()?>theme/images/Logo.png" type="image/png" />
  <title><?= $this->db->get_where('settings' , array('key' => 'system_title'))->row()->value; ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="<?= base_url() ?>theme/admin/css/style.css" rel="stylesheet">
  <link href="<?= base_url() ?>theme/admin/css/style-responsive.css" rel="stylesheet">
  <script src='<?= base_url() ?>vendor/tinymce/tinymce/tinymce.min.js'></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>
  <section id="container">
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="<?=base_url()?>" class="logo"><b>TOKO <span>RAKYAT</span></b></a>
      <!--logo end-->
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="<?=base_url()?>logout">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <?php
          $avatar = $this->db->where('user_id', $this->session->userdata('user_id'))->get('users')->row()->photo;
          if ($avatar == NULL){ ?>
            <p class="centered"><a href="<?=base_url()?>admin/profile"><i class="fa fa-user user-logo"></i></a></p>
          <?php }else {?>
            <p class="centered"><a href="<?=base_url()?>admin/profile"><img src="<?=base_url()?>theme/images/user_profile/<?=$avatar?>" class="img-circle" width="80"></a></p>
          <?php }?>
          <h5 class="centered"><?php if ($this->db->where('user_id', $this->session->userdata('user_id'))->get('users')->row()->full_name == NULL) {
            echo $this->db->where('user_id', $this->session->userdata('user_id'))->get('users')->row()->email;
          }else {
            echo $this->db->where('user_id', $this->session->userdata('user_id'))->get('users')->row()->full_name;
          } ?></h5>
          <li class="mt">
            <a class="<?php if ($this->uri->segment(2) == NULL){ echo "active";} ?>" href="<?= base_url() ?>admin">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li>
            <a class="<?php if ($this->uri->segment(2) == "category"){ echo "active";} ?>" href="<?= base_url() ?>admin/category">
              <i class="fa fa-list-ul"></i>
              <span>Category</span>
              </a>
          </li>
          <li>
            <a class="<?php if ($this->uri->segment(2) == "product"){ echo "active";} ?>" href="<?= base_url() ?>admin/product">
              <i class="fa fa-dropbox"></i>
              <span>Product</span>
              </a>
          </li>
          <li>
            <a class="<?php if ($this->uri->segment(2) == "dotw"){ echo "active";} ?>" href="<?= base_url() ?>admin/dotw">
              <i class="fa fa-shopping-bag"></i>
              <span>Deals Of The Weeks</span>
              </a>
          </li>
          <li>
            <a class="<?php if ($this->uri->segment(2) == "order"){ echo "active";} ?>" href="<?= base_url() ?>admin/order">
              <i class="fa fa-shopping-cart"></i>
              <span>Orders</span>
              </a>
          </li>
          <li>
            <a class="<?php if ($this->uri->segment(2) == "profile"){ echo "active";} ?>" href="<?= base_url() ?>admin/profile">
              <i class="fa fa-gear"></i>
              <span>Profile</span>
              </a>
          </li>
          <?php if ($this->session->userdata('user_role') == 'admin') {?>
            <li>
              <a class="<?php if ($this->uri->segment(2) == "user"){ echo "active";} ?>" href="<?= base_url() ?>admin/user">
                <i class="fa fa-users"></i>
                <span>Users</span>
                </a>
            </li>
          <?php } ?>

          <?php if ($this->session->userdata('user_role') == 'admin') {?>
            <li class="sub-menu">
              <a href="javascript:;" class="<?php if ($this->uri->segment(2) == "settings"){ echo "active";} ?>">
                <i class="fa fa-gears"></i>
                <span>Settings</span>
              </a>
              <ul class="sub">
                <li><a href="<?=base_url()?>admin/settings/application"><i class="fa fa-gear"></i>Application</a></li>
                <li><a href="<?=base_url()?>admin/settings/smtp"><i class="fa fa-gear"></i>SMTP MAIL</a></li>
              </ul>
            </li>
          <?php } ?>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <?php
    if($this->session->flashdata('message')){
 		?>
 		<div class="message">
 				<?= $this->session->flashdata('message'); ?>
 		</div>
 		<?php
 	 }
   ?>
