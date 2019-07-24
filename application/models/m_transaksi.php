<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	public function simpan ()
	{
		$object = array(
			'id_user' => $this->session->userdata('id_user'),
			'tanggal_beli' =>date('Y-m-d'),
			'nama_pembeli' => $this->input->post('nama_pembeli'),
			'total' =>$this->cart->total(),
			'uang' =>$this->input->post('uang')
		);
		$this->db->insert('transaksi', $object);
		$transaksi = $this->db->order_by('id_transaksi', 'desc')
							  ->limit(1)
							  ->get('transaksi')
							  ->row();
		$data = array();
		for($i=0;$i<count($this->input->post('id_buku'));$i++){
			$hasil[]=array(
				'id_transaksi' => $transaksi->id_transaksi,
				'id_barang' => $this->input->post('id_buku')[$i],
				'jumlah' => $this->input->post('qty')[$i]
			);
			$object = array(
				'stok' =>  $this->input->post('stok')[$i]-$this->input->post('qty')[$i], 
			);
			$this->db->where('id_barang', $this->input->post('id_buku')[$i])
					 ->update('barang', $object);
		}
		$this->db->insert_batch('detail_transaksi', $hasil);
		return $transaksi->id_transaksi;
	}
	public function trans()
	{
		return $this->db->order_by('id_transaksi', 'desc')
							  ->limit(1)
							  ->get('transaksi')
							  ->row();
	}
	

}

/* End of file m_transaksi.php */
/* Location: ./application/models/m_transaksi.php */