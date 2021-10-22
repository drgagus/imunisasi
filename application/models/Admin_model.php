<?php
class admin_model extends CI_model{

	public function getPetugas($awal,$akhir)
	{
		$this->db->distinct();
		$this->db->select('nakes');
		$this->db->where('posyandu !=', 0) ;
		$this->db->where('tanggal <=', $akhir) ;
		$this->db->where('tanggal >=', $awal) ;
		$this->db->order_by('nakes', 'ASC');
		return $this->db->get('kunjungan')->result_array();
	}

	public function getTanggalH($nakes,$awal,$akhir)
	{
		$this->db->distinct();
		$this->db->select('tanggal');
		$this->db->where('nakes =', $nakes) ;
		$this->db->where('posyandu !=', 0) ;
		$this->db->where('tanggal <=', $akhir) ;
		$this->db->where('tanggal >=', $awal) ;
		$this->db->order_by('tanggal', 'ASC');
		return $this->db->get('kunjungan')->result_array();
	}

	public function getPosyanduH($nakes,$tanggalturun,$awal,$akhir)
	{
		$this->db->distinct();
		$this->db->select('posyandu');
		$this->db->where('nakes =', $nakes) ;
		$this->db->where('posyandu !=', 0) ;
		$this->db->where('tanggal =', $tanggalturun) ;
		$this->db->where('tanggal <=', $akhir) ;
		$this->db->where('tanggal >=', $awal) ;
		$this->db->order_by('tanggal', 'ASC');
		return $this->db->get('kunjungan')->result_array();
	}

	public function namaPosyanduById($id)
	{
		$this->db->where('posyandu_id =', $id) ;
		return $this->db->get('posyandu')->row_array();
	}

	public function posyanduAnak($desa)
	{
		$this->db->where('desa =', $desa) ;
		return $this->db->get('posyandu')->result_array();
	}

	public function getDesa()
	{
		
		return $this->db->get('desa')->result_array();
	}

	public function getPosyanduNotSweeping()
	{
		$this->db->where('posyandu_id !=', 100) ;
		return $this->db->get('posyandu')->result_array();
	}

	public function getDesaNotPendatang()
	{
		$this->db->where('desa_id !=', 100) ;
		return $this->db->get('desa')->result_array();
	}

	public function getPosyandu()
	{
		return $this->db->get('posyandu')->result_array();
	}

	public function getNakes()
	{
		return $this->db->get('user')->result_array();
	}

	public function getNakesById($id)
	{
		$this->db->where('user_id', $id) ;
		return $this->db->get('user')->row_array();
	}

	public function getImunisasi()
	{
		return $this->db->get('imunisasi')->result_array();
	}

	public function getImunisasiById($id)
	{
		$this->db->where('imun_id', $id) ;
		return $this->db->get('imunisasi')->row_array();
	}

	
	public function getAnak()
	{
		$this->db->select('*');
		$this->db->from('data_anak');
		$this->db->join('desa', 'data_anak.desa = desa.desa_id');
		$this->db->order_by('tahun', 'DESC');
		return $this->db->get()->result_array();
	}

	// public function getAnakById($id)
	// {
	// 	$this->db->where('anak_id',$id);
	// 	return $this->db->get('data_anak')->row_array();
	// }

	public function getUser($nama)
	{
		$this->db->where('nama',$nama);
		return $this->db->get('user')->row_array();
	}

	public function changePassword($nama, $new_password)
	{
		$this->db->set('password',password_hash($new_password,PASSWORD_DEFAULT));
		$this->db->where('nama',$nama);
		$this->db->update('user');
	}

	public function editAnak($id,$data)
	{
		$this->db->where('anak_id', $id);
		$this->db->update('data_anak', $data);
	}

	public function deleteAnak($id)
	{
		$this->db->where('anak_id', $id);
		$this->db->delete('data_anak');
	}

	public function deleteKunjungan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('kunjungan');
	}

	public function getAnakById($id)
	{
		$this->db->select('*');
		$this->db->from('data_anak');
		$this->db->join('posyandu', 'data_anak.posyandu = posyandu.posyandu_id');
		$this->db->join('desa', 'data_anak.desa = desa.desa_id');
		$this->db->where('anak_id',$id);
		return $this->db->get()->row_array();
	}

	public function getSatuAnak($id)
	{
		$this->db->where('anak_id',$id);
		return $this->db->get('data_anak')->row_array();
	}

	public function getKunjunganAnakId($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('kunjungan')->row_array();
	}

	public function editKunjungan($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('kunjungan', $data);
	}

	public function anakTerakhir()
	{
		$this->db->order_by('anak_id', 'DESC');
		return $this->db->get('data_anak')->row_array();
	}

	public function thisMonth($bulanini,$tahunini,$posyandu)
	{
		$this->db->distinct();
		$this->db->select('tanggal');
		$this->db->where('posyandu =',$posyandu);
		$this->db->where('MONTH(tanggal) =',$bulanini);
		$this->db->where('YEAR(tanggal) =',$tahunini);	
		$this->db->order_by('tanggal', 'ASC');
		return $this->db->get('kunjungan')->result_array();
	}

	public function posyanduThisMonth($tanggal)
	{
		$this->db->where('tanggal =',$tanggal);
		return $this->db->get('kunjungan')->result_array();
	}

	public function getAnakByPosyanduByDate($posyandu,$tanggal)
	{
		$this->db->select('*');
		$this->db->from('kunjungan');
		$this->db->where('tanggal =',$tanggal);
		$this->db->where('posyandu =',$posyandu);
		return $this->db->get()->result_array();
	}

	public function getAnakByKeyword($keyword)
	{
		$this->db->like('ibu', $keyword); 
		$this->db->or_like('nama', $keyword);
		return $this->db->get('data_anak')->result_array();
	}



	
}




?>