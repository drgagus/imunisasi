<?php
class guest_model extends CI_model{

	public function getDesaNotPendatang()
	{
		$this->db->where('desa_id !=', 100) ;
		return $this->db->get('desa')->result_array();
	}


	public function getImunisasi()
	{
		return $this->db->get('imunisasi')->result_array();
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