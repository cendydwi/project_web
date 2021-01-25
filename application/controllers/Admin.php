<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('notif_model');
        if ($this->session->userdata('user_name') == NULL) {
          redirect(base_url());
        }else {
          if ($this->session->userdata('user_role') == 'user') {
            redirect(base_url());
          }
        }
    }

    public function index()
    {
      $x['product']=$this->admin_model->getproduct();
      $x['users']=$this->admin_model->getuser();
      $x['orders']=$this->admin_model->getorders();
      $x['new_product']=$this->admin_model->getnewestproduct();
      $this->load->admintemplate("admin/home", $x);
    }
    public function category()
    {
      $url = $this->uri->segment(3);
      if ($url == NULL) {
  		    $x['category']=$this->admin_model->getCategori();
          $this->load->admintemplate("admin/category", $x);
        }elseif($url == 'add') {
          $cat_name = $this->input->post('cat_name');
          $category['category_name'] = $cat_name;
          $this->notif_model->notif_success("Category Has Been Added");
          $this->admin_model->addcategory($category);
          redirect('admin/category');
        }elseif($url == 'edit') {
          $cat_id = $this->input->post('edt_cat_id');
          $cat_name = $this->input->post('edt_cat_name');
          $data = array('category_name' => $cat_name );
          $this->notif_model->notif_success("Product Has Been Edited");
          $this->admin_model->edtcategory($data, $cat_id);
          redirect('admin/category');
        }elseif($url == 'delete') {
          $cat_id = $this->input->post('del_cat_id');
          $this->admin_model->delcategory($cat_id);
          $this->notif_model->notif_success("Category Has Been Deleted");
          redirect('admin/category');
        }
    }
    public function product()
    {
      $url = $this->uri->segment(3);
      if ($url == NULL) {
  		  $x['product']=$this->admin_model->getproduct();
        $this->load->admintemplate("admin/product", $x);
      }elseif ($url == 'form_product') {
  		  $x['category']=$this->admin_model->getCategori();
        $this->load->admintemplate("admin/form_product", $x);
      }elseif ($url == 'delete') {
        $prod_id = $this->input->post('del_prod_id');
        $this->notif_model->notif_success("Product Has Been Deleted");
        $data['product'] = $this->admin_model->getproductbyid($prod_id);
        foreach ($data['product']->result_array() as $prod) {
          $prod_img_1 = $prod['product_image_1'];
          $prod_img_2 = $prod['product_image_2'];
          $prod_img_3 = $prod['product_image_3'];
          unlink('./theme/images/prod_img/'.$prod_img_1);
          unlink('./theme/images/prod_img/'.$prod_img_2);
          unlink('./theme/images/prod_img/'.$prod_img_3);
        }
        $this->admin_model->delproduct($prod_id);
        $this->admin_model->deldotwbyproduct($prod_id);
        redirect('admin/product');
      }elseif ($url == 'add') {
        $prod_name=$this->input->post('prod_name');
        $prod_cat=$this->input->post('prod_cat');
        $prod_desc=$this->input->post('prod_desc');
        $prod_quant=$this->input->post('prod_quant');
        $prod_price=$this->input->post('prod_price');

        $product = array('product_name' => $prod_name,
                          'product_desc' => $prod_desc,
                          'product_quantity' => $prod_quant,
                          'product_price' => $prod_price,
                          'category_id' => $prod_cat);

        $prod_id=$this->admin_model->addproduct($product);

        //IMG CONFIG IMG 1
        if(!empty($_FILES['image-1']['name'])){
          $config['upload_path']          = './theme/images/prod_img/';
          $config['allowed_types']        = 'jpg';
          $config['overwrite']            = TRUE;
          $config['file_name']            = $prod_id.'-'.$prod_cat.'-img-1';

          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          if (!$this->upload->do_upload('image-1')) {
            $this->notif_model->notif_danger("Error Upload Image 1 Because ".$this->upload->display_errors());
            redirect('admin/product');
          }else {
            $prod_img_1 = $this->upload->data('orig_name');
          }
        }

        //IMG CONFIG IMG 2
        if(!empty($_FILES['image-2']['name'])){
          $config['upload_path']          = './theme/images/prod_img/';
          $config['allowed_types']        = 'jpg';
          $config['overwrite']            = TRUE;
          $config['file_name']            = $prod_id.'-'.$prod_cat.'-img-2';

          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          if (!$this->upload->do_upload('image-2')) {
            $this->notif_model->notif_danger("Error Upload Image 2 Because ".$this->upload->display_errors());
            redirect('admin/product');
          }else {
            $prod_img_2 = $this->upload->data('orig_name');
          }
        }

        //IMG CONFIG IMG 3
        if(!empty($_FILES['image-3']['name'])){
          $config['upload_path']          = './theme/images/prod_img/';
          $config['allowed_types']        = 'jpg';
          $config['overwrite']            = TRUE;
          $config['file_name']            = $prod_id.'-'.$prod_cat.'-img-3';

          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          if (!$this->upload->do_upload('image-3')) {
            $this->notif_model->notif_danger("Error Upload Image 3 Because ".$this->upload->display_errors());
            redirect('admin/product');
          }else {
            $prod_img_3 = $this->upload->data('orig_name');
          }
        }

        $data = array('product_image_1' => $prod_img_1,
                      'product_image_2' => $prod_img_2,
                      'product_image_3' => $prod_img_3);

        $this->admin_model->edtproduct($data, $prod_id);
        $this->notif_model->notif_success("Product Has Been Added");
        redirect('admin/product');
        // redirect('admin/product');
      }elseif ($url == 'form_edit_product') {
        $id = $this->uri->segment(4);
        $x['product']=$this->admin_model->getproductbyid($id);
    		$x['category']=$this->admin_model->getCategori();
        $this->load->admintemplate('admin/form_edit_product', $x);
      }elseif ($url == 'update') {
        $prod_id=$this->input->post('prod_id');
        $prod_name=$this->input->post('prod_name');
        $prod_cat=$this->input->post('prod_cat');
        $prod_desc=$this->input->post('prod_desc');
        $prod_quant=$this->input->post('prod_quant');
        $prod_price=$this->input->post('prod_price');

        //IMG CONFIG IMG 1
        if(!empty($_FILES['image-1']['name'])){
          $config['upload_path']          = './theme/images/prod_img/';
          $config['allowed_types']        = 'jpg';
          $config['overwrite']            = TRUE;
          $config['file_name']            = $prod_id.'-'.$prod_cat.'-img-1';

          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          if (!$this->upload->do_upload('image-1')) {
            $this->notif_model->notif_danger("Error Upload Image 1 Because ".$this->upload->display_errors());
            redirect('admin/product');
          }else {
            $prod_img_1 = $this->upload->data('orig_name');
          }
        }else {
          $prod_img_1 = $this->input->post('image-1-old');
        }

        //IMG CONFIG IMG 2
        if(!empty($_FILES['image-2']['name'])){
          $config['upload_path']          = './theme/images/prod_img/';
          $config['allowed_types']        = 'jpg';
          $config['overwrite']            = TRUE;
          $config['file_name']            = $prod_id.'-'.$prod_cat.'-img-2';

          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          if (!$this->upload->do_upload('image-2')) {
            $this->notif_model->notif_danger("Error Upload Image 2 Because ".$this->upload->display_errors());
            redirect('admin/product');
          }else {
            $prod_img_2 = $this->upload->data('orig_name');
          }
        }else {
          $prod_img_2 = $this->input->post('image-2-old');
        }

        //IMG CONFIG IMG 3
        if(!empty($_FILES['image-3']['name'])){
          $config['upload_path']          = './theme/images/prod_img/';
          $config['allowed_types']        = 'jpg';
          $config['overwrite']            = TRUE;
          $config['file_name']            = $prod_id.'-'.$prod_cat.'-img-3';

          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          if (!$this->upload->do_upload('image-3')) {
            $this->notif_model->notif_danger("Error Upload Image 3 Because ".$this->upload->display_errors());
            redirect('admin/product');
          }else {
            $prod_img_3 = $this->upload->data('orig_name');
          }
        }else {
          $prod_img_3 = $this->input->post('image-3-old');
        }

        $data = array('product_name' => $prod_name,
                      'product_desc' => $prod_desc,
                      'product_quantity' => $prod_quant,
                      'product_price' => $prod_price,
                      'product_image_1' => $prod_img_1,
                      'product_image_2' => $prod_img_2,
                      'product_image_3' => $prod_img_3,
                      'category_id' => $prod_cat);

        $this->admin_model->edtproduct($data, $prod_id);

        $this->notif_model->notif_success("Product Has Been Edited");
        redirect('admin/product');
      }
    }
    public function dotw()
    {
      $url = $this->uri->segment(3);
      if ($url == NULL) {
        $x['product']=$this->admin_model->getproduct();
        $x['dotw']=$this->admin_model->getdotw();
        $this->load->admintemplate("admin/dotw",$x);
      }elseif ($url == 'add') {
        $dotw_prod=$this->input->post('dotw_prod');
        $dotw_expired=$this->input->post('dotw_expired');
        $dotw_price=$this->input->post('dotw_price');

        $dotw = array('product_id' => $dotw_prod,
                      'dotw_expired' => $dotw_expired,
                      'dotw_price' => $dotw_price);

        $this->admin_model->adddotw($dotw);

        $this->notif_model->notif_success("DOTW Has Been Added");
        redirect('admin/dotw');
      }elseif ($url == 'delete') {
        $dotw_id = $this->input->post('del_dotw_id');
        $this->notif_model->notif_success("DOTW Has Been Deleted");
        $this->admin_model->deldotw($dotw_id);
        redirect('admin/dotw');
      }elseif ($url == 'edit') {
        $dotw_id = $this->input->post('dotw_id');
        $dotw_prod = $this->input->post('dotw_prod');
        $dotw_expired = $this->input->post('dotw_expired');
        $dotw_price = $this->input->post('dotw_price');

        $data = array('product_id' => $dotw_prod,
                      'dotw_expired' => $dotw_expired,
                      'dotw_price' => $dotw_price);

        $this->notif_model->notif_success("DOTW Has Been Edited");
        $this->admin_model->edtdotw($data, $dotw_id);
        redirect('admin/dotw');
      }
    }
    public function order()
    {
      $url = $this->uri->segment(3);
      if ($url == NULL) {
  		  $x['orders'] = $this->admin_model->getorders();
        $this->load->admintemplate("admin/order", $x);
      }elseif ($url == 'details') {
        $order_id = $this->input->post('order_id');
        $x['orders'] = $this->admin_model->getordersbyid($order_id);
        $x['details_orders'] = $this->admin_model->getdetailsordersbyid($order_id);
        $this->load->admintemplate("admin/detail_orders",$x);
      }
    }
    public function user()
    {
      if ($this->session->userdata('user_role') != 'admin') {
        redirect(base_url());
      }
      $url = $this->uri->segment(3);
      if ($url == NULL) {
  		    $x['user']=$this->admin_model->getUser();
          $this->load->admintemplate("admin/user",$x);
        }elseif($url == 'edit') {
          $usr_id = $this->input->post('edt_usr_id');
          $usr_name = $this->input->post('edt_usr_name');
          $usr_role = $this->input->post('edt_usr_role');
          $usr_active = $this->input->post('edt_usr_active');
          $data = array('full_name' => $usr_name,
                        'role'      => $usr_role,
                        'is_active' => $usr_active);
          $this->notif_model->notif_success("User Has Been Edited");
          $this->admin_model->edtuser($data, $usr_id);
          redirect('admin/user');
        }elseif ($url == 'delete') {
          $user_id = $this->input->post('del_usr_id');
          $this->notif_model->notif_success("User Has Been Deleted");
          $this->admin_model->deluser($user_id);
          redirect('admin/user');
        }
    }

    public function profile()
    {
      $url = $this->uri->segment(3);
      $user_id = $this->session->userdata('user_id');
      if ($url == NULL) {
        $x['profile'] = $this->admin_model->getprofile($user_id);
        $this->load->admintemplate("admin/profile",$x);
      }elseif ($url == 'update') {
        $user_id = $this->input->post('user_id');
        $full_name = $this->input->post('full_name');
        $address = $this->input->post('address');

        if(!empty($_FILES['avatar']['name'])){
          $config['upload_path']          = './theme/images/user_profile/';
          $config['allowed_types']        = 'jpg|png';
          $config['overwrite']            = TRUE;
          $config['file_name']            = $user_id.'_profile';

          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          if (!$this->upload->do_upload('avatar')) {
            $this->notif_model->notif_danger("Error Upload Image ".$this->upload->display_errors());
            redirect('admin/profile');
          }else {
            $avatar = $this->upload->data('orig_name');
          }
        }else {
          $avatar = $this->input->post('avatar-old');
        }

        $data = array('full_name' => $full_name,
                      'address'   => $address,
                      'photo'     => $avatar);

        $this->admin_model->updateProfile($data, $user_id);
        $this->notif_model->notif_success("Profile Has Been Update");
        redirect('admin/profile');
      }
    }

    public function settings()
    {
      $url = $this->uri->segment(3);
      if ($url == 'application') {
        $url4 = $this->uri->segment(4);
        if ($url4 == NULL) {
          $this->load->admintemplate("admin/application_settings");
        }elseif ($url4 == 'update') {
          $system_name = $this->input->post('system_name');
          $website_keywords = $this->input->post('website_keywords');
          $website_description = $this->input->post('website_description');
          $system_email = $this->input->post('system_email');
          $address = $this->input->post('address');
          $phone = $this->input->post('phone');
          if(!empty($_FILES['logo']['name'])){
            $config['upload_path']          = './theme/images/';
            $config['allowed_types']        = 'png';
            $config['overwrite']            = TRUE;
            $config['file_name']            = 'logo';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('logo')) {
              $this->notif_model->notif_danger("Error Upload Image 1 Because ".$this->upload->display_errors());
              redirect('admin/settings/application');
            }else {
              $logo = $this->upload->data('orig_name');
            }
          }else {
            $logo = $this->input->post('logo-old');
          }
          $data = array('system_name' => $system_name,
                        'website_keywords'      => $website_keywords,
                        'website_description' => $website_description,
                        'system_email'        => $system_email,
                        'address'             => $address,
                        'phone'               => $phone);
          $this->admin_model->edtApp($data);
          $this->notif_model->notif_success("Settings Has Been Edited");
          redirect('admin/settings/application');
        }
      }elseif ($url == 'smtp') {
        $url4 = $this->uri->segment(4);
        if ($url4 == NULL) {
          $this->load->admintemplate("admin/smtp_settings");
        }elseif ($url4 == 'update') {
          $protocol = $this->input->post('protocol');
          $host = $this->input->post('host');
          $port = $this->input->post('port');
          $user = $this->input->post('user');
          $pass = $this->input->post('password');
          $data = array('protocol' => $protocol,
                        'host'      => $host,
                        'port'      => $port,
                        'user'        => $user,
                        'pass'             => $pass);
          $this->admin_model->edtSMTP($data);
          $this->notif_model->notif_success("Settings Has Been Edited");
          redirect('admin/settings/smtp');
        }
      }
    }
}
