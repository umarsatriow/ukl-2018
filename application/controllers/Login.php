<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_login','login');
	}

	public function index()
	{
		if ($this->session->userdata('login')==TRUE) {
			redirect('toko','refresh');
		}else{
			$data['judul']='Login | Web - Toga Media';
			$this->load->view('login');		
		}
	}
	public function proses()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
		if ($this->form_validation->run() == TRUE) {
			if ($this->login->cek_user()->num_rows()>0) {
				$data=$this->login->cek_user()->row();
				$array = array(
					'login' => TRUE ,
					'id_user' =>$data->id_user,
					'nama_user' => $data->nama_user,
					'username' => $data->username,
					'level' =>$data->level
				);
				$this->session->set_userdata( $array );
				redirect('Toko','refresh');
			}
			else{
				$this->session->set_flashdata('pesan', 'Username/Password Salah');
				redirect('Login','refresh');
			}
		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('Login','refresh');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('pesan', 'Anda sukses logout');
		redirect('Login','refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */