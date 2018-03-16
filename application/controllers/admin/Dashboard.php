<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('participant_model','mParticipant');
	}	
	
	// Main Page
	public function index() {
		
		$site = $this->mConfig->list_config();

		$data = array(	'title'		=> 'Dashboard - '.$site['nameweb'],
						'admins'	=> $this->mStats->admins(),
						'users'		=> $this->mStats->users(),
						'contact'	=> $this->mStats->contact(), 
						'isi'		=> 'admin/dashboard/list');
		$this->load->view('admin/layout/wrapper',$data);
	}
		
	// General Config
	public function config() {
		$site = $this->mConfig->list_config();
		
		// Validasi 
		$this->form_validation->set_rules('nameweb','Nama website','required');
		$this->form_validation->set_rules('email','Email','valid_email');
		
		if($this->form_validation->run() === FALSE) {
			
		$data = array(	'title'	=> 'Pengaturan Umum - '. $site['nameweb'],
						'site'	=> $site,
						'isi'	=> 'admin/dashboard/config');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$data = array(	'config_id'	=> $i->post('config_id'),
							'nameweb'	=> $i->post('nameweb'),
							'email'		=> $i->post('email'),
							'keywords'	=> $i->post('keywords'),
							'metatext'	=> $i->post('metatext'),
							'about'		=> $i->post('about'),
							'phone_number'=> $i->post('phone_number'),
							'fax'		=> $i->post('fax'),
						);
			$this->mConfig->edit_config($data);
			$this->session->set_flashdata('sukses','Konfigurasi telah diupdate');
			redirect(base_url('admin/dashboard/config'));
		}
	}
	
	// General Config
	public function privacy() {
		$site = $this->mConfig->list_config();
		
		// Validasi 
		$this->form_validation->set_rules('privacy','privacy','required');
		
		if($this->form_validation->run() === FALSE) {
			
		$data = array(	'title'	=> 'Privacy Policy - '. $site['nameweb'],
						'site'	=> $site,
						'isi'	=> 'admin/dashboard/privacy');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$data = array(	'config_id'	=> $i->post('config_id'),
							'privacy'	=> $i->post('privacy')
						);
			$this->mConfig->edit_config($data);
			$this->session->set_flashdata('sukses','Privacy telah diupdate');
			redirect(base_url('admin/dashboard/privacy'));
		}
	}

	// Config Social
	public function social() {

			$site = $this->mConfig->list_config();

			$this->form_validation->set_rules('instagram','Account Instagram','required');

			if($this->form_validation->run() === FALSE) {

			$data = array(	'title'	=> 'Sosial Media - '. $site['nameweb'],
							'site'	=> $site,
							'isi'	=> 'admin/dashboard/social');
			$this->load->view('admin/layout/wrapper',$data);
			
			}else{
			
			$i = $this->input;
			$data = array(	'config_id'	=> $i->post('config_id'),
							'facebook'	=> $i->post('facebook'),
							'twitter'	=> $i->post('twitter'),
							'instagram'	=> $i->post('instagram'),
							'youtube'	=> $i->post('youtube'),
						);
			$this->mConfig->edit_config($data);
			$this->session->set_flashdata('sukses','Configuration has updated');
			redirect(base_url('admin/dashboard/social'));
		}
	}

	// Config Locations
	public function locations() {

			$site = $this->mConfig->list_config();

			$this->form_validation->set_rules('google_maps','Google Maps Frame','required');

			if($this->form_validation->run() === FALSE) {

			$data = array(	'title'	=> 'Lokasi - '. $site['nameweb'],
							'site'	=> $site,
							'isi'	=> 'admin/dashboard/locations');
			$this->load->view('admin/layout/wrapper',$data);
			
			}else{
			
			$i = $this->input;
			$data = array(	'config_id'	=> $i->post('config_id'),
							'google_maps'=> $i->post('google_maps'),
						);
			$this->mConfig->edit_config($data);
			$this->session->set_flashdata('sukses','Configuration has updated');
			redirect(base_url('admin/dashboard/locations'));
		}
	}		
	
	// Config Logo
	public function logo() {
		$site = $this->mConfig->list_config();
		
		$v = $this->form_validation;
		$v->set_rules('config_id','ID Config','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('logo')) {
				
		$data = array(	'title'	=> 'Konfigurasi Logo',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/dashboard/logo');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 166; // Pixel
				$config['height'] 			= 120; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				// Hapus gambar lama
				unlink('./assets/upload/image/'.$site['logo']);
				unlink('./assets/upload/image/thumbs/'.$site['logo']);
				// End hapus gambar lama
				// Masuk ke database
				$i = $this->input;
				$data = array(	'config_id'		=> $i->post('config_id'),
								'logo'			=> $upload_data['uploads']['file_name']
							);
				$this->mConfig->edit_config($data);
				$this->session->set_flashdata('sukses','Konfigurasi Telah Diupdate');
				redirect(base_url('admin/dashboard/logo'));
		}}
		// Default page
		$data = array(	'title'	=> 'Konfigurasi Logo',
						'site'	=> $site,
						'isi'	=> 'admin/dashboard/logo');
		$this->load->view('admin/layout/wrapper',$data);
	}
	
	// Config Icon
	public function icon() {
		$site = $this->mConfig->list_config();
		
		$v = $this->form_validation;
		$v->set_rules('config_id','ID Konfigurasi','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('icon')) {
				
		$data = array(	'title'	=> 'Konfigurasi Icon',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/dasbor/icon');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				// Hapus gambar lama
				unlink('./assets/upload/image/'.$site['icon']);
				unlink('./assets/upload/image/thumbs/'.$site['icon']);
				// End hapus gambar lama
				$this->image_lib->resize();
				// Masuk ke database
				$i = $this->input;
				$data = array(	'config_id'		=> $i->post('config_id'),
								'icon'			=> $upload_data['uploads']['file_name']
								);
				$this->mConfig->edit_config($data);
				$this->session->set_flashdata('sukses','Konfigurasi Telah Diupdate');
				redirect(base_url('admin/dashboard/icon'));
		}}
		// Default page
		$data = array(	'title'	=> 'Konfigurasi Icon',
						'site'	=> $site,
						'isi'	=> 'admin/dashboard/icon');
		$this->load->view('admin/layout/wrapper',$data);
	}
	
	// Config Icon
	public function banner() {
		$site = $this->mConfig->list_config();
		
		$v = $this->form_validation;
		$v->set_rules('config_id','ID Konfigurasi','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('home_banner')) {
				
		$data = array(	'title'	=> 'Konfigurasi Banner',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/dasbor/banner');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				// Hapus gambar lama
				unlink('./assets/upload/image/'.$site['home_banner']);
				unlink('./assets/upload/image/thumbs/'.$site['home_banner']);
				// End hapus gambar lama
				$this->image_lib->resize();
				// Masuk ke database
				$i = $this->input;
				$data = array(	'config_id'		=> $i->post('config_id'),
								'home_banner'	=> $upload_data['uploads']['file_name']
								);
				$this->mConfig->edit_config($data);
				$this->session->set_flashdata('sukses','Konfigurasi Telah Diupdate');
				redirect(base_url('admin/dashboard/banner'));
		}}
		// Default page
		$data = array(	'title'	=> 'Konfigurasi Banner',
						'site'	=> $site,
						'isi'	=> 'admin/dashboard/banner');
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function welcome() {

		$site = $this->mConfig->list_config();

		// Validation
		$v = $this->form_validation;
		$v->set_rules('title_1','Judul','required');
		
		if($v->run()) {
			if(!empty($_FILES['img_1']['name'])) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('img_1')) {
		
		$data = array(	'title'		=> 'Konfigurasi Welcome Page - '.$site['nameweb'],
						'site'		=> $site,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/dashboard/welcome');
		$this->load->view('admin/layout/wrapper', $data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['quality'] 			= "100%";
				$config['maintain_ratio'] 	= FALSE;
				$config['width'] 			= 360; // Pixel
				$config['height'] 			= 200; // Pixel
				$config['x_axis'] 			= 0;
				$config['y_axis'] 			= 0;
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				
			$i = $this->input;
			$data = array(	'config_id'		=> $i->post('config_id'),
							'title_1'		=> $i->post('title_1'),
							'text_2'		=> $i->post('text_2'),
							'img_1'			=> $upload_data['uploads']['file_name']
							);
			$this->mConfig->edit_config($data);
			$this->session->set_flashdata('sukses','Data berhasil diupdate');
			redirect(base_url('admin/dashboard/welcome'));
		}}else{
		
			
			$i = $this->input;
			$data = array(	'config_id'		=> $i->post('config_id'),
							'title_1'		=> $i->post('title_1'),
							'text_2'		=> $i->post('text_2'),
							);
			$this->mConfig->edit_config($data);
			$this->session->set_flashdata('sukses','Data berhasil diupdate dan gambar tidak diganti');
			redirect(base_url('admin/dashboard/welcome'));	
		
		}}

		$data = array(	'title'		=> 'Konfigurasi Welcome Page - '.$site['nameweb'],
						'site'		=> $site,
						'isi'		=> 'admin/dashboard/welcome');
		$this->load->view('admin/layout/wrapper', $data);
	}

	// Config Feaature
	public function feature() {
		$site = $this->mConfig->list_config();
		
		$v = $this->form_validation;
		$v->set_rules('config_id','ID Config','required');
		
		if($v->run()) {
			if(!empty($_FILES['img_2']['name'])) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('img_2')) {
				
		$data = array(	'title'	=> 'Konfigurasi Feaature Layout',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/dashboard/feature');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 166; // Pixel
				$config['height'] 			= 120; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				// Masuk ke database
				$i = $this->input;
				$data = array(	'config_id'		=> $i->post('config_id'),
								'title_2' 		=> $i->post('title_2'),
								'text_2' 		=> $i->post('text_2'),
								'title_3' 		=> $i->post('title_3'),
								'text_3' 		=> $i->post('text_3'),	
								'title_4' 		=> $i->post('title_4'),
								'text_4' 		=> $i->post('text_4'),	
								'title_5' 		=> $i->post('title_5'),
								'text_5' 		=> $i->post('text_5'),	
								'title_6' 		=> $i->post('title_6'),
								'text_6' 		=> $i->post('text_6'),
								'title_7' 		=> $i->post('title_7'),
								'text_7' 		=> $i->post('text_7'),															
								'img_2'			=> $upload_data['uploads']['file_name']
							);
				$this->mConfig->edit_config($data);
				$this->session->set_flashdata('sukses','Konfigurasi Telah Diupdate');
				redirect(base_url('admin/dashboard/feature'));
		}}else{
				$i = $this->input;
				$data = array(	'config_id'		=> $i->post('config_id'),
								'title_2' 		=> $i->post('title_2'),
								'text_2' 		=> $i->post('text_2'),
								'title_3' 		=> $i->post('title_3'),
								'text_3' 		=> $i->post('text_3'),	
								'title_4' 		=> $i->post('title_4'),
								'text_4' 		=> $i->post('text_4'),	
								'title_5' 		=> $i->post('title_5'),
								'text_5' 		=> $i->post('text_5'),	
								'title_6' 		=> $i->post('title_6'),
								'text_6' 		=> $i->post('text_6'),
								'title_7' 		=> $i->post('title_7'),
								'text_7' 		=> $i->post('text_7'),							
							);
				$this->mConfig->edit_config($data);
				$this->session->set_flashdata('sukses','Konfigurasi Telah Diupdate');
				redirect(base_url('admin/dashboard/feature'));
		}}
		// Default page
		$data = array(	'title'	=> 'Konfigurasi Welcome Feaature',
						'site'	=> $site,
						'isi'	=> 'admin/dashboard/feature');
		$this->load->view('admin/layout/wrapper',$data);
	}	

	// Config Image FAQ
	public function image_faq() {
		$site = $this->mConfig->list_config();
		
		$v = $this->form_validation;
		$v->set_rules('config_id','ID Konfigurasi','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('img_faq')) {
				
		$data = array(	'title'	=> 'Konfigurasi Gambar FAQ',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/dashboard/img_faq');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				// Hapus gambar lama
				unlink('./assets/upload/image/'.$site['img_faq']);
				unlink('./assets/upload/image/thumbs/'.$site['img_faq']);
				// End hapus gambar lama
				$this->image_lib->resize();
				// Masuk ke database
				$i = $this->input;
				$data = array(	'config_id'		=> $i->post('config_id'),
								'img_faq'		=> $upload_data['uploads']['file_name']
								);
				$this->mConfig->edit_config($data);
				$this->session->set_flashdata('sukses','Konfigurasi Telah Diupdate');
				redirect(base_url('admin/dashboard/image_faq'));
		}}
		// Default page
		$data = array(	'title'	=> 'Konfigurasi Gambar FAQ',
						'site'	=> $site,
						'isi'	=> 'admin/dashboard/img_faq');
		$this->load->view('admin/layout/wrapper',$data);
	}

		
}