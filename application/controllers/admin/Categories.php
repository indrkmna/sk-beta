<?php
	/*
    @Copyright sedotkode.com
    @Class Name : Category Artikel
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('categories_model','mCategories');
	}	
/* 
	Function Create
*/
				
	// Create Article
	public function index() {
		
		$site = $this->mConfig->list_config();
		$categories = $this->mCategories->listing();
		
		$v = $this->form_validation;
		$v->set_rules('category_name','Category Name','required');
		
		if($v->run()=== FALSE) {
				
		$data = array(	'title'			=> 'Category Name - '.$site['nameweb'],
						'site'			=> $site,
						'categories'	=> $categories,
						'isi'			=> 'admin/categories/list');
		$this->load->view('admin/layout/wrapper',$data);
		
		}else{	
				$i 	  = $this->input;
				$date = date('Y-m-d H:i:s');
				$slug = url_title($i->post('category_name'),'dash', TRUE);
				$data = array(	'category_name'		=> $i->post('category_name'),
								'category_description' => $i->post('category_description'),
								'status'			=> $i->post('status'),
								'slug_category'		=> $slug,
								'created'			=> $date,
								'user_id'			=> $this->session->userdata('id')
				 			 );

				$this->mCategories->create($data);
				$this->session->set_flashdata('sukses','Kategori barhasil ditambah');
				redirect(base_url('admin/categories'));
		}
	}	

/* 
	Function Edit 
*/

	public function edit($category_id) {

		$site 		= $this->mConfig->list_config();
		$category	= $this->mCategories->detail($category_id);		

		// Validation
		$v = $this->form_validation;
		$v->set_rules('category_name','Category Name','required');
		
		if($v->run()=== FALSE) {
		
		$data = array(	'title'		=> 'Edit Kategori - '.$site['nameweb'],
						'category'	=> $category,
						'isi'		=> 'admin/categories/edit');
		$this->load->view('admin/layout/wrapper', $data);
		
		}else{	
			
			$i = $this->input;
			$tgl= date('Y-m-d H:i:s');
			$data = array(	'category_id'		=> $category['category_id'],
							'category_name'		=> $i->post('category_name'),
							'category_description' => $i->post('category_description'),
							'status'			=> $i->post('status'),
							'modified'			=> $tgl,
							'user_id'			=> $this->session->userdata('user_id')
							);
			$this->mCategories->edit($data);
			$this->session->set_flashdata('sukses','Kategori telah diedit');
			redirect(base_url('admin/categories'));			
		}
	}
	
/* 
	Function Delete
*/

	// Delete Article
	public function delete($category_id) {
		$data = array('category_id'	=> $category_id);
		$this->mCategories->delete($data);		
		$this->session->set_flashdata('sukses','Kategori berhasil dihapus');
		redirect(base_url('admin/categories'));
	}
					
}