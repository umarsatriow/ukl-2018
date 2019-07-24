<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_buku extends CI_Model {

	public function databuku()
	{
		return $this->db->join('kategori','kategori.id_kategori=barang.id_kategori')
						->get('barang')->result();
	}
	public function hapus($id)
	{
		return $this->db->where('id_barang', $id)->delete('barang');
	}
	public function tambah($nama_file)
	{
		if ($nama_file=="") {
			$object = array(
			'nama_barang' => $this->input->post('judul_buku'),
			'expired' => $this->input->post('tahun'),	
			'id_kategori' => $this->input->post('id_kategori'),		
			'harga' => $this->input->post('harga'),
			'produsen' => $this->input->post('penerbit'),			
			'stok' => $this->input->post('stok'),  			
			);
		}
		else{
			$object = array(
			'nama_barang' => $this->input->post('judul_buku'),
			'expired' => $this->input->post('tahun'),	
			'id_kategori' => $this->input->post('id_kategori'),		
			'harga' => $this->input->post('harga'),
			'produsen' => $this->input->post('penerbit'),	
			'foto_cover' => $nama_file,		
			'stok' => $this->input->post('stok'),	
			);
		}
		return $this->db->insert('barang', $object);
	}
	public function detail($a)
	{
		return $this->db->join('kategori','kategori.id_kategori=barang.id_kategori')
						->where('id_barang', $a)
						->get('barang')
						->row();
	}
	public function ubah($nama_file)
	{
		if ($nama_file=="") {
			$object = array(
			'nama_barang' => $this->input->post('judul_buku'),
			'expired' => $this->input->post('tahun'),	
			'id_kategori' => $this->input->post('id_kategori'),		
			'harga' => $this->input->post('harga'),
			'produsen' => $this->input->post('penerbit'),			
			'stok' => $this->input->post('stok'), 			
			);
		}
		else{
			$object = array(
			'nama_barang' => $this->input->post('judul_buku'),
			'expired' => $this->input->post('tahun'),	
			'id_kategori' => $this->input->post('id_kategori'),		
			'harga' => $this->input->post('harga'),
			'produsen' => $this->input->post('penerbit'),	
			'foto_cover' => $nama_file,		
			'stok' => $this->input->post('stok'),		
			);
		}
		return $this->db->where('id_barang', $this->input->post('id_barang'))->update('barang', $object);
	}
}

/* End of file m_buku.php */
/* Location: ./application/models/m_buku.php */