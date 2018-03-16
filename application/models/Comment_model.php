<?php
	/*
    @Copyright sedotkode.com
    @Class Name : Article Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Comment_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }
		
		
		 // Create comment
        public function createcomment($data) {
            $this->db->insert('comment',$data);
        }
		
		// Edit comment
        public function editcomment($data) {
            $this->db->where('comment_id',$data['comment_id']);
            $this->db->update('comment',$data);
        } 	
		
		// Delete comment
        public function deletecomment($data) {
            $this->db->where('comment_id',$data['comment_id']);
            $this->db->delete('comment',$data);
        }

        // End comment
        public function endcomment() {
            $this->db->select('*');
            $this->db->from('comment');
            $this->db->order_by('comment_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }  
		
		// Detail Blog
        public function detailcomment($comment_id) {
            $this->db->select('*');
            $this->db->from('comment');
            $this->db->where('comment_id',$comment_id);
            $this->db->order_by('comment_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }		
		
        // Listing Blogs
        public function listcommentArticle($article_id) {
            $this->db->select('*');
            $this->db->from('comment');
            $this->db->where('articles.article_id',$article_id);
            $this->db->join('users','users.user_id = comment.user_id','LEFT');            
            $this->db->join('articles','articles.article_id = comment.article_id','LEFT');
            $this->db->order_by('comment_id','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }
		
		
				// Stat Admins
			public function totalComment($article_id) {
				$query = $this->db->get_where('comment',array('article_id' => $article_id));
				return $query->num_rows();	
			}

    }
