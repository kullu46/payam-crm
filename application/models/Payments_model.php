<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	
	public function add($data){
		$this->db->insert('payments',$data);
		return $this->db->insert_id();
	}
	
	public function getBy($field = 'id', $value){
		$this->db->select("*");
		$this->db->from("payments");
		$this->db->where($field, $value);
		$query = $this->db->get();
		return $query->row();
	}
}