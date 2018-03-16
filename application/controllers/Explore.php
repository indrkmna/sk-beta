<?php
	/*
    @Copyright sedotkode.com
    @Class Name : Explore
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Explore extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('upload_model','mUpload');
		$this->load->model('users_model','mUsers');
		$this->load->model('cat_model','mCat');
		$this->load->model('files_model','mFiles');
	}	
	
	public function index() {

		$site 	  	= $this->mConfig->list_config();
		
		// Pagination
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'explore/index';
		$config['total_rows'] 		= count($this->mUpload->listUpload());
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['per_page'] 		= 6;
		$config['cur_tag_open'] 	= "<li><a href='#' class='current-page'>";	
		$config['first_url'] 		= base_url().'explore';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		$explore 	= $this->mUpload->limitUpload($config['per_page'], $page);
		// End Pagination
		
		$data = array(	'title'		=> 'Jelajahi Kode',			
						'site' 		=> $site,
						'explore'	=> $explore,				
						//'category'	=> $category,
						'pagin' 	=> $this->pagination->create_links(),
						'isi'		=> 'explore/list');
		$this->load->view('layout/wrapper',$data);	
	}
	
	public function categories($slug_cat) {

		$site 	  	= $this->mConfig->list_config();
		$explore 	= $this->mUpload->listUploadCat($slug_cat);	
		
		$data = array(	'title'		=> 'Jelajahi Kode',			
						'site' 		=> $site,
						'explore'	=> $explore,				
						//'category'	=> $category,
						'pagin' 	=> $this->pagination->create_links(),
						'isi'		=> 'explore/categories');
		$this->load->view('layout/wrapper',$data);	
	}
	
	// Search uplaod
	public function search()
	{

		$site 	  	= $this->mConfig->list_config();
		$category 	= $this->mCat->listCat();
		$user_id 	= $this->session->userdata('user_id');

		if (isset($_POST['q'])) {
			$data['ringkasan'] = $this->input->post('cari');
			$this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
		}
		else {
			$data['ringkasan'] = $this->session->userdata('sess_ringkasan');
		}

		$this->load->model('upload_model');
		$this->db->like('title', $data['ringkasan']);

		// pagination limit
		$pagination['base_url'] = base_url().'explore/search/index/';
		$pagination['total_rows'] = count($this->mUpload->listUpload());
		$pagination['per_page'] = "9";
		$pagination['uri_segment'] = 4;
		$pagination['num_links'] = 5;
		$pagination['cur_tag_open'] = "<li><a href='#' class='current-page'>";


		$this->pagination->initialize($pagination);

		$data['explore'] = $this->upload_model->searchUpload($pagination['per_page'],$this->uri->segment(4,0),
		$data['ringkasan'],
		$data['isi'] = 'explore/search',
		$data['title'] = 'Hasil Pencarian - '. $data['ringkasan'],
		$data['site'] = $site,
		$data['category'] = $category,
		$data['pagin'] = $this->pagination->create_links()						
		);

		$this->load->vars($data);
		$this->load->view('layout/wrapper');
	}
	
	
	public function kodesaya() {

		$site 	  	= $this->mConfig->list_config();
		
		$user_id 	= $this->session->userdata('user_id');
		//$category 	= $this->mCategories->listCategories();
		

		// Pagination
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'explore';
		$config['total_rows'] 		= count($this->mUpload->listUploadUser($user_id));
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['per_page'] 		= 9;
		$config['cur_tag_open'] 	= "<li><a href='#' class='current-page'>";	
		$config['first_url'] 		= base_url().'explore';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		if($_GET['status']=='Publish'){
			$explore 	= $this->mUpload->limitUploadUser($user_id, $config['per_page'], $page);
		}else{
			$explore 	= $this->mUpload->DlimitUpload($user_id,$config['per_page'], $page);
		}
		// End Pagination		
		
		$data = array(	'title'		=> 'Explore Kode - '.$site['nameweb'],			
						'site' 		=> $site,
						'explore'	=> $explore,				
						//'category'	=> $category,
						'pagin' 	=> $this->pagination->create_links(),
						'isi'		=> 'explore/kodesaya');
		$this->load->view('layout/wrapper_dashboard',$data);	
	}

	// Read Article

	public function read($slug) {

		$site  		= $this->mConfig->list_config();
		$explore 	= $this->mUpload->slug($slug);
		$listSc 	= $this->mUpload->listScreenshoot($explore['upload_id']);
		$vote 		= $this->mUpload->totalVote($explore['upload_id']);
		$rate 		= $this->mUpload->totalRate($explore['upload_id']);
		$listRate 	= $this->mUpload->listRateKode($explore['upload_id']);
		//$related 	= $this->mArticles->relatedPost($article['user_id'], $article['category_id']);
		
		$data = array(	'title'		=> $explore['title'],
						'explore'	=> $explore,
						//'related'	=> $related,
						'site'		=> $site,						
						'vote'		=> $vote,						
						'rate'		=> $rate,						
						'listRate'	=> $listRate,						
						'listSc'	=> $listSc,						
						'isi'		=> 'explore/read');
		$this->load->view('layout/wrapper',$data);
		$i = $this->input;
		$data = array(	'slug_upload'	=> $slug,
						'views'			=> $explore['views']+1);
		$this->mUpload->addView($data);		
	}	

/* 
	Function Create
*/
				
	public function create() {
		
		$site 	  	= $this->mConfig->list_config();
		$user_id 	= $this->session->userdata('user_id');
		$total 	  	= $this->mUpload->totalUpload($user_id);
		$category 	= $this->mCat->listCat();
		$valid 		= $this->form_validation;
		$valid->set_rules('title','Nama','required');
		
		if($valid->run() === FALSE) {
		
		$data = array(	'title'			=> 'Explore Kode',
						'site'			=> $site,
						'total'			=> $total,
						'category'		=> $category,
						'isi'			=> 'explore/upload_kode');
		$this->load->view('layout/wrapper_dashboard',$data);
		}else{
			$i = $this->input;
			$slug_upload = url_title($this->input->post('title'), 'dash', TRUE);
			$data = array(	'title'			=> $i->post('title'),
							'upload_id'		=> $i->post('upload_id'),
							'category_id'	=> $i->post('category_id'),
							'user_id'		=> $this->session->userdata('user_id'),
							'description'	=> $i->post('description'),
							'slug_upload'	=> $slug_upload,
							'status_upload'	=> $i->post('status_upload'),
							'date_post'		=> date('Y-m-d H:i:s'));
			$this->mUpload->createUpload($data);		
			$this->session->set_flashdata('sukses','Data Berhasil Diupload');
			redirect(base_url('explore/create'));
		}
	}	


