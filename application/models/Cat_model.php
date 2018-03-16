<?php
	/*
    @Copyright sedotkode.com
    @Class Name : Article Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Cat_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }
		
		
		 // Create Upload
        public function createCat($data) {
            $this->db->insert('categories_upload',$data);
        }
		
		// Edit Upload
        public function editUpload($data) {
            $this->db->where('id_category',$data['id_category']);
            $this->db->update('categories_upload',$data);
        }   
		
		// Delete upload
        public function deleteUpload($data) {
            $this->db->where('id_category',$data['id_category']);
            $this->db->delete('categories_upload',$data);
        }

        // End upload
        public function endCat() {
            $this->db->select('*');
            $this->db->from('categories_upload');
            $this->db->order_by('id_category','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }  
		
		// Detail Blog
        public function detailCat($id_category) {
            $this->db->select('*');
            $this->db->from('categories_upload');
            $this->db->where('id_category',$id_category);
            $this->db->order_by('id_category','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }
		
        // Listing Blogs
        public function listCat() {
            $this->db->select('*');
            $this->db->from('categories_upload');  
            $this->db->order_by('id_category','DESC');
            $query = $this->db->get();
            return $query->result_array();
        }
		
		// Listing Blogs
        public function listCatHome() {
            $this->db->select('*');
            $this->db->from('categories_upload');  
            $this->db->order_by('id_category','DESC');
            $this->db->limit(6);
            $query = $this->db->get();
            return $query->result_array();
        }
		

    }
