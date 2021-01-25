<?php

class Notif_model extends CI_Model
{
  public function notif_success($message)
  {
    $this->session->set_flashdata("message","<div class='notification notification-success'>$message</div>");
  }

  public function notif_danger($message)
  {
    $this->session->set_flashdata("message","<div class='notification notification-danger'>$message</div>");
  }

  public function notif_info($message)
  {
    $this->session->set_flashdata("message","<div class='notification notification-info'>$message</div>");
  }

}
