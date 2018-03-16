<?php
	/*
    @Copyright sedotkode.com
    @Class Name : Article Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Upload_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }
				
		 // Create Upload
        public function createUpload($data) {
            $this->db->insert('upload_kode',$data);
        }
		
		// Create Upload
        public function createReview($data) {
            $this->db->insert('review',$data);
        }
		
		// Edit Upload
        public function editUpload($data) {
            $this->db->where('upload_id',$data['upload_id']);
            $this->db->update('upload_kode',$data);
        } 

		public function addView($data) {
            $this->db->where('slug_upload',$data['slug_upload']);
            $this->db->update('upload_kode',$data);
        } 		
		
		// Delete upload
        public function deleteUpload($data) {
            $this->db->where('upload_id',$data['upload_id']);
            $this->db->delete('upload_kode',$data);
        }

        // End upload
        public function endUpload() {
            $this->db->select('*');
            $this->db->from('upload_kode');
            $this->db->order_by('upload_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }  
		
		// Detail Blog
        public function detailUpload($upload_id) {
            $this->db->select('*');
            $this->db->from('upload_kode');
            $this->db->where('upload_id',$upload_id);
            $this->db->order_by('upload_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }
        
        // Search
        public function searchUpload($perPage, $uri, $ringkasan) {
            $this->db->select('*');
            $this->db->from('upload_kode');
            $this->db->where(array('status_upload' => 'publish'));  
            $this->db->join('users','users.user_id = upload_kode.user_id','LEFT');            
            $this->db->join('categories_upload','categories_upload.id_category = upload_kode.category_id','LEFT');                  
            if (!empty($ringkasan)) {
                $this->db->like('title', $ringkasan);
            }
            $this->db->order_by('upload_id','asc');
            $getData = $this->db->get('', $perPage, $uri);

            if ($getData->num_rows() > 0)
                return $getData->result_array();
            else
                return null;
        }

		// Read Blog
        public function slug($slug) {
            $this->db->select('*');
            $this->db->from('upload_kode');
            $this->db->where(array('status_upload' => 'publish'));    
            $this->db->join('users','users.user_id = upload_kode.user_id','LEFT');                
            $this->db->join('categories_upload','categories_upload.id_category = upload_kode.category_id','LEFT');
            $this->db->where('slug_upload',$slug);
            $query = $this->db->get();
            return $query->row_array();
        }		
		
        // Listing Blogs
        public function listUpload() {
            $this->db->select('*');
            $this->db->from('upload_kode');
			$this->db->where(array('status_upload' => 'publish'));  
            $this->db->join('users','users.user_id = upload_kode.user_id','LEFT');            
            $this->db->join('categories_upload','categories_upload.id_category = upload_kode.category_id','LEFT');
            $this->db->order_by('upload_id','DESC');
            $query = $this->db->get();
            return $query->result_array();
        }
		
		 // Listing Blogs
        public function listUploadUser($user_id) {
            $this->db->select('*');
            $this->db->from('upload_kode');
			$this->db->where(array('status_upload' => 'publish', 'upload_kode.user_id' => $user_id));  
            $this->db->join('users','users.user_id = upload_kode.user_id','LEFT');            
            $this->db->join('categories_upload','categories_upload.id_category = upload_kode.category_id','LEFT');
            $this->db->order_by('upload_id','DESC');
            $query = $this->db->get();
            return $query->result_array();
        }
		
         // Listing Blogs
        public function profileKode($username) {
            $this->db->select('*');
            $this->db->from('upload_kode');
            $this->db->join('users','users.user_id = upload_kode.user_id','LEFT');            
            $this->db->join('categories_upload','categories_upload.id_category = upload_kode.category_id','LEFT');
            $this->db->where(array('status_upload' => 'publish', 'users.username' => $username));  
            $this->db->order_by('upload_id','DESC');
            $query = $this->db->get();
            return $query->result_array();
        }		
		
		 // Listing Blogs
        public function listUploadHome() {
            $this->db->select('*');
            $this->db->from('upload_kode');
			$this->db->where(array('status_upload' => 'publish'));  
            $this->db->join('users','users.user_id = upload_kode.user_id','LEFT');            
            $this->db->join('categories_upload','categories_upload.id_category = upload_kode.category_id','LEFT');
            $this->db->limit(12);
            $this->db->order_by('views','DESC');
            $query = $this->db->get();
            return $query->result_array();
        }
		
		 // Limit listing event
        public function limitUpload( $limit,$start) {
            $this->db->select('*');
            $this->db->from('upload_kode');     
			$this->db->where(array('status_upload' => 'publish')); 		
            $this->db->join('categories_upload','categories_upload.id_category = upload_kode.category_id','LEFT');                       
            $this->db->order_by('upload_id','DESC');
            $this->db->limit($limit,$start);
            $query = $this->db->get();
            return $query->result_array();
        }
        
         // Limit listing event
        public function limitUploadUser($user_id, $limit,$start) {
            $this->db->select('*');
            $this->db->from('upload_kode');     
			$this->db->where(array('status_upload' => 'publish', 'upload_kode.user_id' => $user_id)); 		
            $this->db->join('categories_upload','categories_upload.id_category = upload_kode.category_id','LEFT');                       
            $this->db->order_by('upload_id','DESC');
            $this->db->limit($limit,$start);
            $query = $this->db->get();
            return $query->result_array();
        }
		
		// Listing Blogs
        public function listUploadCat($slug_cat) {
            $this->db->select('*');
            $this->db->from('upload_kode');
			$this->db->where(array('slug_cat' => $slug_cat, 'status_upload' => 'publish')); 
            $this->db->join('admins','admins.admin_id = upload_kode.user_id','LEFT');            
            $this->db->join('categories_upload','categories_upload.id_category = upload_kode.category_id','LEFT');
            $this->db->order_by('upload_id','DESC');
            $query = $this->db->get();
            return $query->result_array();
        }
		
		 // Limit listing event
        public function limitUploadCat($slug_cat,$limit,$start) {
            $this->db->select('*');
            $this->db->from('upload_kode');     
			$this->db->where(array('slug_cat' => $slug_cat, 'status_upload' => 'publish')); 			
            $this->db->join('categories_upload','categories_upload.id_category = upload_kode.category_id','LEFT');                       
            $this->db->order_by('upload_id','DESC');
            $this->db->limit($limit,$start);
            $query = $this->db->get();
            return $query->result_array();
        }
		
		 // Limit listing event
        public function DlimitUpload($user_id, $limit,$start) {
            $this->db->select('*');
            $this->db->from('upload_kode');     
			$this->db->where(array('status_upload' => 'draf', 'upload_kode.user_id' => $user_id)); 		
            $this->db->join('categories_upload','categories_upload.id_category = upload_kode.category_id','LEFT');                       
            $this->db->order_by('upload_id','DESC');
            $this->db->limit($limit,$start);
            $query = $this->db->get();
            return $query->result_array();
        }
		
		// Listing Blogs
        public function limitScreenshoot($upload_kode) {
            $this->db->select('*');
            $this->db->from('screenshoot');
			$this->db->where('upload_kode',$upload_kode);	
            $this->db->join('upload_kode','upload_kode.upload_id = screenshoot.upload_kode','LEFT');            
            $this->db->order_by('id','DESC');
            $this->db->limit(1);
            $query = $this->db->get();
            return $query->result_array();
        }
		
		 public function listScreenshoot($upload_kode) {
            $this->db->select('*');
            $this->db->from('screenshoot');
			$this->db->where('upload_kode',$upload_kode);	
            $this->db->join('upload_kode','upload_kode.upload_id = screenshoot.upload_kode','LEFT');            
            $this->db->order_by('id','DESC');
            $query = $this->db->get();
            return $query->result_array();
        }
		
		public function totalUpload($user_id) {
			$query = $this->db->get_where('upload_kode',array('user_id' => $user_id));
			return $query->num_rows();
		}
		
		public function totalRate($kode_id) {
			$query = $this->db->get_where('review',array('kode_id' => $kode_id));
			return $query->num_rows();
		}
		
		public function totalVote($kode_id) {
            $this->db->select('SUM(vote) as total');
			$this->db->from('review');
			$this->db->where('kode_id',$kode_id);
			return $this->db->get()->row()->total;
        }
		
		// Listing Ratting 
        public function listRate($user_id) {
            $this->db->select('*');
            $this->db->from('review');
			$this->db->where(array('upload_kode.user_id' => $user_id)); 
            $this->db->join('upload_kode','upload_kode.upload_id = review.kode_id','LEFT');            
            $this->db->join('users','users.user_id = review.user_id','LEFT');            
            $this->db->order_by('review_id','DESC');
            $query = $this->db->get();
            return $query->result_array();
        }

        // Profile Rate 
        public function profileRate($username) {
            $this->db->select('*');
            $this->db->from('review');
            $this->db->join('upload_kode','upload_kode.upload_id = review.kode_id','LEFT');            
            $this->db->join('users','users.user_id = review.user_id','LEFT');             
            $this->db->where(array('users.username' => $username));            
            $this->db->order_by('review_id','DESC');
            $query = $this->db->get();
            return $query->result_array();
        } 
		
		// Listing Ratting 
        public function yourReview($user_id) {
            $this->db->select('*');
            $this->db->from('review');
			$this->db->where(array('review.user_id' => $user_id)); 
            $this->db->join('upload_kode','upload_kode.upload_id = review.kode_id','LEFT');   
            $this->db->join('users','users.user_id = review.user_id','LEFT');            
            $this->db->order_by('review_id','DESC');
            $query = $this->db->get();
            return $query->result_array();
        }
		
		// Listing Ratting per upload kode
        public function listRateKode($kode_id) {
            $this->db->select('*');
            $this->db->from('review');
			$this->db->where(array('kode_id' => $kode_id));  
            $this->db->join('users','users.user_id = review.user_id','LEFT');            
            $this->db->order_by('review_id','DESC');
            $query = $this->db->get();
            return $query->result_array();
        }

    }
