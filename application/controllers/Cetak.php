<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_history','history');
	}
	public function index()
	{
		if ($this->session->userdata('login')==TRUE) {			
		}else{
			$this->load->view('login');		
		}		
	}
	public function nota($id)
	{			
		$data['detail_history']=$this->history->detail($id);
		$data['dataTransaksi']=$this->history->getTransaksi($id);
		$this->load->view('nota',$data);
	}
}

/* End of file Cetak.php */
/* Location: ./application/controllers/Cetak.php */