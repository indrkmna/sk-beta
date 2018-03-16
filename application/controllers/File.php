<?php
	/*
    @Copyright sedotkode.com
    @Class Name : File
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('upload_model','mUpload');
		$this->load->model('users_model','mUsers');
		$this->load->model('cat_model','mCat');
		$this->load->model('files_model','mFiles');
	}	

	// Add File 
	public function add_file($upload_id) {
		
		$site = $this->mConfig->list_config();
		$kode = $this->mUpload->detailUpload($upload_id);
		
		$v = $this->form_validation;
		$v->set_rules('upload_id','Space','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'png|zip|rar';
			$config['max_size']			= '6144'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('file_url')) {
				
		$data = array(	'title'			=> 'Upload File - '.$site['nameweb'],
						'site'			=> $site,
						'kode'			=> $kode,
						'error'			=> $this->upload->display_errors(),
						'isi'			=> 'explore/add_file');
		$this->load->view('layout/wrapper_dashboard',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/file/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/file/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$i = $this->input;
				$date = date('Y-m-d H:i:s');
				$data = array(	'upload_id'		=> $i->post('upload_id'),
								'created_file'	=> $date,
								'file_name'		=> $i->post('file_name'),
								'file_description'=> $i->post('file_description'),
								'file_url'		=> $upload_data['uploads']['file_name']
				 			 );

				$this->mFiles->create($data);
				$this->session->set_flashdata('sukses','File barhasil diupload');
				redirect(base_url('explore/kodesaya?status=Publish'));
		}}
		// Default page
		$data = array(	'title'		=> 'Upload File - '.$site['nameweb'],
						'site'		=> $site,
						'kode'		=> $kode,
						'isi'		=> 'explore/add_file');
		$this->load->view('layout/wrapper_dashboard',$data);
	}	
}