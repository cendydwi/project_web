<?php

class Forgot extends CI_Controller
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
      $email = $this->input->post('email');
      if($this->input->post()){
        if (!$this->user_model->email_exists($email)) {
          $this->session->set_flashdata('message', 'Email Not Registered');
          redirect('login');
        }else {
          $random = md5(rand());
          $code = substr($random, 0, 50);
          $getEmail = $this->user_model->getEmail($email);
          $id = $getEmail['user_id'];
          $data['token'] = $code;
          $this->user_model->setForgotToken($data, $email);

          $config = array(
            'protocol' => $this->config->item('MAIL_MAILER'),
            'smtp_host' => $this->config->item('MAIL_HOST'),
            'smtp_port' => $this->config->item('MAIL_PORT'),
            'smtp_user' => $this->config->item('MAIL_USERNAME'),
            'smtp_pass' => $this->config->item('MAIL_PASSWORD'),
            'smtp_username' => $this->config->item(MAIL_NAME''),
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
          );

          $this->load->library('email', $config);
          $this->email->set_newline("\r\n");
          $this->email->from($config['smtp_user'], $config['smtp_username']);
          $this->email->to($email);
          $this->email->subject('Forgot Password');
          $data = array('id'     => $id,
                        'code'  => $code);
          $body = $this->load->view('mail/reset.php',$data,TRUE);
          $this->email->message($body);

          //sending email
          if($this->email->send()){
            $this->session->set_flashdata('message','Activation code sent to email');
          }
          else{
            $this->session->set_flashdata('message', $this->email->print_debugger());

          }
          redirect('login');
        }
      }
      $this->load->view('header');
      $this->load->view('forgot');
    }

    public function reset()
    {
      $id =  $this->uri->segment(3);
      $code = $this->uri->segment(4);
      $getPassword = $this->input->post('password');
      $password = password_hash($getPassword, PASSWORD_DEFAULT);
      $this->form_validation->set_rules('password', 'Password', 'required|min_length[7]|max_length[30]');
      $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');

      if ($this->form_validation->run() == FALSE) {
        $user = $this->user_model->getUser($id);
        if($user['token'] == $code){
          $this->load->view('header');
          $data = array('id'     => $id,
                        'code'  => $code);
          $this->load->view('resetpassword',$data);
        }
      }else {
        if($this->input->post()){
          $data = array('password' => $password,
                        'token'    => '');
          $query = $this->user_model->reset($data, $id);
          if($query){
            $this->session->set_flashdata('message', 'Password Was Reset');
            redirect('login');
          }
          else{
            $this->session->set_flashdata('message', 'Something went wrong in reset password');
          }
        }
      }

      //fetch user details
      $user = $this->user_model->getUser($id);

      //if code matches
      if($user['token'] == $code){
        $this->load->view('header');
        $data = array('id'     => $id,
                      'code'  => $code);
        $this->load->view('resetpassword',$data);
      }
    }
  }
