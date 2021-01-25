<?php

class Mail_model extends CI_Model
{
    public function send_email($email, $body, $subject)
    {
      $config = array(
        'protocol' => $this->db->get_where('settings' , array('key' => 'protocol'))->row()->value,
        'smtp_host' => $this->db->get_where('settings' , array('key' => 'smtp_host'))->row()->value,
        'smtp_port' => $this->db->get_where('settings' , array('key' => 'smtp_port'))->row()->value,
        'smtp_user' => $this->db->get_where('settings' , array('key' => 'smtp_user'))->row()->value,
        'smtp_pass' => $this->db->get_where('settings' , array('key' => 'smtp_pass'))->row()->value,
        'smtp_username' => $this->db->get_where('settings' , array('key' => 'system_name'))->row()->value,
        'mailtype' => 'html',
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
      );

      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from($config['smtp_user'], $config['smtp_username']);
      $this->email->to($email);
      $this->email->subject($subject);
      $this->email->message($body);

      if(!$this->email->send()){
        $this->session->set_flashdata('message', $this->email->print_debugger());
      }
    }

}
