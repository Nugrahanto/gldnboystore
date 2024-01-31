<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('cek');
	}

	public function index()
	{
		$data = array('email' => '',
					  'logged_in' => FALSE 
					  );
		$this->session->sess_destroy();
		redirect('login');
	}

}

/* End of file Logout.php */
/* Location: ./application/controllers/Logout.php */