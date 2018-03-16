<?php
	/*
    @Copyright sedotkode.com
    @Class Name : Article Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Article_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Blogs
        public function listArtikel() {
            $this->db->select('*');
            $this->db->from('articles');
            $this->db->join('users','users.user_id = articles.user_id','LEFT');            
            $this->db->join('categories','categories.category_id = articles.category_id','LEFT');
            $this->db->order_by('article_id','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }
        
        // Listing Blogs
        public function listArtikelUser($username) {
            $this->db->select('*');
            $this->db->from('articles');
            $this->db->join('users','users.user_id = articles.user_id','LEFT');
             $this->db->where(array('status_article' => 'publish', 'users.username' => $username));
            $this->db->join('categories','categories.category_id = articles.category_id','LEFT');
            $this->db->order_by('article_id','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }
        
        // Listing By Tags
        public function listArticleTags($slug) {
            $this->db->select('*');
            $this->db->from('posts_tags'); 
			$this->db->where(array( 'status_article'    => 'publish',
                                    'tags.slug' => $slug,
                                ));			
            $this->db->join('tags','tags.id = posts_tags.tag_id','LEFT');
            $this->db->join('articles','articles.article_id = posts_tags.post_id','LEFT');
            $this->db->join('categories','categories.category_id = articles.category_id','LEFT');
            $this->db->join('users','users.user_id = articles.user_id','LEFT'); 
            $this->db->order_by('post_id','DESC');
            $query = $this->db->get();
            return $query->result_array();
        }

        // Listing Blogs Publish
        public function listArtikelPub() {
            $this->db->select('*');
            $this->db->from('articles');
            $this->db->where(array('status_article' => 'publish'));
            $this->db->join('admins','admins.admin_id = articles.user_id','LEFT');            
            $this->db->join('categories','categories.category_id = articles.category_id','LEFT');
            $this->db->order_by('article_id','DESC');
            $query = $this->db->get();
            return $query->result_array();
        }

        // Last Blogs Publish
        public function listLastArtikelPub() {
            $this->db->select('*');
            $this->db->from('articles');
            $this->db->where(array('status' => 'publish'));
            $this->db->join('admins','admins.admin_id = articles.user_id','LEFT');            
            $this->db->join('categories','categories.category_id = articles.category_id','LEFT');
            $this->db->order_by('article_id','DESC');
            $query = $this->db->get();
            return $query->result_array();
        }

        // Popular Post
        public function listPopularPost() {
            $this->db->select('*');
            $this->db->from('articles');
            $this->db->where(array('status_article' => 'publish'));            
            $this->db->join('admins','admins.admin_id = articles.user_id','LEFT');            
            $this->db->join('categories','categories.category_id = articles.category_id','LEFT');
            $this->db->order_by('views','DESC');
            $query = $this->db->get();
            return $query->result_array();
        }                        

        // Create Blog
        public function createArtikel($data) {
            $this->db->insert('articles',$data);
        }
		

        // Detail Blog
        public function detailArtikel($article_id) {
            $this->db->select('*');
            $this->db->from('articles');
            $this->db->where('article_id',$article_id);
            $this->db->order_by('article_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }

        // Read Blog
        public function slug($slug) {
            $this->db->select('*');
            $this->db->from('articles');
            $this->db->where(array('status_article' => 'publish'));    
            $this->db->join('users','users.user_id = articles.user_id','LEFT');                               
            $this->db->join('categories','categories.category_id = articles.category_id','LEFT');
            $this->db->where('slug_article',$slug);
            $query = $this->db->get();
            return $query->row_array();
        }         

        // Edit Article
        public function editArticle($data) {
            $this->db->where('article_id',$data['article_id']);
            $this->db->update('articles',$data);
        }       

		public function addView($data) {
            $this->db->where('slug_article',$data['slug_article']);
            $this->db->update('articles',$data);
        } 	

        // Delete Blog
        public function deleteArticle($data) {
            $this->db->where('article_id',$data['article_id']);
            $this->db->delete('articles',$data);
        }

        // End Blog
        public function endArtikel() {
            $this->db->select('*');
            $this->db->from('articles');
            $this->db->order_by('article_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }                                                                                 
		
		// Listing By User
        public function popularArticle() {
            $this->db->select('*');
            $this->db->from('articles'); 
			$this->db->where(array( 'status_article'    => 'publish')); 			
            $this->db->join('categories','categories.category_id = articles.category_id','LEFT');
            $this->db->order_by('views','DESC');
            $this->db->limit(5);
            $query = $this->db->get();
            return $query->result_array();
        }
		
		// Listing By User
        public function listArticle() {
            $this->db->select('*');
            $this->db->from('articles');                  
            $this->db->join('categories','categories.category_id = articles.category_id','LEFT');
            $this->db->order_by('article_id','DESC');
            $query = $this->db->get();
            return $query->result_array();
        }
		
        // Listing By User
        public function listArticleUser($user_id) {
            $this->db->select('*');
            $this->db->from('articles');         
            $this->db->join('categories','categories.category_id = articles.category_id','LEFT');
            $this->db->where(array('articles.user_id' => $user_id));
            $this->db->order_by('article_id','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }

 
        // Listing Article Package
        public function listArticlePackage($package_id) {
            $this->db->select('*');
            $this->db->from('articles');
            $this->db->where(array( 'status_article'    => 'publish',
                                    'articles.package_id' => $package_id,
                                ));            
            $this->db->join('admins','admins.admin_id = articles.user_id','LEFT');            
            $this->db->join('categories','categories.category_id = articles.category_id','LEFT');
            $this->db->join('package','package.package_id = articles.package_id','LEFT');
            $this->db->order_by('article_id','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }

		 // Limit listing event
        public function limitArticle($limit,$start) {
            $this->db->select('*');
            $this->db->from('articles');     
			$this->db->where('status_article','publish');
			$this->db->join('users','users.user_id = articles.user_id','LEFT');
            $this->db->join('categories','categories.category_id = articles.category_id','LEFT');                         
            $this->db->order_by('article_id','DESC');
            $this->db->limit($limit,$start);
            $query = $this->db->get();
            return $query->result_array();
        }
		
        // Limit listing event
        public function limitArticles($user_id, $limit,$start) {
            $this->db->select('*');
            $this->db->from('articles');
            $this->db->where(array( 
                                    'articles.user_id'  => $user_id,
                                ));    
            $this->db->join('users','users.user_id = articles.user_id','LEFT');            
            $this->db->join('categories','categories.category_id = articles.category_id','LEFT');                         
            $this->db->order_by('article_id','DESC');
            $this->db->limit($limit,$start);
            $query = $this->db->get();
            return $query->result_array();
        }

        // Total Category Article
        public function totalCategoryArticle($category_id,$package_id) {
            $this->db->select('*'); 
            $this->db->from('articles');
            $this->db->join('categories','categories.category_id = articles.category_id','LEFT');                                 
            $this->db->where(array( 'status_article'    => 'publish',
                                    'articles.package_id' => $package_id,
                                    'articles.category_id'=> $category_id,
                                ));       
            $this->db->order_by('article_id','DESC');
            $query = $this->db->get();
            return $query->num_rows();
        }  

        // Limit Category Articles 
        public function listCategoryArticle($package_id,$category_id, $limit,$start) {
            $this->db->select('*'); 
            $this->db->from('articles');
            $this->db->join('package','package.package_id = articles.package_id','LEFT');      
            $this->db->join('categories','categories.category_id = articles.category_id','LEFT');
            $this->db->where(array( 'status_article'        => 'publish',
                                    'articles.package_id'   => $package_id,
                                    'articles.category_id'  => $category_id,
                                ));    
            $this->db->order_by('article_id','ASC');
            $this->db->limit($limit, $start);        
            $query = $this->db->get();
            return $query->result_array();
        }

        // Search Article Dashboard
        public function searchArticle($user_id,$perPage, $uri, $ringkasan) {
            $this->db->select('*');
            $this->db->from('articles');
            $this->db->join('users','users.user_id = articles.user_id','LEFT');            
            $this->db->join('categories','categories.category_id = articles.category_id','LEFT');
            $this->db->where(array('articles.status_article' => 'publish','articles.user_id' => $user_id));                    
            if (!empty($ringkasan)) {
                $this->db->like('title', $ringkasan);
            }
            $this->db->order_by('article_id','asc');
            $getData = $this->db->get('', $perPage, $uri);

            if ($getData->num_rows() > 0)
                return $getData->result_array();
            else
                return null;
        }
        
        // Search Article
        public function searchArticles($perPage, $uri, $ringkasan) {
            $this->db->select('*');
            $this->db->from('articles');
            $this->db->join('users','users.user_id = articles.user_id','LEFT');            
            $this->db->join('categories','categories.category_id = articles.category_id','LEFT');
            $this->db->where(array('articles.status_article' => 'publish'));                    
            if (!empty($ringkasan)) {
                $this->db->like('title', $ringkasan);
            }
            $this->db->order_by('article_id','asc');
            $getData = $this->db->get('', $perPage, $uri);

            if ($getData->num_rows() > 0)
                return $getData->result_array();
            else
                return null;
        }

		// Related Post
        public function relatedPost($user_id, $category_id) {
            $this->db->select('*');
            $this->db->from('articles');
            $this->db->where(array( 
                                    'articles.user_id'  	=> $user_id,
                                    'articles.category_id'  => $category_id
                                ));    
            $this->db->join('users','users.user_id = articles.user_id','LEFT');            
            $this->db->join('categories','categories.category_id = articles.category_id','LEFT');                         
            $this->db->order_by('article_id','DESC');
            $this->db->limit(2);
            $query = $this->db->get();
            return $query->result_array();
        }  
		

    }
