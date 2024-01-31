<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_admin') == 0) {
			$data['main_view'] = 'admin/dashboard';
			$data['category'] = $this->admin_model->get_category();
			$this->load->view('admin/template', $data);	
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_admin') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/Admin/dashboard.php */