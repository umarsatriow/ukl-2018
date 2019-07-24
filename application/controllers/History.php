<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_history','history');
	}
	public function index()
	{
		if ($this->session->userdata('login')==TRUE) {
			if ($this->session->userdata('level')==1) {
				$data['judul']='History Transaksi| Web - Irfan Jaya';
				$data['konten'] = 'history';			
				$data['tampil_transaksi'] = $this->history->getdatatransaksi();			
				$this->load->view('template', $data);
			}
			elseif($this->session->userdata('level')==2){
				redirect('transaksi','refresh');
			}
		}else{
			$this->load->view('login');		
		}		
	}
	public function detail($id)
	{		
		$data['detail_history']=$this->history->detail($id);
		$data['total']=$this->history->getTransaksi($id);
		$data['judul']="Transaksi ".$id." | Web - Irfan Jaya";
		$data['konten']='detail_history';
		$this->load->view('template', $data);
	}	
	public function hapus($id)
	{
		if ($this->history->hapus($id)) {
			$this->session->set_flashdata('pesan', 'Sukses menghapus');
		}
		else{
			$this->session->set_flashdata('pesan', 'Gagal menghapus');
		}
		redirect('history','refresh');	
		
			
	}
	
}

/* End of file Model.php */
/* Location: ./application/controllers/Model.php */