<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	
	public function add($data){
		$this->db->insert('jobs',$data);
		return $this->db->insert_id();
	}
	
	public function updateJobmeta($jobId, $key, $value){
		if(!$jobId) return;
		$exists = $this->db->query("SELECT * FROM job_meta WHERE `job_id` = '{$jobId}' AND `meta_key` = '{$key}'");
		$exists = ($exists->num_rows() > 0) ? 1 : 0;
		if($exists > 0){
			return $this->db->query("UPDATE job_meta SET `meta_value` = '{$value}' WHERE `meta_key` = '{$key}' AND `job_id` = '{$jobId}'");
		} else {
			return $this->db->query("INSERT INTO job_meta (`job_id`, `meta_key`, `meta_value`) VALUES ('{$jobId}', '{$key}', '{$value}')");
		}
	}
	
	public function getJobmeta($jobId, $key = '', $single = false){
		if(!$jobId) return;
		if(empty($key)){
			$data = $this->db->query("SELECT * FROM job_meta WHERE `job_id` = '{$jobId}'");
		} else {
			$data = $this->db->query("SELECT * FROM job_meta WHERE `job_id` = '{$jobId}' AND `meta_key` = '{$key}'");
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
	
	public function deleteJobmeta($jobId, $key){
		if(!$jobId) return;
		$exists = $this->db->query("SELECT * FROM job_meta WHERE `job_id` = '{$jobId}' AND `meta_key` = '{$key}'");
		$exists = ($exists->num_rows() > 0) ? 1 : 0;
		if($exists > 0){
			$this->db->query("DELETE FROM job_meta WHERE `meta_key` = '{$key}' AND `job_id` = '{$jobId}'");
		}
	}
	
	public function get($jobId){
		$user = $this->db->query("SELECT * FROM jobs WHERE id = '{$jobId}'");
		if($user->num_rows() > 0){
			return $user->row();
		} else {
			return 0;
		}
	}
	
	public function getAll($location = 'sydney'){
		$this->db->select("*");
		$this->db->from("jobs");
		$this->db->where("location", $location);
		$this->db->order_by("created", "desc");
		$query = $this->db->get();
		return $query->result();
	}
	
	public function remove($jobId){
		$jobMeta = $this->getJobmeta($jobId);
		foreach($jobMeta as $job):
			$this->deleteJobmeta($jobId, $job->meta_key);
		endforeach;
		return $this->db->query("DELETE FROM jobs WHERE id = '{$jobId}'");
	}
}