<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('home_model');
	}

	public function index()
	{
		$x['dotw']=$this->home_model->getDotw();
		$x['product_featured']=$this->home_model->getProduct_featured();
		$x['hot_new_arrivals']=$this->home_model->getHot_new_arrivals();
		$x['big_hot_new_arrivals']=$this->home_model->getBig_hot_new_arrivals();
		$this->load->template('home',$x);
	}
}
