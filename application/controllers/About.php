<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('article_model','mArticles');
	}	
	
	// Main Page
	public function index() {
		
		$site 	= $this->mConfig->list_config();

		$data = array(	'title'		=> 'Tentang -'.$site['nameweb'],
						'site'		=> $site, 
						'isi'		=> 'home/about');
		$this->load->view('layout/wrapper',$data);
	}
}