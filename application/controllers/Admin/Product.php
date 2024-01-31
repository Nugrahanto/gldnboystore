<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('text');
		$this->load->model('admin_model');
	}

	public function index()
	{
		$id = $this->uri->segment(3);
		if($id != "add" && $id != "insert" && $id != "doEdit" && $id != "statusImage"){
			if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_admin') == 0) {
				$data['main_view'] = 'admin/product';
				$data['category'] = $this->admin_model->get_category();
				$data['goods'] = $this->admin_model->get_goods($id);
				$this->load->view('admin/template', $data);	
			} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_admin') == 0)) {
				redirect('forbidden','refresh');
			} else {
				redirect('login','refresh');
			}
		} 
		// else {
		// 	if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_admin') == 0) {
		// 		$data['main_view'] = 'admin/product';
		// 		$data['category'] = $this->admin_model->get_category();
		// 		$data['goods'] = $this->admin_model->get_goods($variable);
		// 		$this->load->view('admin/template', $data);	
		// 	} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_admin') == 0)) {
		// 		redirect('forbidden','refresh');
		// 	} else {
		// 		redirect('login','refresh');
		// 	}
		// }
	}

	public function add()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_admin') == 0) {
			$data['main_view'] = 'admin/product_new';
			$data['category'] = $this->admin_model->get_category();
			$data['promo'] = $this->admin_model->get_promo();
			$this->load->view('admin/template', $data);	
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_admin') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
	}

	public function getSubCat()
	{
		$id_category = $this->uri->segment(4);
		//print_r($id_category);
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_admin') == 0) {
			$data_subCat = $this->admin_model->get_subCat($id_category);
			echo json_encode($data_subCat);
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_admin') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
	}

	public function insert()
	{	
		//$name_cat = strtolower($this->input->post('name_category'));
		$name_cat = (str_replace(' ', '-', strtolower($this->input->post('name_category'))));
		// $id_subCategory = $this->input->post('id_subCat');
		//print_r($name_cat);
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_admin') == 0) {
			if ($this->input->post('submit')) {
				// Hitung Jumlah File/Gambar yang dipilih
				$jumlahData = count($_FILES['gambar']['name']);
				// Lakukan Perulangan dengan maksimal ulang Jumlah File yang dipilih
				for ($i=0; $i < $jumlahData ; $i++):
					// Inisialisasi Nama,Tipe,Dll.
					$_FILES['file']['name']     = $_FILES['gambar']['name'][$i];
					$_FILES['file']['type']     = $_FILES['gambar']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
					$_FILES['file']['size']     = $_FILES['gambar']['size'][$i];

					// Konfigurasi Upload
					$config['upload_path']          = './uploads/goods/';
					$config['allowed_types']        = 'jpg|png';

					// Memanggil Library Upload dan Setting Konfigurasi
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if($this->upload->do_upload('file')){ // Jika Berhasil Upload

						$fileData = $this->upload->data(); // Lakukan Upload Data

						// Membuat Variable untuk dimasukkan ke Database
						$uploadData[$i]['name_images'] = $fileData['file_name'];
					}

				endfor; // Penutup For

				if($uploadData !== null){ // Jika Berhasil Upload
					// print_r($uploadData);
					// Insert ke Database 
					$insert = $this->admin_model->add_goods($uploadData);

					if($insert){ // Jika Berhasil Insert
						$this->session->set_userdata('alert', 'success');
						redirect('admin/product/'.$name_cat.'','refresh');
					}else{ // Jika Tidak Berhasil Insert
						$this->session->set_userdata('alert', 'danger');
						redirect('admin/product/add','refresh');
					}	
				}
			}
		}
		// else dong
	}

	public function detail()
	{
		$id = $this->uri->segment(5);
		$title = $this->uri->segment(4);
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_admin') == 0) {
			$data['main_view'] = 'admin/product_detail';
			$data['category'] = $this->admin_model->get_category();
			$data['promo'] = $this->admin_model->get_promo();
			$data['det_goods'] = $this->admin_model->get_goods_det($id);
			$data['image_goods'] = $this->admin_model->get_goods_image($id, $title);
			$this->load->view('admin/template', $data);
			//print_r($data);
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_admin') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
	}

	public function edit()
	{
		$id = $this->uri->segment(5);
		$title = $this->uri->segment(4);
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('id_admin') == 0) {
			$data['main_view'] = 'admin/product_edit';
			$data['category'] = $this->admin_model->get_category();
			$data['promo'] = $this->admin_model->get_promo();
			$data['det_goods'] = $this->admin_model->get_goods_det($id);
			$data['sub_cat'] = $this->admin_model->get_subCat($data['det_goods']->id_category);
			$data['image_goods'] = $this->admin_model->get_goods_image($id, $title);
			$this->load->view('admin/template', $data);
			//print_r($data['det_goods']);
		} else if ($this->session->userdata('logged_in') && !($this->session->userdata('id_admin') == 0)) {
			redirect('forbidden','refresh');
		} else {
			redirect('login','refresh');
		}
	}

	public function doEdit()
	{		
		$id = $this->input->post('id_goods');
		// $title = $this->input->post('title_url');
		$title = (str_replace(' ', '-', strtolower($this->input->post('title_url'))));
		if ($this->input->post('submit')) {
			// $this->admin_model->edit_goods($id);
			//print_r($id);
			$edit = $this->admin_model->edit_goods($id);
			//print_r($edit);
			if ($edit)  {
				$this->session->set_userdata('alert', 'success');
				redirect('admin/product/'.$title.'/edit/'.$id.'');
			} else {
				$this->session->set_userdata('alert', 'danger');
				redirect('admin/product/'.$title.'/edit/'.$id.'');
			}
		}
	}

	public function statusImage()
	{		
		$id_goods = $this->input->post('id_goods');
		$id_images = $this->input->post('id_images');
		$status_images = $this->input->post('status_images');
		$title = $this->input->post('title_url');
		if ($this->input->post('submit')) {
			//$this->admin_model->status_images($id_images, $status_images);
			//print_r($id_images);
			$edit = $this->admin_model->status_images($id_images, $status_images);
			if ($edit)  {
				redirect('admin/product/'.$title.'/edit/'.$id_goods.'','refresh');
				//print_r("IF");
			} else {
				redirect('admin/product/'.$title.'','refresh');
				//print_r("ELSE");
			}
		}
	}

}

/* End of file product.php */
/* Location: ./application/controllers/Admin/product.php */