<?php

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
        $this->load->model('mail_model');
        $this->load->model('notif_model');
        if ($this->session->userdata('user_role') == 'admin' || $this->session->userdata('user_role') == 'employe') {
          redirect('admin');
        }elseif ($this->session->userdata('user_role') == 'user') {
          redirect(base_url());
        }
    }

    public function index()
    {
      if ($this->input->post()) {

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->form_validation->set_error_delimiters('<div class="white notification notification-danger">', '</div>');

        $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[7]|max_length[30]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
          $this->load->template('register');
        }
        else{
          if (!$this->user_model->email_exists($email)) {

            $random = md5(rand());
            $code = substr($random, 0, 50);

            $user['email'] = $email;
            $user['password'] = password_hash($password, PASSWORD_DEFAULT);
            $user['token'] = $code;
            $id = $this->user_model->insert($user);
            $data = array('id'    => $id,
                          'email' => $email,
                          'code'  => $code);
            $body = $this->load->view('mail/verified',$data,TRUE);
            $message = "Activation code sent to email";
            $subject = 'Signup Verification Email';
            $this->mail_model->send_email($email, $body, $subject);
            $this->notif_model->notif_success($message);
            redirect('register');
          }else {
            $this->notif_model->notif_danger("The email address $email already exists. Please signin.");
            redirect('register');
          }
        }
    }else {
      $this->load->template('register');
    }
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
      $this->notif_model->notif_success("User activated successfully");
     }
     else{
      $this->notif_model->notif_danger("Something went wrong in activating account");
     }
    }
    else{
     $this->notif_model->notif_danger("Cannot activate account. Code didnt match");
    }
    redirect(base_url());
   }
}
