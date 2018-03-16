<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
    function __construct() {
		parent::__construct();
		
		// Load facebook library
		$this->load->library('facebook');

    }	
	
	public function login() {
		
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
	    $this->facebook->destroy_session();
		$this->user_login->logout();
	}	
	
    public function facebook(){
		$userData = array();
		
		// Check if user is logged in
		if($this->facebook->is_authenticated()){
			// Get user facebook profile details
			$userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');

            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];
            $userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
            $userData['gender'] = $userProfile['gender'];
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userData['picture_url'] = $userProfile['picture']['data']['url'];
			
            // Insert or update user data
            $userID = $this->user->checkUser($userData);
			
			// Check user data insert or update status
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            } else {
               $data['userData'] = array();
            }
			
			// Get logout URL
			$data['logoutUrl'] = $this->facebook->logout_url();
		}else{
            $fbuser = '';
			
			// Get login URL
            $data['authUrl'] =  $this->facebook->login_url();
        }
		
		// Load login & profile view
        $this->load->view('user_authentication/index',$data);
    }

	
}