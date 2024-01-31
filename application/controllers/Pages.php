<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
        
	}

	public function contactus()
	{
		$data['main_view'] = 'pages_contact-us';
		$data['category'] = $this->user_model->get_category();
		$data['instagram'] = $this->user_model->get_instagram();
		$this->load->view('template', $data);
	}

	public function howtoorder()
	{
		$data['main_view'] = 'pages_how-to-order';
		$data['category'] = $this->user_model->get_category();
		$data['instagram'] = $this->user_model->get_instagram();
		$this->load->view('template', $data);
	}

	public function notfound()
	{
		// $data['main_view'] = 'pages_not-found';
		// $this->load->view('template', $data);
		$data['category'] = $this->user_model->get_category();
		$this->load->view('pages_not-found', $data);
	}

	public function submitemail()
	{
		if ($this->input->post("submit")) {
			$email = $this->input->post('contact-email');
			$name = $this->input->post('contact-name');
			$content = $this->input->post('contact-message');
			$to = "gldnboystore@gmail.com";
				
			$subject = "Contact From Website";
				
			$message = $content . "\r\n\r\nCheers,\r\n" . $name;
				
			$headers = "From:" . $email;
			
			if (mail($to,$subject,$message,$headers)) {
				$this->session->set_flashdata('alert', 'success');
				redirect('pages/contact-us','refresh');
			} else {
				$this->session->set_flashdata('alert', 'danger');
				redirect('pages/contact-us','refresh');
			}
		}
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/Admin/dashboard.php */