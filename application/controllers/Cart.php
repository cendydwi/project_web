<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('cart_model');
			$this->load->model('notif_model');
	}

	public function index()
	{
		$x['cart'] = $this->cart_model->getCart($this->session->userdata('user_id'));
		$this->load->template('cart', $x);
	}

	public function addcart()
	{
		if ($this->session->userdata('user_id') == NULL) {
			$this->notif_model->notif_danger("You Must Be Sign In");
			redirect(base_url());
		}else {
			$prod_id = $this->input->post('prod_id');
			$prod_quant = $this->input->post('prod_quantity');
			$prod_price = $this->input->post('prod_price');
			$user_id = $this->session->userdata('user_id');
			$prod_total_price = $prod_quant * $prod_price;

			$data = array('user_id' => $user_id,
		 								'product_id' => $prod_id,
										'cart_product_quantity' => $prod_quant,
										'cart_product_price' => $prod_price,
										'cart_product_total_price' => $prod_total_price);

			$this->cart_model->addcart($data);
			redirect('cart');
		}
	}

	public function delcart()
	{
		if ($this->session->userdata('user_id') == NULL) {
			$this->notif_model->notif_danger("You Must Be Sign In");
			redirect(base_url());
		}else {
			$cart_id = $this->input->post('cart_id');
			$this->cart_model->delcart($cart_id);
			redirect('cart');
		}
	}

	public function clearcart()
	{
		if ($this->session->userdata('user_id') == NULL) {
			$this->notif_model->notif_danger("You Must Be Sign In");
			redirect(base_url());
		}else {
			$cart_id = $this->session->userdata('user_id');
			$this->cart_model->clearcart($cart_id);
			redirect('cart');
		}
	}
}
