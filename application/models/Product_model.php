<?php

class Product_model extends CI_Model
{
  public function getProduct_details($id)
  {
    $this->db->where('product.product_id', $id);
    $this->db->join('category', 'category.category_id = product.category_id');
    $query=$this->db->get('product');
    return $query;
  }

  public function getDotw_details($id)
  {
    $this->db->where('dotw_id', $id);
    $this->db->join('product', 'product.product_id = dotw.product_id');
    $this->db->join('category', 'category.category_id = product.category_id');
    $query=$this->db->get('dotw');
    return $query;
  }
}
