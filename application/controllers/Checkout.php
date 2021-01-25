<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('orders_model');
			$this->load->model('notif_model');
	}

	public function index()
	{
		if ($this->session->userdata('user_id') == NULL) {
			$this->notif_model->notif_danger("You Must Be Sign In");
			redirect(base_url());
		}else {
			$user_id = $this->session->userdata('user_id');
			$orders_price = $this->input->post('total_price');

			$data = array('orders_price' => $orders_price,
										'user_id'			=> $user_id);
			$order_id = $this->orders_model->addOrder($data);

			$query = $this->orders_model->getCart($user_id);
			foreach ($query->result_array() as $cart) {
				$prod_id = $cart['product_id'];
				$order_quant = $cart['cart_product_quantity'];
				$order_total_price = $cart['cart_product_total_price'];

				$data = array('orders_id' => $order_id,
			 								'product_id' => $prod_id,
											'orders_quantity'	=> $order_quant,
											'orders_total_price'	=> $order_total_price);
				$this->orders_model->addDetailorders($data);
			}
			$this->orders_model->clearCart($user_id);
			redirect(base_url());
		}
	}
}
