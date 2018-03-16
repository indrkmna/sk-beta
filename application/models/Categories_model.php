<?php
    /*
    @Copyright sedotkode.com
    @Class Name : Categories Model
    */
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Categories_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }
        

        // Listing categories
        public function listing() {
            $this->db->select('*');
            $this->db->from('categories');
            $this->db->order_by('category_id','DESC');
            $query = $this->db->get();
            return $query->result_array();
        }
        
        // Listing Category
        public function listCategories() {
            $this->db->select('*');
            $this->db->from('categories');
            $this->db->order_by('category_id','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }   
        
         // Create File
        public function create($data) {
            $this->db->insert('categories',$data);
        }
        
        // Edit File
        public function edit($data) {
            $this->db->where('category_id',$data['category_id']);
            $this->db->update('categories',$data);
        }   
        
        // Delete categories
        public function delete($data) {
            $this->db->where('category_id',$data['category_id']);
            $this->db->delete('categories',$data);
        }

        
        // Detail categories
        public function detail($category_id) {
            $this->db->select('*');
            $this->db->from('categories');
            $this->db->where('category_id',$category_id);
            $this->db->order_by('category_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }              
    
    }
