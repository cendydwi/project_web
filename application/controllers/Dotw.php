<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dotw extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('product_model');
			$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->template('dotw');
	}
	public function details()
	{
		$id=$this->uri->segment(3);
		if ($id != NULL) {
			$x['dotw'] = $this->product_model->getDotw_details($id);
			$this->load->template('dotw', $x);
		}else {
			$this->load->template('dotw');
		}
	}
}
