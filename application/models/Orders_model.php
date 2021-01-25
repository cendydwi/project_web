<?php

class Orders_model extends CI_Model
{

  public function getCart($user_id)
  {
    $this->db->where('user_id', $user_id);
    $query = $this->db->get('cart');
    return $query;
  }

  public function addOrder($order)
  {
    $this->db->insert('orders', $order);
    return $this->db->insert_id();
  }

  public function addDetailorders($order)
  {
    $this->db->insert('orders_details', $order);
  }

  public function clearCart($user_id)
  {
    $this->db->where('user_id', $user_id)->delete('cart');
  }

}
