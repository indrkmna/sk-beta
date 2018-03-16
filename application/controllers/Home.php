<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('article_model','mArticles');
		$this->load->model('users_model','mUsers');
		$this->load->model('cat_model','mCat');
		$this->load->model('upload_model','mUpload');
	}	
	
	// Main Page
	public function index() {
		
		$site 		= $this->mConfig->list_config();
		$article 	= $this->mArticles->listArtikelPub();
		$cat 		= $this->mCat->listCatHome();
		$explore 	= $this->mUpload->listUploadHome();

		$data = array(	'title'		=> $site['nameweb'],
						'site'		=> $site, 
						'article'	=> $article, 
						'explore'	=> $explore, 
						'cat'		=> $cat, 
						'isi'		=> 'home/content');
		$this->load->view('layout/wrapper',$data);
	}
	
	// Main Page
	public function faq() {
		
		$site 		= $this->mConfig->list_config();

		$data = array(	'title'		=> 'FAQ -'.$site['nameweb'],
						'site'		=> $site, 
						'isi'		=> 'home/faq');
		$this->load->view('layout/wrapper',$data);
	}
	
	// 404 Page
	public function error() {
		
		$site = $this->mConfig->list_config();

		$data = array(	'title'		=> '404 -'.$site['nameweb'],
						'site'		=> $site, 
						'isi'		=> 'home/error');
		$this->load->view('layout/wrapper',$data);
	}	
}