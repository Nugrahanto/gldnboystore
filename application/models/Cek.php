<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek extends CI_Model {

	public function register(){

		$query = $this->db->get_where('users', array(//making selection
            'email' => $this->input->post('form-email'),
        ));

		$count = $query->num_rows();

		if ($count === 0) {

			date_default_timezone_set("Asia/Bangkok");
			$tgl = date("Y-m-d H:m:s");
			$email = $this->input->post('form-email');
			$username = $this->input->post('form-username');
			$password = $this->input->post('form-password');
// 			$hash = md5( rand(0,1000) );

            $data = array(
			'id_admin'			=> NULL,
			'username'			=> $this->input->post('form-username'),
			'password'			=> $this->input->post('form-password'),
			'email'				=> $this->input->post('form-email'),
			'create_on'			=> $tgl,
			'first_name'		=> $this->input->post('form-firstname'),
			'last_name'			=> $this->input->post('form-lastname'),
			'phone'				=> $this->input->post('form-phone'),
			'hash'				=> $this->input->post('form-hash'),
			'active'			=> 0,
			'foto'				=> 'pp.jpg'
			);

            $this->db->insert('users', $data);

            return TRUE;
        } else {
			return FALSE;
        }
	}

	public function cek_user(){
		$email 		= $this->input->post('form-email');
		$password 	= $this->input->post('form-password');
		$active		= 1;

		$query = $this->db->where('email', $email)
						  ->where('password', $password)
						  ->where('is_active', $active)
						  ->get('tb_admin');

		if ($query->num_rows() > 0) {
			$data = array(
				'email'  	=> $email,
				'id_admin' 	=> $query->row()->id_admin,
				'username' 	=> $query->row()->username,
				'logged_in' => TRUE
				);
			$this->session->set_userdata($data);

			return TRUE;

		} 
		else {
			return FALSE;
		}
	}
	
	public function update_activate($hash){

		$data = array(
			'active' => 1
			);

		$this->db->where('hash', $hash)
				 ->update('users', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}

/* End of file Cek.php */
/* Location: ./application/models/Cek.php */