<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	
	public function add($data){
		$email = $data['email'];
		$exists = $this->db->query("SELECT * FROM users WHERE `email` = '{$email}'");
		$exists = ($exists->num_rows() > 0) ? 1 : 0;
		if($exists > 0):
			$user = $this->getBy('email', $data['email']);
			return $user->id;
		else: 
			$this->db->insert('users',$data);
			return $this->db->insert_id();
		endif;
	}
	
	public function get($userId){
		$user = $this->db->query("SELECT * FROM users WHERE id = '{$userId}'");
		if($user->num_rows() > 0){
			return $user->row();
		} else {
			return 0;
		}
	}
	
	public function getBy($field, $value){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($field, $value);
		$query = $this->db->get();
		return $query->row();
	}
	
	public function updateUsermeta($userId, $key, $value){
		if(!$userId) return;
		$exists = $this->db->query("SELECT * FROM user_meta WHERE `user_id` = '{$userId}' AND `meta_key` = '{$key}'");
		$exists = ($exists->num_rows() > 0) ? 1 : 0;
		if($exists > 0){
			return $this->db->query("UPDATE user_meta SET `meta_value` = '{$value}' WHERE `meta_key` = '{$key}' AND `user_id` = '{$userId}'");
		} else {
			return $this->db->query("INSERT INTO user_meta (`user_id`, `meta_key`, `meta_value`) VALUES ('{$userId}', '{$key}', '{$value}')");
		}
	}
	
	public function getUsermeta($userId, $key = '', $single = false){
		if(!$userId) return;
		if(empty($key)){
			$data = $this->db->query("SELECT * FROM user_meta WHERE `user_id` = '{$userId}'");
		} else {
			$data = $this->db->query("SELECT * FROM user_meta WHERE `user_id` = '{$userId}' AND `meta_key` = '{$key}'");
		}
		if($data->num_rows() > 0){
			if($single){
				$data = $data->row();
				return $data->meta_value;
			} else {
				return $data->result();
			}
		} else {
			return;
		}
	}
	
	public function deleteUsermeta($userId, $key){
		if(!$userId) return;
		$exists = $this->db->query("SELECT * FROM user_meta WHERE `user_id` = '{$userId}' AND `meta_key` = '{$key}'");
		$exists = ($exists->num_rows() > 0) ? 1 : 0;
		if($exists > 0){
			$this->db->query("DELETE FROM user_meta WHERE `meta_key` = '{$key}' AND `user_id` = '{$userId}'");
		}
		return true;
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
	
	public function getAutocompleteCustomers($keyword){
		$users = $this->db->query("SELECT DISTINCT * FROM users WHERE (firstname LIKE '%{$keyword}%' OR lastname LIKE '%{$keyword}%' OR username LIKE '%{$keyword}%' OR email LIKE '%{$keyword}%' OR company LIKE '%{$keyword}%' OR phone LIKE '%{$keyword}%' OR postcode LIKE '%{$keyword}%' OR street LIKE '%{$keyword}%' OR city LIKE '%{$keyword}%' OR country LIKE '%{$keyword}%') AND status = 1 AND role NOT IN ('administrator')");
		return $users->result();
	}
}