<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collections extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		$subcat = "";
		if (isset($_GET['cat'])) {
			$subcat = $_GET['cat'];
		}
		$id = $this->uri->segment(2);
		$data['main_view'] = 'collections';

		$this->load->library('pagination');

		if ($subcat == ""){
			$config['base_url'] = base_url('collections/'.$id.'');
			$config['total_rows'] = $this->user_model->total_records_collection($id);
		} else {
			$config['base_url'] = base_url('collections/'.$id.'?cat='.$subcat.'');
			$config['total_rows'] = $this->user_model->total_records_collection_subcat($id, $subcat);
		}
        $config['per_page'] = 6;
        $config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config['use_page_numbers'] = TRUE;

		$config['next_link'] = '<span class="asd" aria-hidden="true">&raquo;</span>';
		$config['prev_link'] = '<span class="asd" aria-hidden="true">&laquo;</span>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$page = ($this->input->get('page')) ? ($this->input->get('page') * $config['per_page']) - $config['per_page'] : 0;

        $this->pagination->initialize($config);

		if ($subcat == ""){
			$rows = $this->user_model->get_goods_cat($config['per_page'], $page, $id);
		} else {
			$rows = $this->user_model->get_goods_subcat($config['per_page'], $page, $id, $subcat);
		}
		$data['pagination'] = $this->pagination->create_links();
		$data['goods'] = $rows;
		$data['category'] = $this->user_model->get_category();
		$data['category_left'] = $this->user_model->get_category_left();
		$data['instagram'] = $this->user_model->get_instagram();
		$data['subcategory'] = $this->user_model->get_subcategory();

		$this->load->view('template', $data);
		// print_r($cat);
	}

	public function Collections_Detail()
	{
		$id = "";
		$category = "";
		if($this->uri->segment(4) != ""){
			$id = ucwords(str_replace("-"," ",$this->uri->segment(4))); 
			$category = $this->uri->segment(2);
		} else {
			$id = ucwords(str_replace("-"," ",$this->uri->segment(2)));
		}
		$data['category'] = $this->user_model->get_category();
		$data['goods'] = $this->user_model->get_goods_det($id);
		$data['goods_images'] = $this->user_model->get_goods_image($id);
		if ($category == ""){
			$data['goods_other'] = $this->user_model->get_goods_other_products($id);
		} else if ($category == "sale") {
			$data['goods_other'] = $this->user_model->get_goods_other_sale($id);
		} else {
			$data['goods_other'] = $this->user_model->get_goods_other($id, $category);
		}
		if($data['goods'] != null){
			$data['main_view'] = 'collections_detail';
		} else {
			$data['main_view'] = 'pages_not-found';
		}
		$this->load->view('template', $data);
		// $a = $this->user_model->get_goods_det($id);
		// if ($a == null)
		// {
		// 	$a == "kosong";
		// } else {
		// 	$a == "lah";
		// }
		// print_r($a);
	}

	public function Collections_All()
	{
		$data['main_view'] = 'collections_all';

		$this->load->library('pagination');

		$config['base_url'] = base_url('collections');
        $config['total_rows'] = $this->user_model->total_records_collection_all();
        $config['per_page'] = 8;
        $config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config['use_page_numbers'] = TRUE;

		$config['next_link'] = '<span class="asd" aria-hidden="true">&raquo;</span>';
		$config['prev_link'] = '<span class="asd" aria-hidden="true">&laquo;</span>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$page = ($this->input->get('page')) ? ($this->input->get('page') * $config['per_page']) - $config['per_page'] : 0;

        $this->pagination->initialize($config);

		$rows = $this->user_model->get_goods_collection_all($config['per_page'], $page);
		$data['pagination'] = $this->pagination->create_links();
		$data['category'] = $this->user_model->get_category();
		$data['instagram'] = $this->user_model->get_instagram();
		$data['goods'] = $rows;

		$this->load->view('template', $data);
		// $a = $this->user_model->total_records_collection_all();
		// print_r($a);
	}

	public function sale()
	{
		$data['main_view'] = 'sale';

		$this->load->library('pagination');

		$config['base_url'] = base_url('collections');
        $config['total_rows'] = $this->user_model->total_records_collection_sale();
        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config['use_page_numbers'] = TRUE;

		$config['next_link'] = '<span class="asd" aria-hidden="true">&raquo;</span>';
		$config['prev_link'] = '<span class="asd" aria-hidden="true">&laquo;</span>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$page = ($this->input->get('page')) ? ($this->input->get('page') * $config['per_page']) - $config['per_page'] : 0;

        $this->pagination->initialize($config);

		$rows = $this->user_model->get_goods_collection_sale($config['per_page'], $page);
		$data['pagination'] = $this->pagination->create_links();
		$data['category'] = $this->user_model->get_category();
		$data['instagram'] = $this->user_model->get_instagram();
		$data['goods'] = $rows;

		$this->load->view('template', $data);
	}

}

/* End of file collections.php */
/* Location: ./application/controllers/collections.php */