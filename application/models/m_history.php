<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_history extends CI_Model {

	public function getdatatransaksi()
	{
		return $this->db->join('user','user.id_user=transaksi.id_user')
						->get('transaksi')->result();
	}
	public function hapus($id)
	{
		return $this->db->where('id_transaksi', $id)->delete('transaksi');
	}
	public function detail($a)
	{
		return $this->db->join('barang','barang.id_barang=detail_transaksi.id_barang')
						->join('kategori','kategori.id_kategori=barang.id_kategori')
						->where('id_transaksi',$a)
						->get('detail_transaksi')->result();
	}
	public function getTransaksi($a)
	{
		return $this->db->join('user','user.id_user=transaksi.id_user')
						->where('id_transaksi',$a)
						->get('transaksi')->row();
	}
}

/* End of file m_history.php */
/* Location: ./application/models/m_history.php */