<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {		

	public function __construct(){
		parent::__construct();
		$this->load->model('config_model','mConfig');
		$this->load->model('contact_model','mContact');
	}

	// Index
	public function index() {
		
		$site  = $this->mConfig->list_config();
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('sender','Nama','required',
			array(	'required'		=> 'Nama harus diisi'));
		$valid->set_rules('email','Email','required',
			array(	'required'		=> 'Email harus diisi'));	
		$valid->set_rules('messages','Isi Pesan','required',
			array(	'required'		=> 'Isi pesan harus diisi'));		
		$valid->set_rules('subject','Subjek Pesan','required',
			array(	'required'		=> 'Subjek pesan harus diisi'));								
		
		if($valid->run() === FALSE) {
		
		$data = array(	'title'			=> 'Contact - '.$site['nameweb'],
						'description'   => 'Kami akan membantu anda 1x24 jam kerja',
						'keywords'   	=> 'Contact - '.$site['nameweb'],
						'site'			=> $site,
						'isi'			=> 'contact/list');
		$this->load->view('layout/wrapper',$data);
		}else{

			$i = $this->input;
			$date = date('Y-m-d');
			$data = array(	'sender'		=> $i->post('sender'),
							'email'			=> $i->post('email'),				
							'subject'		=> $i->post('subject'),
							'messages'		=> $i->post('messages'),
							'created'		=> $date,
						);
			$this->mContact->createContact($data);		
			$this->session->set_flashdata('sukses','Pesan berhasil dikirim');
			redirect(base_url('contact'));
		}
	}	
}