<?php $this->db->where('dotw_expired <=', date("Y-m-d"))->delete('dotw'); ?>

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<link rel="icon" href="<?= base_url()?>theme/images/Logo.png" type="image/png" />
<title><?= $this->db->get_where('settings' , array('key' => 'system_title'))->row()->value; ?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="<?=$this->db->get_where('settings' , array('key' => 'website_keywords'))->row()->value?>">
<meta name="description" content="<?=$this->db->get_where('settings' , array('key' => 'website_description'))->row()->value?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="<?= base_url()?>theme/css/style.css">
<link rel="stylesheet" href="<?= base_url()?>theme/css/jquery-ui.css">
<link rel="stylesheet" href="<?= base_url()?>theme/css/custom-style.css">
<link rel="stylesheet" href="<?= base_url()?>theme/css/responsive-style.css">

</head>

<body>

<div class="super_container">

	<!-- Header -->

	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="<?= base_url()?>theme/images/phone.png" alt=""></div><a href="tel:<?=$this->db->get_where('settings' , array('key' => 'phone'))->row()->value?>"><?=$this->db->get_where('settings' , array('key' => 'phone'))->row()->value?></a></div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="<?= base_url()?>theme/images/mail.png" alt=""></div><a href="mailto:<?=$this->db->get_where('settings' , array('key' => 'system_email'))->row()->value?>"><?=$this->db->get_where('settings' , array('key' => 'system_email'))->row()->value?></a></div>
						<div class="top_bar_content ml-auto">
								<?php if ($this->session->userdata('user_logged') == null) {?>
									<div class="top_bar_user not_login">
										<div class="user_icon"><img src="<?= base_url()?>theme/images/user.svg" alt=""></div>
										<div ><a href="<?=base_url()?>register">Register</a></div>
										<div><a href="#" id="cb" onclick="check()">Sign In</a></div>
									</div>

								<?php }else {?>
									<div class="top_bar_user">
										<div class="user_icon"><img src="<?= base_url()?>theme/images/user.svg" alt=""></div>
										<div class="dropdown"><a class="dropbtn">Hai, <?php $full_name = $this->db->where('user_id', $this->session->userdata('user_id'))->get('users')->row()->full_name;
										if ($full_name == NULL) {
											echo $this->db->where('user_id', $this->session->userdata('user_id'))->get('users')->row()->email;
										}else {
											echo $full_name;
										}?></a>
											<?php if ($this->session->userdata('user_role') == 'admin' || $this->session->userdata('user_role') == 'employe') {?>
											<div class="dropdown-content">
												<a href="<?=base_url()?>admin">Dashboard</a>
												<a href="<?=base_url()?>logout">Logout</a>
											</div>
										<?php }elseif ($this->session->userdata('user_role') == 'user'){ ?>
											<div class="dropdown-content">
												<a href="#">Profile</a>
												<a href="<?=base_url()?>logout">Logout</a>
											</div>
										<?php } ?>
										</div>
									</div>
								<?php  }  ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
			if(validation_errors()){
			 ?>
			 <div class="message">
	 				<?php echo validation_errors(); ?>
			</div>
			 <?php
			}

	 if($this->session->flashdata('message')){
		?>
		<div class="message">
				<?php echo $this->session->flashdata('message'); ?>
		</div>
		<?php
	 }
		 ?>

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="<?= base_url() ?>"><img src="<?= base_url()?>theme/images/Logo.png" alt=""></a></div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form action="#" class="header_search_form clearfix" id="displayvalue" method="post">
										<input type="text" required="required" class="header_search_input" placeholder="Search for products..." id="searchtext">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc" id="category_value">All Categories <i class="fas fa-chevron-down"></i></span>
												<ul class="custom_list clc" id="category">
													<?php
													$query=$this->db->get('category');
													foreach ($query->result_array() as $cat):
														$cat_name=$cat['category_name'];
									          ?>

														<li><a class="clc"><?php echo $cat_name; ?></a></li>
													<?php endforeach; ?>
												</ul>
											</div>
										</div>
										<button id="searchbtn" type="submit" class="header_search_button trans_300" value="Submit"><img src="<?= base_url()?>theme/images/search.png" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							<div class="wishlist d-flex flex-row align-items-center justify-content-end">
								<div class="wishlist_icon"><img src="<?= base_url()?>theme/images/heart.png" alt=""></div>
								<div class="wishlist_content">
									<div class="wishlist_text"><a href="#">Wishlist</a></div>
									<div class="wishlist_count">115</div>
								</div>
							</div>

							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<img src="<?= base_url()?>theme/images/cart.png" alt="">
										<div class="cart_count"><span><?=$this->db->where('user_id', $this->session->userdata('user_id'))->get('cart')->num_rows()?></span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="<?=base_url()?>cart">Cart</a></div>
										<div class="cart_price">Rp. <?=number_format($this->db->select_sum('cart_product_total_price')->where('user_id', $this->session->userdata('user_id'))->get('cart')->row()->cart_product_total_price, 0, ",", ".");?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main Navigation -->

		<nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col">

						<div class="main_nav_content d-flex flex-row">

							<!-- Categories Menu -->

							<div class="cat_menu_container">
								<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
									<div class="cat_burger"><span></span><span></span><span></span></div>
									<div class="cat_menu_text">categories</div>
								</div>

								<ul class="cat_menu">
									<?php
									$query=$this->db->get('category');
									foreach ($query->result_array() as $cat):
										$cat_name=$cat['category_name'];
										?>
									<li><a href="<?= base_url()?>search/searchproduct/<?=$cat_name?>"><?php echo $cat_name;?> <i class="fas fa-chevron-right ml-auto"></i></a></li>
									<?php endforeach; ?>
								</ul>
							</div>

							<!-- Menu Trigger -->

							<div class="menu_trigger_container ml-auto">
								<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
									<div class="menu_burger">
										<div class="menu_trigger_text">menu</div>
										<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</nav>

		<!-- Menu -->

		<div class="page_menu">
			<div class="container">
				<div class="row">
					<div class="col">

						<div class="page_menu_content">

							<div class="page_menu_search">
								<form action="#" id="searchmobileform" method="post">
									<input type="text" required="required" class="page_menu_search_input" placeholder="Search for products..." id="searchmobile">
								</form>
							</div>
							<ul class="page_menu_nav">
								<?php if ($this->session->userdata('user_logged') == null) { ?>
									<li class="page_menu_item"><a href="<?=base_url()?>register">Register<i class="fa fa-angle-down"></i></a></li>
									<li class="page_menu_item"><a href="#" onclick="check()">Sign In</a></li>
								<?php }else {?>
										<?php if ($this->session->userdata('user_role') == 'admin' || $this->session->userdata('user_role') == 'employe') {?>
											<li class="page_menu_item"><a href="<?=base_url()?>admin">Dashboard<i class="fas fa-chevron-down"></i></a></li>
											<li class="page_menu_item"><a href="<?=base_url()?>logout">Logout<i class="fas fa-chevron-down"></i></a></li>
										<?php }elseif ($this->session->userdata('user_role') == 'user') {?>
											<li class="page_menu_item"><a href="#">Profile<i class="fas fa-chevron-down"></i></a></li>
											<li class="page_menu_item"><a href="<?=base_url()?>logout">Logout<i class="fas fa-chevron-down"></i></a></li>
										<?php } ?>
								<?php } ?>
							</ul>

							<div class="menu_contact">
								<div class="menu_contact_item"><div class="menu_contact_icon"><img src="<?= base_url()?>theme/images/phone_white.png" alt=""></div><a href="tel:+62000000000000">+62 0000 0000 000</a></div>
								<div class="menu_contact_item"><div class="menu_contact_icon"><img src="<?= base_url()?>theme/images/mail_white.png" alt=""></div><a href="mailto:costomer-care@tokorakyat.com">costomer-care@tokorakyat.com</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="center">
	      <input type="checkbox" id="show" style="display:none">
	  <div class="container-login">
	    <label for="show" class="close-btn fas fa-times" title="close"></label>
	    <div class="text">
	  Login Form</div>
	  <form action="<?= site_url('login');?>" method="post">
	      <div class="data">
	        <label>Email</label>
	        <input type="email" name="email" required>
	      </div>
	  <div class="data">
	        <label>Password</label>
	        <input type="password" name="password" required>
	      </div>
	  <div class="forgot-pass">
	  <a href="#">Forgot Password?</a></div>
	  <div class="btn">
	        <div class="inner">
	  </div>
	  <button type="submit">login</button>
	      </div>
	  <div class="signup-link">
	  Not a member? <a href="#">Signup now</a></div>
	  </form>
	  </div>
	  </div>

	</header>
