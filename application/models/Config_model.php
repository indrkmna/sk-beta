<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Config Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Config_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Config
        public function list_config() {
            $this->db->select('*');
            $this->db->from('config');
            $this->db->order_by('config_id','ASC');
            $query = $this->db->get();
            return $query->row_array();
        }

        // Edit Config
        public function edit_config($data) {
            $this->db->where('config_id',$data['config_id']);
            $this->db->update('config',$data);
        }        

    }
