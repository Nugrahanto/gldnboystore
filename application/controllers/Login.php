<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public $data = '';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('cek');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->session->userdata('id_admin') == 0) {
					redirect('admin','refresh');
				} else {
					redirect(base_url(),'refresh');
				}
		} else {
			$this->load->view('login');
// 			redirect('maintenance', 'refresh');
		}
	}

	public function do_login()
	{
		if ($this->input->post("submit")) {					

			if ($this->cek->cek_user() == TRUE) {

				// $data['notifSuccess'] = 'Sign Up Berhasil';
				// $this->load->view('login', $data);
				
				if ($this->session->userdata('id_admin') == 0) {
					redirect('admin','refresh');
				} else {
					redirect(base_url(),'refresh');
				}
			} else {
				$data['notifError'] = 'Login Failed!';
				$this->load->view('login', $data);
			}
		}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */