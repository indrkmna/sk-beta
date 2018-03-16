<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function index() {
		
		$logged = $this->session->userdata('user_id');
		if ($logged == FALSE) {	

		// Validasi
		$valid 		= $this->form_validation;
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');
		$valid->set_rules('username','Username','required');
		$valid->set_rules('password','Password','required');	
		if($valid->run()) {
			$this->user_login->login($username,$password,base_url('dashboard'), base_url('signin'));
		}
		
		$site = $this->mConfig->list_config();

		$data = array (	'title' => 'Login - '.$site['nameweb'],
						'site' 	=> $site,
						'isi'   => 'login_view');
		$this->load->view('layout/wrapper',$data);
		
		}else{	
			redirect(base_url('dashboard'));			
		}}
	

	public function logout() {
		$this->user_login->logout();
	}	
}