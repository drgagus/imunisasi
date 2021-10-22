<?php
class user_model extends CI_model{

	public function getDesa()
	{
		return $this->db->get('desa')->result_array();
	}

	public function getImunisasi()
	{
		return $this->db->get('imunisasi')->result_array();
	}

	
	public function getAnakById($id)
	{
		$this->db->select('*');
		$this->db->from('data_anak');
		$this->db->join('desa', 'data_anak.desa = desa.desa_id');

		$this->db->where('anak_id',$id);
		return $this->db->get()->row_array();
	}

	public function getPosyanduByDesa($desa)
	{
		$this->db->where('desa',$desa);
		return $this->db->get('posyandu')->row_array();
	}

	public function getAnak()
	{
		$this->db->select('*');
		$this->db->from('data_anak');
		$this->db->join('desa', 'data_anak.desa = desa.desa_id');
		$this->db->order_by('nama', 'ASC');
		return $this->db->get()->result_array();
	}




	
}




?>