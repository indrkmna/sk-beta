<?php
	/*
    @Copyright sedotkode.com
    @Class Name : Article Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Contact_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }
		
		
		 // Create contact
        public function createContact($data) {
            $this->db->insert('contact',$data);
        }
		
		// Edit contact
        public function editContact($data) {
            $this->db->where('contact_id',$data['contact_id']);
            $this->db->update('contact',$data);
        } 	
		
		// Delete contact
        public function deleteContact($data) {
            $this->db->where('contact_id',$data['contact_id']);
            $this->db->delete('contact',$data);
        }

        // End contact
        public function endContact() {
            $this->db->select('*');
            $this->db->from('contact');
            $this->db->order_by('contact_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }  
		
		// Detail Blog
        public function detailContact($contact_id) {
            $this->db->select('*');
            $this->db->from('contact');
            $this->db->where('contact_id',$contact_id);
            $this->db->order_by('contact_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }		
		
        // Listing Blogs
        public function listcontact() {
            $this->db->select('*');
            $this->db->from('contact');
            $this->db->join('admins','admins.admin_id = contact.user_id','LEFT');            
            $this->db->join('categories_contact','categories_contact.id_category = contact.category_id','LEFT');
            $this->db->order_by('contact_id','DESC');
            $query = $this->db->get();
            return $query->result_array();
        }
		

    }
