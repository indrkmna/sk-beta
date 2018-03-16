<?php
	/*
    @Copyright sedotkode.com
    @Class Name : Article
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set("Asia/Jakarta");

class Article extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('article_model','mArticles');
		$this->load->model('users_model','mUsers');
		$this->load->model('categories_model','mCategories');
	}	
	
	public function index() {

		$site 	  	= $this->mConfig->list_config();
		$category 	= $this->mCategories->listCategories();
		$articles 	= $this->mArticles->listArticle();
		$popular_post = $this->mArticles->listPopularPost();
		
		$data = array(	'title'		=> 'Articles - '.$site['nameweb'],			
						'site' 		=> $site,
						'articles'	=> $articles,				
						'popular_post'	=> $popular_post,				
						'category'	=> $category,
						'isi'		=> 'article/list');
		$this->load->view('layout/wrapper',$data);	
	}

	// Read Article

	public function read($slug) {

		$site  		= $this->mConfig->list_config();
		$article 	= $this->mArticles->slug($slug);
		$popular_post = $this->mArticles->listPopularPost();
		$related 	= $this->mArticles->relatedPost($article['user_id'], $article['category_id']);
		$id	 		= $article['article_id'];
		$next		= $this->db->query("SELECT * FROM articles
										WHERE article_id > '".$id."'
										AND status_article= 'Publish'
										ORDER BY article_id ASC LIMIT 1")->result_array();
		$prev		= $this->db->query("SELECT * FROM articles
										WHERE article_id < '".$id."'
										AND status_article= 'Publish'
										ORDER BY article_id ASC LIMIT 1")->result_array();
		
		$data = array(	'title'		=> $article['title'],
						'article'	=> $article,
						'related'	=> $related,
						'popular_post'	=> $popular_post,
						'next'		=> $next,
						'prev'		=> $prev,
						'site'		=> $site,						
						'isi'		=> 'article/read');
		$this->load->view('layout/wrapper',$data);
		$data = array(	'slug_article'	=> $slug,
						'views'			=> $article['views']+1);
		$this->mArticles->addView($data);
	}	

	// Dashboard Article
	public function dashboard() {

		$site 	  	= $this->mConfig->list_config();
		$category 	= $this->mCategories->listCategories();
		$user_id	= $this->session->userdata('user_id');

		// Pagination
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'article/dashboard/';
		$config['total_rows'] 		= count($this->mArticles->listArticleUser($user_id));
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['per_page'] 		= 10;
		$config['cur_tag_open'] 	= "<li><a href='#' class='current-page'>";	
		$config['first_url'] 		= base_url().'article/dashboard';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		$articles 	= $this->mArticles->limitArticles($user_id, $config['per_page'], $page);
		// End Pagination		
		
		$data = array(	'title'		=> 'Daftar Artikel - '.$site['nameweb'],			
						'site' 		=> $site,
						'articles'	=> $articles,				
						'category'	=> $category,
						'pagin' 	=> $this->pagination->create_links(),
						'isi'		=> 'article/list_dashboard');
		$this->load->view('layout/wrapper_dashboard',$data);	
	}		

	// Search article dashboard
	public function dashboard_search()
	{

		$site 	  	= $this->mConfig->list_config();
		$category 	= $this->mCategories->listCategories();
		$user_id 	= $this->session->userdata('user_id');

		if (isset($_POST['q'])) {
			$data['ringkasan'] = $this->input->post('cari');
			$this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
		}
		else {
			$data['ringkasan'] = $this->session->userdata('sess_ringkasan');
		}

		$this->load->model('article_model');
		$this->db->like('title', $data['ringkasan']);
        //$this->db->from('articles');

		// pagination limit
		$pagination['base_url'] = base_url().'article/dashboard_search/index/';
		$pagination['total_rows'] = count($this->mArticles->listArticleUser($user_id));
		$pagination['per_page'] = "2";
		$pagination['uri_segment'] = 4;
		$pagination['num_links'] = 5;
		$pagination['cur_tag_open'] = "<li><a href='#' class='current-page'>";


		$this->pagination->initialize($pagination);

		$data['articles'] = $this->article_model->searchArticle($user_id, $pagination['per_page'],$this->uri->segment(4,0),
		$data['ringkasan'],
		$data['isi'] = 'article/search_dashboard',
		$data['title'] = 'Hasil Pencarian - '. $data['ringkasan'],
		$data['site'] = $site,
		$data['category'] = $category,
		$data['pagin'] = $this->pagination->create_links()						
		);

		$this->load->vars($data);
		$this->load->view('layout/wrapper_dashboard');
	}

/* 
	Function Create
*/
				
	// Create Article
	public function create() {
		
		$site 	  	= $this->mConfig->list_config();
		$user_id 	= $this->session->userdata('user_id');
		$categories = $this->mCategories->listCategories();
		$endBlog  	= $this->mArticles->endArtikel();
		
		$v = $this->form_validation;
		$v->set_rules('category_id','Kategori','required');
		$v->set_rules('title','Judul','required');
		$v->set_rules('content','Konten','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('cover_article')) {
				
		$data = array(	'title'			=> 'Buat Artikel - '.$site['nameweb'],
						'site'			=> $site,
						'categories'	=> $categories,
						'error'			=> $this->upload->display_errors(),
						'isi'			=> 'article/create');
		$this->load->view('layout/wrapper_dashboard',$data);
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
				$date = date('Y-m-d H:i:s');
				$slug_artikel = url_title($this->input->post('title'), 'dash', TRUE);
				$data = array(	'category_id'	=> $i->post('category_id'),
								'slug_article'	=> $slug_artikel,
								'user_id'		=> $this->session->userdata('user_id'),
								'title'			=> $i->post('title'),
								'content'		=> $i->post('content'),
								'date_post'		=> $date,
								'status_article'=> $i->post('status_article'),
								'cover_article'	=> $upload_data['uploads']['file_name']
				 			 );

				$this->mArticles->createArtikel($data);
				$this->session->set_flashdata('sukses','Artikel barhasil ditambah');
				redirect(base_url('article/dashboard'));
		}}
		// Default page
		$data = array(	'title'		=> 'Buat Artikel - '.$site['nameweb'],
						'site'		=> $site,
						'categories'=> $categories,
						'isi'		=> 'article/create');
		$this->load->view('layout/wrapper_dashboard',$data);
	}	

