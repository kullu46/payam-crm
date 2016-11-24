<?php 
/* custom functions [init] */
function is_logged_in(){
	$ci =& get_instance();
	$user = $ci->session->userdata('userdata');
	return isset($user->id);
}

function authenticateUser(){
	$ci =& get_instance();
	$controller = $ci->router->fetch_class();
	$method = $ci->router->fetch_method();
	$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https' : 'http';
	if(!is_logged_in() && $method != 'login'){
		if(isset($_SERVER['SERVER_SOFTWARE']) && (strpos($_SERVER['SERVER_SOFTWARE'],'Google App Engine') !== false || strpos($_SERVER['SERVER_SOFTWARE'],'Development') !== false)) {
			$redirectUrl = urlencode($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		} else {
			$redirectUrl = urlencode($protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		}
		redirect("login?next={$redirectUrl}");
	}
}

function generateUsername($field, $keyword){
	$username = '';
	$ci =& get_instance();
	switch($field):
		case 'email':
			$keyword = explode('@', $keyword);
			$keyword = $keyword[0];
			$exists = $ci->db->query("SELECT id FROM users WHERE username LIKE '{$keyword}'");
			if($exists->num_rows() > 0):
				$keyword = $keyword.rand(101, 9999);
				$exists = $ci->db->query("SELECT id FROM users WHERE username LIKE '{$keyword}'");
				if($exists->num_rows() > 0):
					return generateUsername('name', $keyword);
				else:
					return $keyword;
				endif;
			else:
				$username = $keyword;
			endif;
			break;
		case 'name':
			$exists = $ci->db->query("SELECT id FROM users WHERE username LIKE '{$keyword}'");
			if($exists->num_rows() > 0):
				$keyword = $keyword.rand(101, 9999);
				$exists = $ci->db->query("SELECT id FROM users WHERE username LIKE '{$keyword}'");
				if($exists->num_rows() > 0):
					return generateUsername('name', $keyword);
				else:
					return $keyword;
				endif;
			else:
				$username = $keyword;
			endif;
			break;
		default:
			break;
	endswitch;
	return $username;
}

function generateJobNumber($location = 'sydney'){
	$username = '';
	$ci =& get_instance();
	$prefix = 'N';
	if($location == 'auckland'):
		$prefix = 'A';
	endif;
	$lastJobNumber = $ci->db->query("SELECT job_number FROM jobs ORDER BY job_number ASC");
	if($lastJobNumber->num_rows() > 0):
		$jobNumbers = $lastJobNumber->result_array();
		for($i=0;$i<sizeof($jobNumbers);$i++){ 
			if(isset($jobNumbers[$i+1]['job_number'])){
				if($jobNumbers[$i]['job_number']+1 != $jobNumbers[$i+1]['job_number']){
					return $jobNumbers[$i]['job_number']+1;
				}
			}
		}
		return $lastJobNumber->row()->job_number + 1;
	else:
		return 1000;
	endif;
}

function userPlaceholderUrl(){
	return site_url('assets/images/user.png');
}

function getCurrencySymbol(){
	return '$';
}
function getDirectorySize($dir){
    $size = 0;
    foreach (glob(rtrim($dir, '/').'/*', GLOB_NOSORT) as $each) {
        $size += is_file($each) ? filesize($each) : getDirectorySize($each);
    }
    return $size;
}

function timeToString($time){
    $time = time() - $time;
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second',
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }
}