/* 
	Function Edit 
*/

	public function edit($upload_id) {
		
		$site 	  	= $this->mConfig->list_config();
		$explore 	 = $this->mUpload->detailUpload($upload_id);
		$listSc 	= $this->mUpload->listScreenshoot($explore['upload_id']);
		$user_id 	= $this->session->userdata('user_id');
		$total 	  	= $this->mUpload->totalUpload($user_id);
		$listSc 	= $this->mUpload->listScreenshoot($explore['upload_id']);
		$category 	= $this->mCat->listCat();
		$valid = $this->form_validation;
		$valid->set_rules('title','Nama','required');
		
		if($valid->run() === FALSE) {
		
		$data = array(	'title'			=> 'Explore Kode',
						'site'			=> $site,
						'total'			=> $total,
						'explore'		=> $explore,
						'category'		=> $category,
						'listSc'		=> $listSc,
						'isi'			=> 'explore/edit');
		$this->load->view('layout/wrapper_dashboard',$data);
		}else{
			$i = $this->input;
			$slug_upload = $explore['upload_id'].'-'.url_title($i->post('title'),'dash', TRUE);
			$data = array(	'title'			=> $i->post('title'),
							'upload_id'		=> $explore['upload_id'],
							'category_id'	=> $i->post('category_id'),
							'user_id'		=> $this->session->userdata('user_id'),
							'description'	=> $i->post('description'),
							'slug_upload'	=> $slug_upload,
							'status_upload'	=> $i->post('status_upload'));
			$this->mUpload->editUpload($data);		
			$this->session->set_flashdata('sukses','Data Berhasil Diubah');
			redirect(base_url('explore/edit/'.$explore['upload_id']));
		}
	}
/* 
/* 
	Function Delete
*/

	// Delete Article
	public function delete($upload_id) {
		$data = array('upload_id'	=> $upload_id);
		$this->mUpload->deleteUpload($data);		
		$this->db->delete('screenshoot',array('upload_kode'=>$upload_id));
		$this->session->set_flashdata('sukses','Kode berhasil dihapus');
		if($_GET['status']=='Publish'){
		redirect(base_url('explore/kodesaya?status=Publish'));
		}else{
		redirect(base_url('explore/kodesaya?status=Draf'));
		}
	}
	

//Untuk proses upload foto
	function proses_upload(){

        $config['upload_path']   = FCPATH.'/assets/upload/image/';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $this->load->library('upload',$config);

        if($this->upload->do_upload('userfile')){
        	$token=$this->input->post('token_foto');
        	$nama=$this->upload->data('file_name');
        	$user=$this->input->post('user_foto');
        	$this->db->insert('screenshoot',array('nama_foto'=>$nama,'token'=>$token,'upload_kode'=>$user));
        }


	}


	//Untuk menghapus foto
	function remove_foto(){

		//Ambil token foto
		$token=$this->input->post('token');

		
		$foto=$this->db->get_where('screenshoot',array('token'=>$token));


		if($foto->num_rows()>0){
			$hasil=$foto->row();
			$nama_foto=$hasil->nama_foto;
			if(file_exists($file=FCPATH.'/assets/upload/image/'.$nama_foto)){
				unlink($file);
			}
			$this->db->delete('screenshoot',array('token'=>$token));

		}


		echo "{}";
	}
	
	
	/* 
	Function Review
*/
				
	public function review() {
		
		$site 	  	= $this->mConfig->list_config();
		$user_id 	= $this->session->userdata('user_id');
		
			$i = $this->input;
			$data = array(	'user_id'		=> $this->session->userdata('user_id'),
							'kode_id'		=> $i->post('kode_id'),
							'vote'			=> $i->post('vote'),
							'review'		=> $i->post('review'),
							'post_date'		=> date('Y-m-d H:i:s'));
			$this->mUpload->createReview($data);		
			$this->session->set_flashdata('sukses','Review Berhasil dikirim');
	}
	
}