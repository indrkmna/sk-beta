<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('upload_model','mUpload');
		$this->load->model('files_model','mFiles');
	}

	// Main Page
	public function file($upload_id) {
		
		$site 	= $this->mConfig->list_config();
		$logged = $this->session->userdata('user_id');
		$user   = $this->users_model->detail($logged);
		$upload = $this->mUpload->detailUpload($upload_id);
		$files 	= $this->mFiles->listByUploadID($upload_id);

		if ($logged == true){ 				

		$data = array(	'title'		=> 'Download File - '.$site['nameweb'],
						'site'		=> $site, 
						'user'		=> $user, 
						'upload'	=> $upload,
						'files'		=> $files,
						'isi'		=> 'explore/download');
		$this->load->view('layout/wrapper',$data);
		
		}else{

			$this->session->set_flashdata('sukses','Opps anda harus login dulu');
			redirect(base_url('login'));
		}
	}
}