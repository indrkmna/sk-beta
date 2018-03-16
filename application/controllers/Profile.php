<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model','mUsers');
		$this->load->model('upload_model','mUpload');
		$this->load->model('article_model','mArticle');
	}

	// Main Page
	public function view($username) {
		
		$site 	= $this->mConfig->list_config();
		$logged = $this->session->userdata('user_id'); 
		$user   = $this->users_model->profile($username);		
		$kode   = $this->mUpload->profileKode($username);			
		$review = $this->mUpload->profileRate($username);
		$article = $this->mArticle->listArtikelUser($username);
		

		$data = array(	'title'		=> $user['username'].' - '.$site['nameweb'],
						'site'		=> $site, 
						'user'		=> $user, 
						'kode'		=> $kode, 
						'review'	=> $review, 
						'article'	=> $article, 
						'isi'		=> 'profile/detail');
		$this->load->view('layout/wrapper',$data);
	}
	
}