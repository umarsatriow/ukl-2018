<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function cek_user()
	{
		return $this->db
					->where('username', $this->input->post('username'))
					->where('password', $this->input->post('password'))
					->get('user');
	}	
}

/* End of file m_login.php */
/* Location: ./application/models/m_login.php */