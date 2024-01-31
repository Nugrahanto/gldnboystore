<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_admin') == 0) {
			$data['main_view'] = 'admin/category';
			$data['category'] = $this->admin_model->get_category();
			$data['all_category'] = $this->admin_model->get_all_category();
			$this->load->view('admin/template', $data);	
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_admin') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
	}
	
	public function detail()
	{
		$id = $this->uri->segment(4);
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_admin') == 0) {
			$data['main_view'] = 'admin/category_detail';
			$data['category'] = $this->admin_model->get_category();
			$data['sub_category'] = $this->admin_model->get_all_subcategory($id);
			$this->load->view('admin/template', $data);	
			// print_r($id);
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_admin') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
    }
    
    public function newCategory()
    {
        if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_admin') == 0) {
			$data['main_view'] = 'admin/page_comingsoon';
			$data['category'] = $this->admin_model->get_category();
			$this->load->view('admin/template', $data);	
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_admin') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
	}
	
	public function statusCategory()
	{
		$id_category = $this->input->post('id_category');
		$status_category = $this->input->post('status_category');
		if ($this->input->post('submit')) {
			$edit = $this->admin_model->status_category($id_category, $status_category);
			if ($edit)  {
				$this->session->set_userdata('alert', 'success');
				redirect('admin/category','refresh');
			} else {
				redirect('admin/category','refresh');
			}
		}
	}

	public function statusSubCat()
	{
		$id_subCategory = $this->input->post('id_category');
		$status_category = $this->input->post('status_category');
		$id = $this->input->post('id');
		if ($this->input->post('submit')) {
			$edit = $this->admin_model->status_subCategory($id_subCategory, $status_category);
			if ($edit)  {
				$this->session->set_userdata('alert', 'success');
				redirect('admin/category/detail/'.$id.'');
			} else {
				redirect('admin/category/detail/'.$id.'');
			}
		}
	}

}

/* End of file category.php */
/* Location: ./application/controllers/Admin/category.php */