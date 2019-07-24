<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

	public function datakategori()
	{
		return $this->db->get('kategori')->result();
	}
	public function cekbuku($id)
	{
		return $this->db->where('id_kategori', $id)
						->get('barang')
						->result();
	}
	public function hapus($id)
	{
		return $this->db->where('id_kategori', $id)->delete('kategori');
	}
	public function tambah()
	{
		$object = array(
			'nama_kategori' => $this->input->post('nama_kategori'), 			
		);
		return $this->db->insert('kategori', $object);
	}
	public function detail($a)
	{
		return $this->db->where('id_kategori', $a)
						->get('kategori')
						->row();
	}
	public function ubah()
	{
		$object = array(
			'nama_kategori' => $this->input->post('nama_kategori'), 			
		);
		return $this->db->where('id_kategori', $this->input->post('id_kategori'))->update('kategori', $object);
	}
}

/* End of file m_kategori.php */
/* Location: ./application/models/m_kategori.php */