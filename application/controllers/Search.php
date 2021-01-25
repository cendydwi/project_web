<?php
			defined('BASEPATH') OR exit('No direct script access allowed');

			class Search extends CI_Controller {

				public function __construct()
				{
						parent::__construct();
						$this->load->library('form_validation');
						$this->load->library('pagination');
						$this->load->model('search_model');
				}

				public function index()
				{
					$x['category'] = array('category_name' => 'Data Tidak Ada', );
					$this->load->template('list_product', $x);
				}

				public function searchproduct()
				{
						$url = $this->uri->segment(3);
						$url4 = $this->uri->segment(4);
						$x['all_category'] = $this->search_model->getCategory();
						if ($url == NULL) {
							$x['category'] = array('category_name' => 'Data Tidak Ada', );
							$this->load->template('list_product', $x);
						}else {
							$url_new = str_replace('%20', ' ', $url);
							$url_new4 = str_replace('%20', ' ', $url4);

							if ($url_new == 'All Categories ') {
								$jumlah_data = $this->search_model->getCountoflistProductAllcategories($url_new4);
								$config['base_url'] = base_url().'category/searchcategory/'.$url;
								$config['total_rows'] = $jumlah_data;
								$config['per_page'] = 50;
								$from = $this->uri->segment(4);

								$config['next_link'] = '<div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>';
								$config['prev_link'] = '<div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>';
								$config['full_tag_open'] = '<div class="shop_page_nav d-flex flex-row">';
								$config['full_tag_close'] = '</div>';
								$config['num_tag_open'] = '<ul class="page_nav d-flex flex-row"><li>';
								$config['num_tag_close'] = '</li></ul>';
								$config['cur_tag_open'] = '<ul class="page_nav d-flex flex-row"><li>';
								$config['cur_tag_close'] = '</li></ul>';

								$this->pagination->initialize($config);
								$x['product'] = $this->search_model->getlistProductAllcategories($url_new4, $config['per_page'], $from);
							}else {
								$id = $this->search_model->getId($url_new);
								$jumlah_data = $this->search_model->getCountoflistProduct($id,$url_new4);
								$config['base_url'] = base_url().'category/searchcategory/'.$url;
								$config['total_rows'] = $jumlah_data;
								$config['per_page'] = 50;
								$from = $this->uri->segment(4);

								$config['next_link'] = '<div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>';
								$config['prev_link'] = '<div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>';
								$config['full_tag_open'] = '<div class="shop_page_nav d-flex flex-row">';
								$config['full_tag_close'] = '</div>';
								$config['num_tag_open'] = '<ul class="page_nav d-flex flex-row"><li>';
								$config['num_tag_close'] = '</li></ul>';
								$config['cur_tag_open'] = '<ul class="page_nav d-flex flex-row"><li>';
								$config['cur_tag_close'] = '</li></ul>';

								$this->pagination->initialize($config);
								$x['product'] = $this->search_model->getlistProduct($id, $url_new4, $config['per_page'], $from);
							}
							$x['category'] = array('category_name' => $url_new, );
							$this->load->template('list_product', $x);
					}
			}
		}
		?>
