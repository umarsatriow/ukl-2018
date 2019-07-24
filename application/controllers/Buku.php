<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_buku','buku');
		$this->load->model('m_kategori','kat');
	}
	public function index()
	{
		if ($this->session->userdata('login')==TRUE) {
			if ($this->session->userdata('level')==1) {
				$data['judul']='CRUD Barang | Web - Irfan Jaya';
				$data['tampil_buku']=$this->buku->databuku();
				$data['tampil_kategori']=$this->kat->datakategori();
				$data['konten']='buku';
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
		$config['upload_path'] = './assets/img';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		if ($_FILES['foto_cover']['name']!="") {
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('foto_cover')){
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
			}
			else{
				if ($this->buku->tambah($this->upload->data('file_name'))) {
					$this->session->set_flashdata('pesan', 'Sukses menambah');
				}
				else{
					$this->session->set_flashdata('pesan', 'Gagal menambah');
				}
			}
		}else{
			if ($this->buku->tambah('')) {
				$this->session->set_flashdata('pesan', 'Sukses menambah');
			}
			else{
				$this->session->set_flashdata('pesan', 'Gagal menambah');
			}
		}
		redirect('buku','refresh');
	}
	public function hapus($id)
	{
		$cek = $this->db->where('id_buku', $id)
						->get('detail_transaksi')
						->result();		
		if ($cek !=null) {
			$this->session->set_flashdata('pesan', 'Buku tidak dapat dihapus. User masih ada di detail transaksi');
		}
		else{
			if ($this->buku->hapus($id)) {
			$this->session->set_flashdata('pesan', 'Sukses menghapus');
			}
			else{
				$this->session->set_flashdata('pesan', 'Gagal menghapus');
			}
		}
		redirect('buku','refresh');				
	}
	public function edit_buku($id)
	{
		$detail=$this->buku->detail($id);		
		echo json_encode($detail);
	}
	public function ubah()
	{
		$config['upload_path'] = './assets/img';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		if ($_FILES['foto_cover']['name']!="") {
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('foto_cover')){
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
			}
			else{
				if ($this->buku->ubah($this->upload->data('file_name'))) {
					$this->session->set_flashdata('pesan', 'Sukses mengupdate');
				}
				else{
					$this->session->set_flashdata('pesan', 'Gagal menambah');
				}
			}
		}else{
			if ($this->buku->ubah('')) {
				$this->session->set_flashdata('pesan', 'Sukses mengupdate');
			}
			else{
				$this->session->set_flashdata('pesan', 'Gagal menambah');
			}
		}
		redirect('buku','refresh');
	}

}

/* End of file buku.php */
/* Location: ./application/controllers/buku.php */