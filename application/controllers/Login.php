<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
        $this->load->model('notif_model');
        if ($this->session->userdata('user_role') == 'admin' || $this->session->userdata('user_role') == 'employe') {
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
              if ($this->session->userdata('user_role') == 'admin' || $this->session->userdata('user_role') == 'employe' || $this->session->userdata('user_role') == 'user') {
                redirect(base_url());
              }
            }else {
              redirect(base_url());
            }
        }else {
          redirect(base_url());
        }
      }
    }
  }
