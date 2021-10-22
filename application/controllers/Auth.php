<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('auth_model');
	}

	public function index()
	{
		if ($this->session->userdata('username')) {
			redirect('user');
		}else{

				
				$this->form_validation->set_rules('username', 'Username', 'required|trim',[
					'required'=>'Username belum diisi'
					]);
				$this->form_validation->set_rules('password', 'Password', 'required|trim', [
					'required'=>'Password belum diisi'
					]);

				if ($this->form_validation->run() == false){
					$data['tittle'] = "FORM LOGIN" ;
					$this->load->view('auth/login',$data);
				}else{
					$this->_login();
				}
			}
		
	}

	private function _login()
	{
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->db->get_where('user',['username'=> $username])->row_array();
		if($user){
		
				if (password_verify($password, $user['password'])){
					$data = [
							'nama' => $user['nama'],
							'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id']==1){
						redirect('admin');
					}elseif ($user['role_id']==2){
						redirect('user');
					}elseif ($user['role_id']==3){
						redirect('guest');
					}else{
						redirect('auth');
					}
					
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password yang dimasukkan salah</div>');
					redirect('auth');
				}

		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username yang dimasukkan salah</div>');
			redirect('auth');
		}
	}

	

	public function logout()
	{
		// $data = [
		// 			'email' => $this->session->userdata('email'),
		// 			'role_id' => $this->session->userdata('role_id')
		// 		];
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Anda Telah Berhasil Keluar</div>');
		redirect('auth');
	}

}
