<?php

class Cart_model extends CI_Model
{
  public function getCart($user_id)
  {
    $this->db->where('user_id', $user_id);
    $this->db->join('product', 'product.product_id = cart.product_id');
    $query = $this->db->get('cart');
    return $query;
  }

  public function addCart($data)
  {
    $this->db->insert('cart', $data);
  }

  public function delCart($cart_id)
  {
    $this->db->where('cart_id', $cart_id)->delete('cart');
  }

  public function clearCart($user_id)
  {
    $this->db->where('user_id', $user_id)->delete('cart');
  }

}