/* 
	Function Edit 
*/

	public function edit($artikel_id) {

		$site 		= $this->mConfig->list_config();
		$article	= $this->mArticles->detailArtikel($artikel_id);
		$endArtikel	= $this->mArticles->endArtikel();		
		$category	= $this->mCategories->listCategories();

		// Validation
		$v = $this->form_validation;
		$v->set_rules('category_id','Kategori','required');
		$v->set_rules('title','Judul','required');
		$v->set_rules('content','Konten','required');
		
		if($v->run()) {
			if(!empty($_FILES['cover_article']['name'])) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('cover_article')) {
		
		$data = array(	'title'		=> 'Edit Artikel - '.$artikel['title'],
						'category'	=> $category,
						'article'	=> $article,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'article/edit');
		$this->load->view('layout/wrapper_dashboard', $data);
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

			$slugArtikel = $endArtikel['article_id'].'-'.url_title($i->post('title'),'dash', TRUE);
			$data = array(	'article_id'	=> $article['article_id'],
							'slug_article'	=> $slugArtikel,
							'category_id'	=> $i->post('category_id'),
							'user_id'		=> $this->session->userdata('user_id'),
							'title'			=> $i->post('title'),
							'content'		=> $i->post('content'),
							'status_article'=> $i->post('status_article'),
							'cover_article'	=> $upload_data['uploads']['file_name']
							);
			$this->mArticles->editArticle($data);
			$this->session->set_flashdata('sukses','Artikel telah diedit dan cover telah diganti');
			redirect(base_url('article/dashboard'));
		}}else{
		
			
			$i = $this->input;
			$slugArtikel = $endArtikel['article_id'].'-'.url_title($i->post('title'),'dash', TRUE);
			$data = array(	'article_id'	=> $article['article_id'],
							'slug_article'	=> $slugArtikel,
							'category_id'	=> $i->post('category_id'),
							'user_id'		=> $this->session->userdata('user_id'),
							'title'			=> $i->post('title'),
							'content'		=> $i->post('content'),
							'status_article'=> $i->post('status_article'),
							);
			$this->mArticles->editArticle($data);
			$this->session->set_flashdata('sukses','Artikel telah diedit dan cover tidak diganti');
			redirect(base_url('article/dashboard'));	
		
		}}

		$data = array(	'title'		=> 'Edit Artikel - '.$article['title'],
						'category'	=> $category,
						'site'		=> $site,
						'article'	=> $article,
						'isi'		=> 'article/edit');
		$this->load->view('layout/wrapper_dashboard', $data);
	}
	
/* 
	Function Delete
*/

	// Delete Article
	public function delete($article_id) {
		$data = array('article_id'	=> $article_id);
		$this->mArticles->deleteArticle($data);		
		$this->session->set_flashdata('sukses','Artikel berhasil dihapus');
		redirect(base_url('article/dashboard'));
	}
					
}