<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('article_model','mArticles');
		$this->load->model('faq_model','mFaq');
	}	
	
	// Main Page
	public function index() {
		
		$site 		= $this->mConfig->list_config();
		$faq 		= $this->mFaq->listFaq();

		$data = array(	'title'		=> 'FAQ -'.$site['nameweb'],
						'site'		=> $site, 
						'faq'		=> $faq, 
						'isi'		=> 'home/faq');
		$this->load->view('layout/wrapper',$data);
	}
}