<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kategori','kategori');
	}
	public function index()
	{
		if ($this->session->userdata('login')==TRUE) {
			if ($this->session->userdata('level')==1) {
				$data['judul']='CRUD Kategori | Web - Irfan Jaya';
				$data['tampil_kategori']=$this->kategori->datakategori();
				$data['konten']='kategori';
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
		if ($this->kategori->tambah()) {
			$this->session->set_flashdata('pesan', 'Sukses menambah');
		}
		else{
			$this->session->set_flashdata('pesan', 'Gagal menambah');
		}
		redirect('kategori','refresh');
	}
	public function hapus($id)
	{
		$cekbuku = $this->kategori->cekbuku($id);
		if ($cekbuku !=null) {
			$this->session->set_flashdata('pesan', 'Data tidak dapat dihapus. Buku yang berkategori tersebut masih ada');
		}
		else{
			if ($this->kategori->hapus($id)) {
			$this->session->set_flashdata('pesan', 'Sukses menghapus');
			}
			else{
				$this->session->set_flashdata('pesan', 'Gagal menghapus');
			}
		}
		redirect('kategori','refresh');
	}
	public function edit_kategori($id)
	{
		$data=$this->kategori->detail($id);
		echo json_encode($data);
	}
	public function ubah()
	{
		if ($this->kategori->ubah()) {
			$this->session->set_flashdata('pesan', 'Sukses mengubah data');
		}
		else{
			$this->session->set_flashdata('pesan', 'Gagal mengubah data');
		}
		redirect('kategori','refresh');
	}

}

/* End of file kategori.php */
/* Location: ./application/controllers/kategori.php */