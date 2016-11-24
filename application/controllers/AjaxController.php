<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxController extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	
	public function getAutocompleteCustomers(){
		$keyword = $_REQUEST['query'];
		$members = $this->Users_model->getAutocompleteCustomers($keyword);
		$membersData = array();
		foreach($members as $member):
			$profileImg = !empty($member->profile_img) ? $member->profile_img : userPlaceholderUrl();
			$membersData[] = array(
					'id' => $member->id,
					'name' => "<table cellpadding='2'>
									<tr>
										<td rowspan='2'>
											<img style='max-width: 50px; margin: 4px;' class='img-circle profile_img' src='{$profileImg}'>
										</td>
										<th>Name: </th>
										<td>{$member->firstname}&nbsp;{$member->lastname}</td>
									</tr>
									<tr>
										<th>Email: </th>
										<td>{$member->email}</td>
									</tr>
								</table>",
				);
		endforeach;
		echo json_encode($membersData);
		die;
	}
	
	public function getCustomer(){
		$userId = $_REQUEST['userId'];
		$user = $this->Users_model->get($userId);
		echo json_encode($user);
		die;
	}	
}