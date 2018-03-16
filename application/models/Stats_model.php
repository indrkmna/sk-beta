<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stats_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}

	// Stat Admins
	public function admins() {
		$query = $this->db->get('admins');
		return $query->num_rows();	
	}

	// Stat Blogs
	public function articles() {
		$query = $this->db->get('articles');
		return $query->num_rows();	
	}

	// Stat Products
	public function package() {
		$query = $this->db->get('package');
		return $query->num_rows();	
	}

	// Stat Event
	public function event() {
		$query = $this->db->get('events');
		return $query->num_rows();	
	}	

	// Stat Clients
	public function users() {
		$query = $this->db->get('users');
		return $query->num_rows();	
	}

	// Stat Membership
	public function member() {
		$query = $this->db->get('membership');
		$query = $this->db->get_where('membership',array('status_member' => 'active'));		
		return $query->num_rows();	
	}			

	// Stat Downloads
	public function downloads() {
		$query = $this->db->get('downloads');
		return $query->num_rows();	
	}

	// Stat Contacts
	public function contact() {
		$query = $this->db->get('contact');
		return $query->num_rows();	
	}					

	// Stat Galleries
	public function media() {
		$query = $this->db->get('videos');
		return $query->num_rows();	
	}	

	// Stat Galleries Publish
	public function galleriesPublish() {
		$query = $this->db->get_where('galleries',array('status' => 'publish'));
		return $query->num_rows();	
	}	

	// Stat Upload Publish
	public function uploadPublish() {
		$query = $this->db->get_where('upload_kode',array('status' => 'publish'));
		return $query->num_rows();	
	}

	// Stat Upload Draf
	public function uploadDraf() {
		$query = $this->db->get_where('upload_kode',array('status' => 'draf'));
		return $query->num_rows();	
	}			

}