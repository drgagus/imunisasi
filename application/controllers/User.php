<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->model('user_model');

		if ($this->session->userdata('role_id') == 1 ){
			redirect('admin');
		}elseif($this->session->userdata('role_id') == 2 ){

		}else{
			redirect('auth');
		}



	}

	public function index()
	{
		$data['user'] = $this->session->userdata('nama') ;
		$data['desa']= $this->user_model->getDesa();
		$data['imunisasi']= $this->user_model->getImunisasi();
		$data['anak']= $this->user_model->getAnak();
		$data['title'] = 'Imunisasi';


		
		$this->load->view('templates/header.php', $data);
		$this->load->view('user/index' , $data);
		$this->load->view('user/daftaranak' , $data);
		$this->load->view('templates/footer', $data);

	}


	public function posyandu($desa,$anak)
	{
		$data['user'] = $this->session->userdata('nama') ;	
		$data['desa']= $this->user_model->getDesa();
		$data['imunisasi']= $this->user_model->getImunisasi();
		$data['posyandu']= $this->user_model->getPosyanduByDesa($desa);
		$data['anak']= $this->user_model->getAnak();
		$data['satuanak']= $this->user_model->getAnakById($anak);
		$data['title'] = 'Imunisasi';


		
		$this->load->view('templates/header.php', $data);
		$this->load->view('user/posyandu' , $data);
		$this->load->view('user/daftaranak' , $data);
		$this->load->view('templates/footer', $data);

	}

	
	

}



?>