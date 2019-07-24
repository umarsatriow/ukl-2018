<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function dataUser()
	{
		return $this->db->get('user')->result();
	}
	public function hapus($id)
	{
		return $this->db->where('id_user', $id)->delete('user');
	}
	public function tambah()
	{
		$object = array(
			'nama_user' => $this->input->post('nama_user'), 
			'username' => $this->input->post('username'), 
			'password' => $this->input->post('nama_user'), 
			'level' => $this->input->post('level'), 
		);
		return $this->db->insert('user', $object);
	}
	public function detail($a)
	{
		return $this->db->where('id_user', $a)
						->get('user')
						->row();
	}
	public function ubah()
	{
		$object = array(			
			'nama_user' => $this->input->post('nama_user'), 
			'username' => $this->input->post('username'), 
			'password' => $this->input->post('password'), 
			'level' => $this->input->post('level'), 
		);
		return $this->db->where('id_user', $this->input->post('id_user'))->update('user', $object);
	}
}

/* End of file m_user.php */
/* Location: ./application/models/m_user.php */