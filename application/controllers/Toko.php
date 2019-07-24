<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_toko','toko');
	}
	public function index()
	{
		if ($this->session->userdata('login')==TRUE) {
			if ($this->session->userdata('level')==1) {
			$data['judul']='Dashboard | Umar Sakti';
			$data['konten']='toko';
			$data['dataTransaksi']=$this->toko->getdatatransaksi()->num_rows();
			$data['dataKategori']=$this->toko->getdatakategori()->num_rows();
			$data['dataBuku']=$this->toko->getdatabuku()->num_rows();
			$data['dataTransaksiTotal']=$this->toko->getdataTransaksiTotal()->num_rows();
			$data['dataBuku10']=$this->toko->getdataBuku10()->num_rows();
			$this->load->view('template',$data);
			}
			elseif($this->session->userdata('level')==2){
				redirect('transaksi','refresh');
			}		
		}else{
			redirect('login','refresh');		
		}
	}

}

/* End of file Toko.php */
/* Location: ./application/controllers/Toko.php */