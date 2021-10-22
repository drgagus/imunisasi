<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('role_id') == 1 ){
			
		}elseif($this->session->userdata('role_id') == 2 ){
			redirect('user');
		}else{
			redirect('auth');
		}

		$this->load->library('form_validation');
		$this->load->model('admin_model');

	}

	public function index()
	{
		$data['user'] = $this->session->userdata('nama') ;
		$data['desa']= $this->admin_model->getDesa();
		$data['imunisasi']= $this->admin_model->getImunisasi();
		$data['posyandu']= $this->admin_model->getPosyandu();
		$data['anak']= $this->admin_model->getAnak();
		$data['title'] = 'Imunisasi';
		$data['bulan'] = date('m');
		$data['tahun'] = date('Y');


		
		$this->load->view('templates/header.php', $data);
		$this->load->view('admin/index' , $data);
		$this->load->view('admin/kunjunganposyandu' , $data);
		$this->load->view('templates/footer', $data);

	}

	public function kunjungan($bulan,$tahun)
	{
		$data['user'] = $this->session->userdata('nama') ;
		$data['desa']= $this->admin_model->getDesa();
		$data['imunisasi']= $this->admin_model->getImunisasi();
		$data['posyandu']= $this->admin_model->getPosyandu();
		$data['anak']= $this->admin_model->getAnak();
		$data['title'] = 'Imunisasi';
		$data['bulan'] = $bulan ;
		$data['tahun'] = $tahun ;


		
		$this->load->view('templates/header.php', $data);
		$this->load->view('admin/index' , $data);
		$this->load->view('admin/kunjunganposyandu' , $data);
		$this->load->view('templates/footer', $data);

	}

	public function dataanakdesa()
	{
		$data['user'] = $this->session->userdata('nama') ;
		$data['desa']= $this->admin_model->getDesa();
		$data['desabu']= $this->admin_model->getDesaNotPendatang();
		$data['imunisasi']= $this->admin_model->getImunisasi();
		$data['anak']= $this->admin_model->getAnak();
		$data['title'] = 'Data Anak/Desa';


		
		$this->load->view('templates/header.php', $data);
		$this->load->view('admin/anakdesa' , $data);
		$this->load->view('admin/dataanakdesa' , $data);
		$this->load->view('templates/footer', $data);

	}

	public function dataanakposyandu()
	{
		$data['user'] = $this->session->userdata('nama') ;
		$data['desa']= $this->admin_model->getDesa();
		$data['posyandu']= $this->admin_model->getPosyanduNotSweeping();
		$data['imunisasi']= $this->admin_model->getImunisasi();
		$data['anak']= $this->admin_model->getAnak();
		$data['title'] = 'Data Anak/Posyandu';


		
		$this->load->view('templates/header.php', $data);
		$this->load->view('admin/anakposyandu' , $data);
		$this->load->view('admin/dataanakposyandu' , $data);
		$this->load->view('templates/footer', $data);

	}

	public function honorium()
	{
		$data['user'] = $this->session->userdata('nama') ;
		$data['desa']= $this->admin_model->getDesa();
		$data['imunisasi']= $this->admin_model->getImunisasi();
		$data['anak']= $this->admin_model->getAnak();
		$data['title'] = 'Honorium Petugas';

		$this->form_validation->set_rules('tanggal_mulai', 'Tanggal_mulai', 'required|trim',[
					'required'=>'Tanggal mulai belum diisi'
					]);

		$this->form_validation->set_rules('tanggal_akhir', 'Tanggal_akhir', 'required|trim',[
					'required'=>'Tanggal akhir belum diisi'
					]);

		$this->form_validation->set_rules('cost_posyandu', 'Cost_posyandu', 'required|trim|is_natural',[
					'required'=>'Honorium petugas posyandu belum diisi',
					'is_natural'=>'Isi dengan angka saja'
					]);

		$this->form_validation->set_rules('cost_sweeping', 'Cost_sweeping', 'required|trim|is_natural',[
					'required'=>'Honorium petugas sweeping belum diisi',
					'is_natural'=>'Isi dengan angka saja'
					]);

		if ($this->form_validation->run() == false){	
			$this->load->view('templates/header.php', $data);
			$this->load->view('admin/honorium' , $data);
			$this->load->view('templates/footer', $data);
		}else{
			$data['tanggalmulai'] = $this->input->post('tanggal_mulai') ;
			$data['tanggalakhir'] = $this->input->post('tanggal_akhir') ;
			$data['costposyandu'] = $this->input->post('cost_posyandu') ;
			$data['costsweeping'] = $this->input->post('cost_sweeping') ;
			$data['nakes'] = $this->admin_model->getPetugas($data['tanggalmulai'],$data['tanggalakhir']);

			$this->load->view('templates/header.php', $data);
			$this->load->view('admin/honorium' , $data);
			$this->load->view('admin/daftarhonor' , $data);
			$this->load->view('templates/footer', $data);
		}

	}

	public function rekapitulasi($tahun)
	{
		$data['tahunsasaran'] = $tahun ;
		$data['user'] = $this->session->userdata('nama') ;
		$data['desa']= $this->admin_model->getDesaNotPendatang();
		$data['imunisasi']= $this->admin_model->getImunisasi();
		$data['anak']= $this->admin_model->getAnak();
		$data['title'] = 'Rekapitulasi IDL';


		
		$this->load->view('templates/header.php', $data);
		$this->load->view('admin/rekap' , $data);
		$this->load->view('admin/rekapitulasi' , $data);
		$this->load->view('templates/footer', $data);

	}

	public function add()
	{
		$data['user'] = $this->session->userdata('nama') ;
		$data['desa']= $this->admin_model->getDesa();
		$data['imunisasi']= $this->admin_model->getImunisasi();
		$data['anak']= $this->admin_model->getAnak();
		$data['title'] = 'Tambah Data Anak Baru';

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
					'required'=>'Nama anak belum diisi'
					]);
		$this->form_validation->set_rules('ibu', 'Ibu', 'required|trim', [
					'required'=>'Nama ibu belum diisi'
					]);
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal_lahir', 'required|trim',[
					'required'=>'Tanggal lahir anak belum diisi'
					]);
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis_kelamin', 'required|trim',[
					'required'=>'Jenis kelamin anak belum diisi'
					]);
		$this->form_validation->set_rules('desa', 'Desa', 'required|trim', [
					'required'=>'Alamat desa belum diisi'
					]);
		$this->form_validation->set_rules('posyandu', 'Posyandu', 'required|trim', [
					'required'=>'Posyandu anak belum diisi'
					]);
		$this->form_validation->set_rules('tahun', 'Tahun', 'required|trim', [
					'required'=>'Tahun sasaran belum diisi'
					]);


		if ($this->form_validation->run() == false){

			$this->load->view('templates/header.php', $data);
			$this->load->view('admin/add' , $data);
			// $this->load->view('admin/dataanakdesa' , $data);
			$this->load->view('templates/footer', $data);

		}else{
			$data = [
					'nama' => $this->input->post('nama'),
					'ibu' => $this->input->post('ibu'),
					'tanggal_lahir' => $this->input->post('tanggal_lahir'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'desa' => $this->input->post('desa'),
					'posyandu' => $this->input->post('posyandu'),
					'tahun' => $this->input->post('tahun')
			];
			$this->db->insert('data_anak',$data);
			$anakterakhir = $this->admin_model->anakTerakhir();

			$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Anak baru berhasil ditambahkan.</div>');
			redirect('admin/detail/'.$anakterakhir["anak_id"]);
		}

	}


	public function edit($anak)
	{
		$data['user'] = $this->session->userdata('nama') ;
		$data['desa']= $this->admin_model->getDesa();
		$data['imunisasi']= $this->admin_model->getImunisasi();
		$data['anak']= $this->admin_model->getAnak();
		$data['satuanak']= $this->admin_model->getSatuAnak($anak);
		$data['posyanduanak'] = $this->admin_model->posyanduAnak($data['satuanak']['desa']);
		$data['title'] = 'Edit Data Anak';

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
					'required'=>'Nama anak belum diisi'
					]);
		$this->form_validation->set_rules('ibu', 'Ibu', 'required|trim', [
					'required'=>'Nama ibu belum diisi'
					]);
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal_lahir', 'required|trim',[
					'required'=>'Tanggal lahir anak belum diisi'
					]);
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis_kelamin', 'required|trim',[
					'required'=>'Jenis kelamin anak belum diisi'
					]);
		$this->form_validation->set_rules('desa', 'Desa', 'required|trim', [
					'required'=>'Alamat desa belum diisi'
					]);
		$this->form_validation->set_rules('posyandu', 'Posyandu', 'required|trim', [
					'required'=>'Posyandu anak belum diisi'
					]);
		$this->form_validation->set_rules('tahun', 'Tahun', 'required|trim', [
					'required'=>'Tahun sasaran belum diisi'
					]);


		if ($this->form_validation->run() == false){

			$this->load->view('templates/header.php', $data);
			$this->load->view('admin/edit' , $data);
			// $this->load->view('admin/dataanakdesa' , $data);
			$this->load->view('templates/footer', $data);

		}else{
			$data = [
					'nama' => $this->input->post('nama'),
					'ibu' => $this->input->post('ibu'),
					'tanggal_lahir' => $this->input->post('tanggal_lahir'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'desa' => $this->input->post('desa'),
					'posyandu' => $this->input->post('posyandu'),
					'tahun' => $this->input->post('tahun')
			];

			$this->admin_model->editAnak($anak,$data);
			$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Data anak berhasil diedit.</div>');
			redirect('admin/detail/'.$anak);
		}

	}

	public function delete($anak)
	{
		$this->admin_model->deleteAnak($anak);
		$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Data anak berhasil dihapus.</div>');
		redirect('admin');
	}

	public function deletekunjungan($id)
	{
		$anak = $this->admin_model->getKunjunganAnakId($id);
		$anakid = $anak['anak'];
		$this->admin_model->deletekunjungan($id);
		$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Data kunjungan berhasil dihapus.</div>');
		redirect('admin/detail/'.$anakid);
	}

	public function imunisasi($anak)
	{
		$data['user'] = $this->session->userdata('nama') ;	
		$data['desa']= $this->admin_model->getDesa();
		$data['imunisasi']= $this->admin_model->getImunisasi();
		$data['posyandu']= $this->admin_model->getPosyandu();
		$data['nakes']= $this->admin_model->getNakes();
		$data['anak']= $this->admin_model->getAnak();
		$data['satuanak']= $this->admin_model->getAnakById($anak);
		$data['title'] = 'Kunjungan Imunisasi Anak';

		$this->form_validation->set_rules('posyandu', 'Posyandu', 'required|trim',[
					'required'=>'Posyandu belum diisi'
					]);
		$this->form_validation->set_rules('nakes', 'Nakes', 'required|trim', [
					'required'=>'Petugas belum diisi'
					]);

		if ($this->form_validation->run() == false){
				$this->load->view('templates/header.php', $data);
				$this->load->view('admin/imunisasi' , $data);
				// $this->load->view('admin/dataanakdesa' , $data);
				$this->load->view('templates/footer', $data);
		}else{

			foreach ($data['imunisasi'] as $imunisasi) :
				if ($this->input->post('tanggal'.$imunisasi['imun_id'])) {
					$data = [
					'anak' => $this->input->post('anak'),
					'tanggal' => $this->input->post('tanggal'.$imunisasi['imun_id']),
					'imunisasi' => $this->input->post('imunisasi'.$imunisasi['imun_id']),
					'posyandu' => $this->input->post('posyandu'),
					'nakes' => $this->input->post('nakes')
					];

					$this->db->insert('kunjungan',$data);
				}
			endforeach ;
			$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Data imunisasi berhasil diinput.</div>');
			redirect('admin/detail/'.$anak);

		}

	}

	public function detail($anak)
	{
		$data['user'] = $this->session->userdata('nama') ;
		$data['desa']= $this->admin_model->getDesa();
		$data['imunisasi']= $this->admin_model->getImunisasi();
		$data['anak']= $this->admin_model->getAnak();
		$data['satuanak']= $this->admin_model->getAnakByid($anak);
		$data['title'] = 'Detail Data Anak';


		
		$this->load->view('templates/header.php', $data);
		$this->load->view('admin/detail' , $data);
		// $this->load->view('admin/dataanakdesa' , $data);
		$this->load->view('templates/footer', $data);

	}

	public function editkunjungan($anak,$id)
	{
		$data['user'] = $this->session->userdata('nama') ;
		$data['desa']= $this->admin_model->getDesa();
		$data['imunisasi']= $this->admin_model->getImunisasi();
		$data['posyandu']= $this->admin_model->getPosyandu();
		$data['nakes']= $this->admin_model->getNakes();
		$data['anak']= $this->admin_model->getAnak();
		$data['satuanak']= $this->admin_model->getAnakByid($anak);
		$data['kunjungan']= $this->admin_model->getKunjunganAnakId($id);
		$data['title'] = 'Edit Kunjungan Imunisasi Anak';

		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim',[
					'required'=>'tanggal belum diisi'
					]);
		$this->form_validation->set_rules('imunisasi', 'Imunisasi', 'required|trim', [
					'required'=>'Jenis imunisasi belum diisi'
					]);
		$this->form_validation->set_rules('posyandu', 'Posyandu', 'required|trim',[
					'required'=>'posyandu belum diisi'
					]);
		$this->form_validation->set_rules('nakes', 'Nakes', 'required|trim',[
					'required'=>'Nama petugas belum diisi'
					]);

		if ($this->form_validation->run() == false){
			$this->load->view('templates/header.php', $data);
			$this->load->view('admin/editkunjungan' , $data);
			// $this->load->view('admin/dataanakdesa' , $data);
			$this->load->view('templates/footer', $data);
		}else{

			$data = [
					'anak' => $this->input->post('anak'),
					'tanggal' => $this->input->post('tanggal'),
					'imunisasi' => $this->input->post('imunisasi'),
					'posyandu' => $this->input->post('posyandu'),
					'nakes' => $this->input->post('nakes')
					];

			$this->admin_model->editKunjungan($id,$data);
			$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Data kunjungan berhasil diedit.</div>');
			redirect('admin/detail/'.$anak);
		}

	}


	public function password()
	{
		$data['user'] = $this->session->userdata('nama') ;
		$data['desa']= $this->admin_model->getDesa();
		$data['imunisasi']= $this->admin_model->getImunisasi();
		$data['anak']= $this->admin_model->getAnak();
		$data['title'] = 'Imunisasi';

		$nama = $this->session->userdata('nama');
		$data['datauser']= $this->admin_model->getUser($nama);

		$this->form_validation->set_rules('old_password', 'old_password', 'required|trim',[
			'required'=>'Password lama harus diisi'
		]);
		$this->form_validation->set_rules('new_password1', 'new_password1', 'required|trim|min_length[3]|matches[new_password2]', [
			'required'=>'Password baru harus diisi',
			'min_length' => 'Password terlalu pendek',
			'matches' => 'Password baru tidak sama'
			]);
		$this->form_validation->set_rules('new_password2', 'new_password2', 'required|trim|matches[new_password1]',[
			'required'=>'Password baru harus diisi',
			'matches' => 'Password baru tidak sama'
		]);


		if ($this->form_validation->run()==false){
			$this->load->view('templates/header.php', $data);
			$this->load->view('admin/password' , $data);
			$this->load->view('templates/footer', $data);
		}else{
			$current_password = $data['datauser']['password'];
			$old_password = $this->input->post('old_password');
			$new_password = $this->input->post('new_password1');
				if (!password_verify($old_password,$current_password)){
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Lama Salah!</div>');
					redirect('admin/password');
				}else{
							if (password_verify($new_password,$current_password)){
							$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Baru Tidak Boleh Sama Dengan Password Lama!</div>');
							redirect('admin/password');
							}else{
								$this->admin_model->changePassword($nama,$new_password);
								$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Password Berhasil Diubah</div>');
							redirect('admin/password');

							}
				}

		}
		
	}


	public function search()
	{
		$data['user'] = $this->session->userdata('nama') ;
		$data['title'] = 'Pencarian Anak/Ibu';
		$data['anak']= $this->admin_model->getAnak();
		$data['keyword'] = $this->input->post('keyword');
		$data['anakkeyword'] = $this->admin_model->getAnakByKeyword($data['keyword']);

		
		$this->load->view('templates/header.php', $data);
		$this->load->view('admin/search' , $data);
		$this->load->view('templates/footer', $data);

	}


	

}



?>