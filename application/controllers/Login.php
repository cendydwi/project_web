<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
        if ($this->session->userdata('user_role') == 'admin') {
          redirect('admin');
        }elseif ($this->session->userdata('user_role') == 'user') {
          redirect(base_url());
        }
    }

    public function index()
    {
      if ($this->session->userdata('user_logged') == null) {
        if($this->input->post()){
            if($this->user_model->doLogin()){
              if ($this->session->userdata('user_role') == 'admin') {
                redirect('admin');
              }elseif ($this->session->userdata('user_role') == 'user') {
                redirect(base_url());
              }
            }
        }
        $this->load->view('header');
        $this->load->view('login');
      }
    }
  }
