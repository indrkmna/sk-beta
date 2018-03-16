<?php
	/*
    @Copyright sedotkode.com
    @Class Name : Article
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorie_kode extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('cat_model','mCat');
	}	
/* 
	Function Create
*/
				
	// Create Article
	public function index() {
		
		$site 	  	= $this->mConfig->list_config();
		$endCat  	= $this->mCat->endCat();
		$category  	= $this->mCat->listCat();
		
		$v = $this->form_validation;
		$v->set_rules('categories_name','Judul','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('icon')) {
				
		$data = array(	'title'			=> 'Kode Kategori - '.$site['nameweb'],
						'site'			=> $site,
						'category'		=> $category,
						'error'			=> $this->upload->display_errors(),
						'isi'			=> 'admin/ekategori/list');
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
				$this->image_lib->resize();

				$i = $this->input;
				//$tgl= date('Y-m-d H:i:s');
				$slug_cat = url_title($this->input->post('categories_name'), 'dash', TRUE);
				$data = array(	'slug_cat'			=> $slug_cat,
								'categories_name'	=> $i->post('categories_name'),
								'icon'				=> $upload_data['uploads']['file_name']
				 			 );

				$this->mCat->createCat($data);
				$this->session->set_flashdata('sukses','Kategori barhasil ditambah');
				redirect(base_url('admin/categorie_kode'));
		}}
		// Default page
		$data = array(	'title'		=> 'Kode Kategori - '.$site['nameweb'],
						'site'		=> $site,
						'category'	=> $category,
						'isi'		=> 'admin/ekategori/list');
		$this->load->view('admin/layout/wrapper',$data);
	}	

/* 
	Function Edit 
*/

	public function edit($id_category) {

		$site 		= $this->mConfig->list_config();
		$category	= $this->mCat->detailCat($id_category);
		$endCat		= $this->mCat->endCat();		

		// Validation
		$v = $this->form_validation;
		$v->set_rules('categories_name','Judul','required');
		
		if($v->run()) {
			if(!empty($_FILES['icon']['name'])) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('icon')) {
		
		$data = array(	'title'		=> 'Edit Kode Kategori - '.$site['nameweb'],
						'category'	=> $category,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/ekategori/edit');
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

			$slug_cat = $endCat['id_category'].'-'.url_title($i->post('categories_name'),'dash', TRUE);
			$data = array(	'id_category'		=> $category['id_category'],
							'slug_cat'			=> $slug_cat,
							'categories_name'	=> $i->post('categories_name'),
							'icon'				=> $upload_data['uploads']['file_name']
							);
			$this->mCat->editCat($data);
			$this->session->set_flashdata('sukses','Kode Kategori telah diedit dan cover telah diganti');
			redirect(base_url('admin/categorie_kode'));
		}}else{
		
			
			$i = $this->input;
			$slug_cat = $endCat['id_category'].'-'.url_title($i->post('categories_name'),'dash', TRUE);
			$data = array(	'id_category'		=> $category['id_category'],
							'slug_cat'			=> $slug_cat,
							'categories_name'	=> $i->post('categories_name')
							);
			$this->mCat->editCat($data);
			$this->session->set_flashdata('sukses','Kode Kategori telah diedit dan cover tidak diganti');
			redirect(base_url('admin/categorie_kode'));	
		
		}}

		$data = array(	'title'		=> 'Edit Kode Kategori - '.$site['nameweb'],
						'category'	=> $category,
						'site'		=> $site,
						'isi'		=> 'admin/ekategori/edit');
		$this->load->view('admin/layout/wrapper', $data);
	}
	
/* 
	Function Delete
*/

	// Delete Article
	public function delete($id_category) {
		$data = array('id_category'	=> $id_category);
		$this->mCat->deleteCat($data);		
		$this->session->set_flashdata('sukses','Kode Kategori berhasil dihapus');
		redirect(base_url('admin/categorie_kode'));
	}
					
}