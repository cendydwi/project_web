<?php

class User_model extends CI_Model
{
    private $_table = "users";

    public function doLogin(){
		$post = $this->input->post();

        $this->db->where('email', $post["email"]);
        $user = $this->db->get($this->_table)->row();

        if($user){
            $isPasswordTrue = password_verify($post["password"], $user->password);
            $isAdmin = $user->role == "admin";
            $isUser = $user->role == "user";
            $isActive = $user->is_active == 1;
            if ($isPasswordTrue) {
              if ($isActive) {
                if($isAdmin){
                    $this->session->set_userdata(['user_logged' => $user]);
                    $this->session->set_userdata(['user_role' => 'admin']);
                    $this->_updateLastLogin($user->user_id);
                    return true;
                }elseif ($isUser) {
                    $this->session->set_userdata(['user_logged' => $user]);
                    $this->session->set_userdata(['user_role' => 'user']);
                    $this->_updateLastLogin($user->user_id);
                    return true;
                }
              }
            }
            return false;
        }
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    private function _updateLastLogin($user_id){
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE user_id={$user_id}";
        $this->db->query($sql);
    }

    public function email_exists($email)
    {
      $sql = $this->db->get_where('users', ['email' => $email]);
      return $sql->num_rows() > 0;
    }

    public function insert($user){
      $this->db->insert('users', $user);
      return $this->db->insert_id();
    }

    public function getUser($id){
      $sql = $this->db->get_where('users',array('user_id'=>$id));
      return $sql->row_array();
    }

    public function activate($data, $id){
      $this->db->where('users.user_id', $id);
      return $this->db->update('users', $data);
    }

    public function setForgotToken($data, $email){
      $this->db->where('users.email', $email);
      return $this->db->update('users', $data);
    }

    public function getEmail($email){
      $sql = $this->db->get_where('users',array('email'=>$email));
      return $sql->row_array();
    }

    public function reset($data, $id){
      $this->db->where('users.user_id', $id);
      return $this->db->update('users', $data);
    }

}
