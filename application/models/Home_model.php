<?php

class Home_model extends CI_Model
{
  public function getCategori()
  {
    $query = $this->db->get('category');
    return $query;
  }

  public function getDotw()
  {
    $this->db->select('*');
    $this->db->from('dotw');
    $this->db->join('product', 'product.product_id = dotw.product_id');
    $this->db->join('category', 'category.category_id = product.category_id');
    $query = $this->db->get();
    return $query;
  }

  public function getProduct_featured()
  {
    $this->db->select('*');
    $this->db->from('product');
    $this->db->order_by('product_created_at', 'DESC');
    $this->db->limit(16);
    $query = $this->db->get();
    return $query;
  }

  public function getHot_new_arrivals()
  {
    $this->db->select('*');
    $this->db->from('product');
    $this->db->order_by('product_created_at', 'DESC');
    $this->db->limit(21);
    $query = $this->db->get();
    return $query;
  }

  public function getBig_hot_new_arrivals()
  {
    $this->db->select('*');
    $this->db->from('product');
    $this->db->join('category', 'category.category_id = product.category_id');
    $this->db->order_by('product_created_at', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get();
    return $query;
  }

}
