<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_admin') == 0) {
			$data['main_view'] = 'admin/promo';
			$data['category'] = $this->admin_model->get_category();
			$data['promo'] = $this->admin_model->get_promo();
			$this->load->view('admin/template', $data);	
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_admin') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
    }
    
    public function newPromo()
    {
        if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_admin') == 0) {
			if ($this->input->post('submit')) {
    			if ($this->admin_model->add_promo() == TRUE) {
                    $this->session->set_userdata('alert', 'success');
    				redirect('admin/promo','refresh');
    			} else {
                    $this->session->set_userdata('alert', 'danger');
    				redirect('admin/promo','refresh');
    			}
    		}
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_admin') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
    }

    public function statusPromo()
	{
		$id_promo = $this->input->post('id_promo');
		$status_promo = $this->input->post('status_promo');
		if ($this->input->post('submit')) {
			$edit = $this->admin_model->status_promo($id_promo, $status_promo);
			if ($edit)  {
				$this->session->set_userdata('alert_status', 'success');
				redirect('admin/promo');
			} else {
                $this->session->set_userdata('alert_status', 'danger');
				redirect('admin/promo');
			}
		}
	}

}

/* End of file promo.php */
/* Location: ./application/controllers/Admin/promo.php */