<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function get($userId){
		$user = $this->db->query("SELECT * FROM users WHERE id = '{$userId}'");
		if($user->num_rows() > 0){
			return $user->row();
		} else {
			return 0;
		}
	}
	public function login($data){
		$email = $data['email'];
		$password = md5($data['password']);
		$user = $this->db->query("SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
		if($user->num_rows() > 0){
			$user = $user->row();
			return $user->id;
		} else {
			return 0;
		}
	}
}