<?php
	/*
    @Copyright sedotkode.com
    @Class Name : Files Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Files_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }
		

        // Listing Files
        public function listing() {
            $this->db->select('*');
            $this->db->from('files');
            $this->db->join('upload_kode','upload_kode.upload_id = files.upload_id','LEFT');
            $this->db->order_by('file_id','DESC');
            $query = $this->db->get();
            return $query->result_array();
        }
		
		 // Create File
        public function create($data) {
            $this->db->insert('files',$data);
        }
		
		// Edit File
        public function edit($data) {
            $this->db->where('file_id',$data['file_id']);
            $this->db->update('files',$data);
        } 	
		
		// Delete files
        public function delete($data) {
            $this->db->where('file_id',$data['file_id']);
            $this->db->delete('files',$data);
        }

		
		// Detail Files
        public function detailfiles($file_id) {
            $this->db->select('*');
            $this->db->from('files');
            $this->db->where('file_id',$file_id);
            $this->db->order_by('file_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }

        // Detail Blog
        public function listByUploadID($upload_id) {
            $this->db->select('*');
            $this->db->from('files');
            $this->db->join('upload_kode','upload_kode.upload_id = files.upload_id');
            $this->db->where('files.upload_id',$upload_id);
            $this->db->order_by('file_id','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }        		
	
    }
