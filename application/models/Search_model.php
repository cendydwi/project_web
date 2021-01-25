<?php

class Search_model extends CI_Model
{
  public function getCategory()
  {
    $query = $this->db->get('category');
    return $query;
  }

  public function getId($cat_name)
  {
    $this->db->where('category.category_name', $cat_name);
    $query = $this->db->get('category');
    foreach ($query->result() as $row)
      {
        return $row->category_id;
      }
  }

  public function getlistProduct($cat_id, $cat_name, $number, $offset)
  {
    $query = $this->db->where('category_id', $cat_id)->like('product_name', $cat_name)->get('product', $number, $offset);
    return $query;
  }

  public function getCountoflistProduct($cat_id, $cat_name)
  {
    $query = $this->db->where('category_id', $cat_id)->like('product_name', $cat_name)->get('product')->num_rows();
    return $query;
  }

  public function getlistProductAllcategories($cat_name, $number, $offset)
  {
    $query = $this->db->like('product_name', $cat_name)->get('product', $number, $offset);
    return $query;
  }

  public function getCountoflistProductAllcategories($cat_name)
  {
    $query = $this->db->like('product_name', $cat_name)->get('product')->num_rows();
    return $query;
  }
}
