<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_buku','buku');
		$this->load->model('m_transaksi','trans');
	}
	public function index()
	{
		if ($this->session->userdata('login')==TRUE) {	
			$data['judul']='Transaksi | Umar Sakti';		
			$data['tampil_buku']=$this->buku->databuku();
			$data['konten']='transaksi';
			$this->load->view('template',$data);
		}else{
			redirect('login','refresh');		
		}
	}
	public function addcart($id)
	{
		$detail=$this->buku->detail($id);
		$data = array(
			'id'      => $detail->id_barang,
			'qty'     => 1,
			'price'   => $detail->harga,
			'name'    => $detail->nama_barang,
			'options' => array(
								'kategori' => $detail->nama_kategori, 
								'tahun' =>  $detail->expired,								
								'foto_cover' =>  $detail->foto_cover,	
								'produsen' =>  $detail->produsen,
								'stok' =>  $detail->stok,)
		);
		if ($this->cart->insert($data)) {
			redirect('transaksi','refresh');
		}
	}
	public function hapuscart($id)
	{
		$data = array(
			'rowid' => $id,
			'qty'   => 0
		);
		
		$this->cart->update($data);
		redirect('transaksi#shopcart','refresh');
	}
	public function ubahqty($id)
	{
		if ($this->input->post('qty')>$this->input->post('stok')) {
			$this->session->set_flashdata('pesan', 'Qty melampaui stok barang');
		}
		else{
			$data = array(
			'rowid' => $id,
			'qty'   => $this->input->post('qty')
		);
		$this->cart->update($data);
		}

		redirect('transaksi#shopcart','refresh');
	}
	public function bayar($value='')
	{
		$uang = $this->input->post('uang');
		$kembalian = $uang-$this->cart->total();
		if ($uang < $this->cart->total()) {
			$this->session->set_flashdata('pesan', 'Uang Kurang');
		}
		else{
			if ($this->trans->simpan()) {
				$transaksi=$this->trans->trans()->id_transaksi;
				$this->cart->destroy();
				$this->session->set_flashdata('pesan', 'Transaksi Berhasil, kembaliannya Rp.'.number_format($kembalian));	
				$this->session->set_flashdata('print',
					'<a href=cetak/nota/'.$transaksi.'>Cetak</a>');

			}
		}
		 redirect('transaksi#shopcart','refresh');
	}
}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */