<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Images extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_admin') == 0) {
            $data['main_view'] = 'admin/images_instagram';
            $data['category'] = $this->admin_model->get_category();
			$data['instagram'] = $this->admin_model->get_images_instagram();
			$this->load->view('admin/template', $data);	
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_admin') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
    }

    public function Instagram()
    {
        if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_admin') == 0) {
            $data['main_view'] = 'admin/images_instagram';
            $data['category'] = $this->admin_model->get_category();
			$data['instagram'] = $this->admin_model->get_images_instagram();
			$this->load->view('admin/template', $data);	
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_admin') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
	}
	
	public function Instagramdetail()
    {
		$id = $this->uri->segment(4);
        if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_admin') == 0) {
            $data['main_view'] = 'admin/images_instagram_det';
            $data['category'] = $this->admin_model->get_category();
			$data['det_instagram'] = $this->admin_model->get_det_images_instagram($id);
			$this->load->view('admin/template', $data);	
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_admin') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
    }

    public function doSubmitIg()
    {
        if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_admin') == 0) {
			if ($this->input->post('submit')) {
				// $id = $this->input->post('id');
				// $nomor = $this->input->post('nomor');
                // // print_r($id);
    			if ($this->admin_model->update_instagram() == TRUE) {
                    $this->session->set_userdata('alert', 'success');
    				redirect('admin/images/instagram','refresh');
    			} else {
                    $this->session->set_userdata('alert', 'danger');
    				redirect('admin/images/instagram','refresh');
    			}
    		}
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_admin') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
    }

}

/* End of file promo.php */
/* Location: ./application/controllers/Admin/promo.php */