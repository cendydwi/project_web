<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_role') == 'user') {
            redirect(base_url());
          }
    }

    public function index()
    {
      $this->load->view("admin/index.php");
    }
}
