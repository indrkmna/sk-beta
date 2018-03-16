<?php
	/*
    @Copyright sedotkode.com
    @Class Name : Article
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('site_model','mConfig');
		$this->load->model('faq_model','mFaq');
	}	
/* 
	Function Create
*/
				
	// Create Article
	public function index() {
		
		$site 	  	= $this->mConfig->list_config();
		$endFaq  	= $this->mFaq->endFaq();
		$faq  		= $this->mFaq->listFaq();
		
		$v = $this->form_validation;
		$v->set_rules('faq_name','Judul','required');
		
		if($v->run()=== FALSE) {
				
		$data = array(	'title'			=> 'FAQ - '.$site['nameweb'],
						'site'			=> $site,
						'faq'			=> $faq,
						'isi'			=> 'admin/faq/list');
		$this->load->view('admin/layout/wrapper',$data);
		
		}else{	
				$i = $this->input;
				$tgl= date('Y-m-d H:i:s');
				$data = array(	'faq_name'			=> $i->post('faq_name'),
								'faq_description'	=> $i->post('faq_description'),
								'status'			=> $i->post('status'),
								'modified'			=> $tgl,
								'created'			=> $tgl,
								'user_id'			=> $this->session->userdata('user_id')
				 			 );

				$this->mFaq->createFaq($data);
				$this->session->set_flashdata('sukses','Faq barhasil ditambah');
				redirect(base_url('admin/faq'));
		}
	}	

/* 
	Function Edit 
*/

	public function edit($faq_id) {

		$site 		= $this->mConfig->list_config();
		$faq		= $this->mFaq->detailFaq($faq_id);		

		// Validation
		$v = $this->form_validation;
		$v->set_rules('faq_name','Judul','required');
		
		if($v->run()=== FALSE) {
		
		$data = array(	'title'		=> 'Edit FAQ - '.$site['nameweb'],
						'faq'		=> $faq,
						'isi'		=> 'admin/faq/edit');
		$this->load->view('admin/layout/wrapper', $data);
		
		}else{	
			
			$i = $this->input;
			$tgl= date('Y-m-d H:i:s');
			$data = array(	'faq_id'			=> $faq['faq_id'],
							'faq_name'			=> $i->post('faq_name'),
							'faq_description'	=> $i->post('faq_description'),
							'status'			=> $i->post('status'),
							'modified'			=> $tgl,
							'user_id'			=> $this->session->userdata('user_id')
							);
			$this->mFaq->editFaq($data);
			$this->session->set_flashdata('sukses','Faq telah diedit');
			redirect(base_url('admin/faq'));	
		
		}
	}
	
/* 
	Function Delete
*/

	// Delete Article
	public function delete($faq_id) {
		$data = array('faq_id'	=> $faq_id);
		$this->mFaq->deleteFaq($data);		
		$this->session->set_flashdata('sukses','Faq berhasil dihapus');
		redirect(base_url('admin/faq'));
	}
					
}