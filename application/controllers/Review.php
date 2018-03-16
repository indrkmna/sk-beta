<?php
	/*
    @Copyright sedotkode.com
    @Class Name : review
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('upload_model','mUpload');
		$this->load->model('users_model','mUsers');
		$this->load->model('cat_model','mCat');
	}	
	
	public function index() {

		$site 	  	= $this->mConfig->list_config();
		$user_id = $this->session->userdata('user_id');
		$yReview 	= $this->mUpload->yourReview($user_id);
		$review 	= $this->mUpload->listRate($user_id);
		
		

		// End Pagination		
		
		$data = array(	'title'		=> 'Review Kode Visitor- '.$site['nameweb'],			
						'site' 		=> $site,
						'review'	=> $review,				
						'yReview'	=> $yReview,				
						//'category'	=> $category,
						'pagin' 	=> $this->pagination->create_links(),
						'isi'		=> 'review/list');
		$this->load->view('layout/wrapper_dashboard',$data);	
	}
		
}