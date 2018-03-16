<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}

	// Stat Admins
	public function admins() {
		$query = $this->db->get('admins');
		return $query->num_rows();	
	}

	// Total Kode Publish
	public function listKodePublish($user_id) {
		$query = $this->db->get_where('upload_kode',array('status_upload' => 'publish','user_id' => $user_id));
		return $query->num_rows();	
	}
	
	// Total Kode Reviews
	public function TotalReviews($user_id) {
		$query = $this->db->get_where('review',array('user_id' => $user_id));
		return $query->num_rows();	
	}
}	