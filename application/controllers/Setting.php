<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model','mUsers');
		$this->load->model('upload_model','mUpload');
	}


	// Profile Setting
	public function index() {

		$site 	= $this->mConfig->list_config();
		$logged = $this->session->userdata('user_id');
		$user   = $this->users_model->detail($logged);	 
		
		$v = $this->form_validation;

		$v->set_rules('email','Email','required',
		array(	'Email'	=> 'Email harus diisi'));
					
		
		if($v->run()) {
			if(!empty($_FILES['photo']['name'])) {			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('photo')) {
				
		$data = array(	'title'	=> 'Pengaturan Akun',
						'site'	=> $site,
						'user'	=> $user,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'profile/setting');
		$this->load->view('layout/wrapper_dashboard',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 166; // Pixel
				$config['height'] 			= 120; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$i = $this->input;
				$data = array(	'user_id'		=> $user['user_id'],
								'email'			=> $i->post('email'),
								'first_name'	=> $i->post('first_name'),
								'last_name'		=> $i->post('last_name'),
								'gender'		=> $i->post('gender'),
								'phone'			=> $i->post('phone'),
								'address'		=> $i->post('address'),
								'bio'			=> $i->post('bio'),
								'url_facebook'	=> $i->post('url_facebook'),
								'photo'			=> $upload_data['uploads']['file_name']
							);
				$this->mUsers->edit($data);
				$this->session->set_flashdata('sukses','Pengaturan berhasil dirubah');
				redirect(base_url('setting'));
		}}else{

				$i = $this->input;
				$data = array(	'user_id'		=> $user['user_id'],
								'email'			=> $i->post('email'),
								'first_name'	=> $i->post('first_name'),
								'last_name'		=> $i->post('last_name'),
								'gender'		=> $i->post('gender'),
								'phone'			=> $i->post('phone'),
								'address'		=> $i->post('address'),
								'bio'			=> $i->post('bio'),
								'url_facebook'	=> $i->post('url_facebook'),
							);
				$this->mUsers->edit($data);
				$this->session->set_flashdata('sukses','Pengaturan berhasil dirubah');
				redirect(base_url('setting'));
		}}			
		// Default page
		$data = array(	'title'	=> 'Pengaturan Akun',
						'site'	=> $site,
						'user'	=> $user,
						'isi'	=> 'profile/setting');
		$this->load->view('layout/wrapper_dashboard',$data);
	}

     public function check_user()
	{             
		if(isset($_POST))
                {
                    $username = $_POST['username'];
                    $this->users_model->check_user($username); 
                }
	}	

	// Setting Profile
	public function login() {
		
		$site 	= $this->mConfig->list_config();
		$logged = $this->session->userdata('user_id');
		$user   = $this->users_model->detail($logged);			
	
		$v = $this->form_validation;
		
		if ($this->input->post('username') == $user['username']){
			$v->set_rules('username', 'Username', 'required');
		}else{
			$v->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
		}

		$v->set_rules('password', 'password', 'trim|required|sha1');
		$v->set_rules('confirm_password', 'Confirm Password', 'required|sha1|matches[password]');

		if($v->run()=== FALSE) {
				
		$data = array(	'title'	=> 'Setting - '.$user['username'],
						'site'	=> $site,
						'user'	=> $user,
						'isi'	=> 'profile/setting');
		$this->load->view('layout/wrapper_dashboard',$data);
		
		}else{	
				$i = $this->input;
				$tgl= date('Y-m-d H:i:s');
				$data = array(	'user_id'	=> $user['user_id'],
								'username'	=> $i->post('username'),
								'password'	=> $i->post('password'),
				 			 );

				$this->mUsers->edit($data);
				$this->session->set_flashdata('sukses','Peraturan berhasil diupdate');
				redirect(base_url('setting'));
		}
	}	
}	