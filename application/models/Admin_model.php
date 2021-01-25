<?php

class Admin_model extends CI_Model
{
  //CATEGORY
  public function getCategori()
  {
    $query = $this->db->get('category');
    return $query;
  }

  public function addcategory($category)
  {
    $this->db->insert('category', $category);
    return $this->db->insert_id();
  }

  public function edtcategory($data, $id)
  {
    $this->db->where('category.category_id', $id);
    return $this->db->update('category', $data);
  }

  public function delcategory($id)
  {
    $this->db->where('category.category_id', $id);
    return $this->db->delete('category');
  }

  //PRODUCT
  public function getproduct()
  {
    $this->db->select('*');
    $this->db->from('product');
    $this->db->join('category', 'category.category_id = product.category_id');
    $query = $this->db->get();
    return $query;
  }

  public function delproduct($id)
  {
    $this->db->where('product.product_id', $id);
    return $this->db->delete('product');
  }

  public function addproduct($product)
  {
    $this->db->insert('product', $product);
    return $this->db->insert_id();
  }

  public function edtproduct($data, $id){
    $this->db->where('product.product_id', $id);
    return $this->db->update('product', $data);
  }

  public function getproductbyid($id)
  {
    $query = $this->db->get_where('product', ['product_id' => $id]);
    return $query;
  }

  public function getnewestproduct()
  {
    $this->db->select('*');
    $this->db->from('product');
    $this->db->order_by('product_created_at', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get();
    return $query;
  }

  //DEALS OF THE WEEKS
  public function getdotw()
  {
    $this->db->select('*');
    $this->db->from('dotw');
    $this->db->join('product', 'product.product_id = dotw.product_id');
    $query = $this->db->get();
    return $query;
  }

  public function adddotw($dotw)
  {
    $this->db->insert('dotw', $dotw);
    return $this->db->insert_id();
  }

  public function deldotw($id)
  {
    $this->db->where('dotw.dotw_id', $id);
    return $this->db->delete('dotw');
  }

  public function deldotwbyproduct($id)
  {
    $this->db->where('dotw.product_id', $id);
    return $this->db->delete('dotw');
  }

  public function edtdotw($data, $id){
    $this->db->where('dotw.dotw_id', $id);
    return $this->db->update('dotw', $data);
  }

  //USER
  public function getorders()
  {
    $this->db->join('users', 'users.user_id = orders.user_id');
    $query = $this->db->get('orders');
    return $query;
  }

  public function getordersbyid($id)
  {
    $this->db->where('orders_id', $id);
    $this->db->join('users', 'users.user_id = orders.user_id');
    $query = $this->db->get('orders');
    return $query;
  }

  public function getdetailsordersbyid($id)
  {
    $this->db->where('orders_id', $id);
    $this->db->join('product', 'product.product_id = orders_details.product_id');
    $query = $this->db->get('orders_details');
    return $query;
  }

  //USER
  public function getuser()
  {
    $query = $this->db->get('users');
    return $query;
  }

  public function edtuser($data, $id){
    $this->db->where('users.user_id', $id);
    return $this->db->update('users', $data);
  }

  public function deluser($id)
  {
    $this->db->where('users.user_id', $id);
    return $this->db->delete('users');
  }

  //PROFILE
  public function getprofile($id)
  {
    $this->db->where('user_id', $id);
    $query = $this->db->get('users');
    return $query;
  }

  public function updateProfile($data, $id)
  {
    $this->db->where('user_id', $id);
    return $this->db->update('users', $data);
  }

  //APPLICATION
  public function edtApp($data)
  {
    $this->db->set('value', $data['system_name'])->where('key', 'system_name');
    $this->db->update('settings');
    $this->db->set('value', $data['system_name'])->where('key', 'system_title');
    $this->db->update('settings');
    $this->db->set('value', $data['system_email'])->where('key', 'system_email');
    $this->db->update('settings');
    $this->db->set('value', $data['address'])->where('key', 'address');
    $this->db->update('settings');
    $this->db->set('value', $data['phone'])->where('key', 'phone');
    $this->db->update('settings');
    $this->db->set('value', $data['website_description'])->where('key', 'website_description');
    $this->db->update('settings');
    $this->db->set('value', $data['website_keywords'])->where('key', 'website_keywords');
    $this->db->update('settings');
  }

  public function edtSMTP($data)
  {
    $this->db->set('value', $data['protocol'])->where('key', 'protocol');
    $this->db->update('settings');
    $this->db->set('value', $data['host'])->where('key', 'smtp_host');
    $this->db->update('settings');
    $this->db->set('value', $data['port'])->where('key', 'smtp_port');
    $this->db->update('settings');
    $this->db->set('value', $data['user'])->where('key', 'smtp_user');
    $this->db->update('settings');
    $this->db->set('value', $data['pass'])->where('key', 'smtp_pass');
    $this->db->update('settings');
  }

}
