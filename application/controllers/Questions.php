<?php
	/*
    @Copyright sedotkode.com
    @Class Name : Quesitons
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Questions extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('upload_model','mUpload');
	}	
	
	public function index() {

		$site 	  	= $this->mConfig->list_config();
				
		$data = array(	'title'		=> 'Halaman sedang diperbaiki',			
						'site' 		=> $site,
						'pagin' 	=> $this->pagination->create_links(),
						'isi'		=> 'questions/content');
		$this->load->view('layout/wrapper',$data);	
	}
}