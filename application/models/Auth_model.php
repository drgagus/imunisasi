<?php
class auth_model extends CI_model{

	public function getKecamatanNatuna()
	{
		$this->db->where('kot_code', '03');
		return $this->db->get('location')->result_array();
	}

	public function lastLogged($email,$lastlogged)
	{
		$this->db->set('last_logged',$lastlogged);
		$this->db->where('email',$email);
		$this->db->update('user');
	}
	
}




?>