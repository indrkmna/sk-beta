<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('statistics_model');
		$this->load->model('upload_model');
		$this->load->model('article_model');
	}

	// Main Page
	public function index() {
		
		$site 	= $this->mConfig->list_config();
		$logged = $this->session->userdata('user_id');
		$user   = $this->users_model->detail($logged);		

		$detailKode 	= $this->upload_model->listUploadUser($logged);
		$detailArticle 	= $this->article_model->listArticleUser($logged);

		$data = array(	'title'		=> 'Dashboard - '.$site['nameweb'],
						'site'		=> $site, 
						'user'		=> $user, 
						'detailKode'=> $detailKode, 
						'detailArticle'=> $detailArticle, 
						'reviews'	=> $this->statistics_model->TotalReviews($logged),		 
						'activeKode'=> $this->statistics_model->listKodePublish($logged),					
						'isi'		=> 'dashboard/content');
		$this->load->view('layout/wrapper_dashboard',$data);
	}
}