<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->model('guest_model');

		if ($this->session->userdata('role_id') == 1 ){
			redirect('admin');
		}elseif($this->session->userdata('role_id') == 2 ){
			redirect('user');
		}elseif($this->session->userdata('role_id') == 3 ){
			
		}else{
			redirect('auth');
		}

	}

	public function index()
	{
		$data['title'] = 'Rekapitulasi IDL';
		$data['user'] = $this->session->userdata('nama') ;
		$data['desa']= $this->guest_model->getDesaNotPendatang();

		$this->form_validation->set_rules('tahun', 'Tahun', 'required|trim|is_natural',[
					'required'=>'Tahun rekapitulasi belum diisi',
					'is_natural'=>'Isi dengan angka saja'
					]);

		if ($this->form_validation->run() == false){
				$this->load->view('templates/header_guest.php', $data);
				$this->load->view('guest/index' , $data);
				$this->load->view('guest/indexrekapitulasi' , $data);
				$this->load->view('templates/footer_guest', $data);
		}else{
				$data['tahunsasaran'] = $this->input->post('tahun') ;
				$data['user'] = $this->session->userdata('nama') ;
				$data['imunisasi']= $this->guest_model->getImunisasi();
				$data['anak']= $this->guest_model->getAnak();
				$data['title'] = 'Rekapitulasi IDL';

				$this->load->view('templates/header_guest.php', $data);
				$this->load->view('guest/index' , $data);
				$this->load->view('guest/rekapitulasi' , $data);
				$this->load->view('templates/footer_guest', $data);
		}

	}


}



?>