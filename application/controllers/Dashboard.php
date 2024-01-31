<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{	
		//if ($this->session->userdata('logged_in') == TRUE && !($this->session->userdata('id_admin') == 0)) {
			$data['main_view'] = 'dashboard';
			$data['category'] = $this->user_model->get_category();
			$data['goods'] = $this->user_model->get_product_home();
			$data['instagram'] = $this->user_model->get_instagram();
			$this->load->view('template', $data);
// 			redirect('maintenance', 'refresh');
		// } else {
		// 	redirect('login','refresh');
// 			redirect('maintenance', 'refresh');
		//}
	}

}

/* End of file dasboard.php */
/* Location: ./application/controllers/dasboard.php */