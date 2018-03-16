<?php
	/*
    @Copyright sedotkode.com
    @Class Name : Article Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Faq_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }
		
		
		 // Create faq
        public function createFaq($data) {
            $this->db->insert('faq',$data);
        }
		
		// Edit faq
        public function editFaq($data) {
            $this->db->where('faq_id',$data['faq_id']);
            $this->db->update('faq',$data);
        } 	
		
		// Delete faq
        public function deleteFaq($data) {
            $this->db->where('faq_id',$data['faq_id']);
            $this->db->delete('faq',$data);
        }

        // End faq
        public function endFaq() {
            $this->db->select('*');
            $this->db->from('faq');
            $this->db->order_by('faq_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }  
		
		// Detail Blog
        public function detailFaq($faq_id) {
            $this->db->select('*');
            $this->db->from('faq');
            $this->db->where('faq_id',$faq_id);
            $this->db->order_by('faq_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }		
		
        // Listing Blogs
        public function listFaq() {
            $this->db->select('*');
            $this->db->from('faq');
            $this->db->where('status','publish');
            $this->db->join('admins','admins.admin_id = faq.user_id','LEFT');            
            $this->db->order_by('faq_id','DESC');
            $query = $this->db->get();
            return $query->result_array();
        }
		

    }
