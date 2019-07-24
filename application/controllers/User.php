<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user','user');
	}
	public function index()
	{
		if ($this->session->userdata('login')==TRUE) {
			if ($this->session->userdata('level')==1) {
				$data['judul']='CRUD User | Web - Irfan Jaya';
				$data['tampil_user']=$this->user->dataUser();
				$data['konten']='user';
				$this->load->view('template',$data);
			}
			elseif($this->session->userdata('level')==2){
				redirect('transaksi','refresh');
			}			
		}else{
			redirect('login','refresh');		
		}
	}
	public function tambah()
	{
		if ($this->user->tambah()) {
			$this->session->set_flashdata('pesan', 'sukses menambah');
		}
		else{
			$this->session->set_flashdata('pesan', 'gagal menambah');
		}
		redirect('user','refresh');
	}
	public function hapus($id)
	{
		$cek = $this->db->where('id_user', $id)
						->get('transaksi')
						->result();		
		if ($cek !=null) {
			$this->session->set_flashdata('pesan', 'User tidak dapat dihapus. User masih ada di transaksi');
		}
		else{
			if ($this->user->hapus($id)) {
			$this->session->set_flashdata('pesan', 'Sukses menghapus');
			}
			else{
				$this->session->set_flashdata('pesan', 'Gagal menghapus');
			}
		}
		redirect('user','refresh');		
	}
	public function edit_user($id)
	{
		$data=$this->user->detail($id);
		echo json_encode($data);
	}
	public function ubah()
	{
		if ($this->input->post('id_user')==$this->session->userdata('id_user')) {
			$this->session->set_flashdata('pesan', 'Akun masih login');
		}
		else{
			if ($this->user->ubah()) {
				$this->session->set_flashdata('pesan', 'Sukses mengubah data');
			}
			else{
				$this->session->set_flashdata('pesan', 'Gagal mengubah data');
			}			
		}
		redirect('user','refresh');
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */