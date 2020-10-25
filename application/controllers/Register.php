<?php

class Register extends CI_Controller
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
      if ($this->input->post()) {
        //get user inputs
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[7]|max_length[30]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
          $this->load->view('register');
        }
        else{
          if (!$this->user_model->email_exists($email)) {
            //generate simple random code
            $random = md5(rand());
            $code = substr($random, 0, 50);

            //insert user to users table and get id
            $user['email'] = $email;
            $user['password'] = password_hash($password, PASSWORD_DEFAULT);
            $user['token'] = $code;
            $id = $this->user_model->insert($user);

            //set up email
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
            $this->email->subject('Signup Verification Email');
            $data = array('id'     => $id,
                          'code'  => $code);
            $body = $this->load->view('mail/verified.php',$data,TRUE);
            $this->email->message($body);

            //sending email
            if($this->email->send()){
              $this->session->set_flashdata('message','Activation code sent to email');
            }
            else{
              $this->session->set_flashdata('message', $this->email->print_debugger());

            }

            redirect('register');
          }else {
            $this->session->set_flashdata("message", "The email address $email already exists in the database. Please signin.");
            redirect('register');
          }
        }
    }
    $this->load->view('header');
    $this->load->view('register');

   }

   public function activate(){
    $id =  $this->uri->segment(3);
    $code = $this->uri->segment(4);

    //fetch user details
    $user = $this->user_model->getUser($id);

    //if code matches
    if($user['token'] == $code){
     //update user active status
     $data = array('is_active' => 1,
                    'token'    => '');
     $query = $this->user_model->activate($data, $id);

     if($query){
      $this->session->set_flashdata('message', 'User activated successfully');
      redirect('login');
     }
     else{
      $this->session->set_flashdata('message', 'Something went wrong in activating account');
     }
    }
    else{
     $this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
    }

    redirect('register');

   }
}
