<?php 
echo "<pre>";
print_r($_SERVER);
die;
/* date_default_timezone_set(remote_timezone()); */
/* remote_timezone(); */
function is_logged_in(){
	$ci =& get_instance();
	$user = $ci->session->userdata('userdata');
	return isset($user->id);
}

function authenticateUser(){
	$ci =& get_instance();
	$lastSegment = $ci->uri->segment_array();
	$lastSegment = end($lastSegment);
	$controller = $ci->router->fetch_class();
	$method = $ci->router->fetch_method();
	$isAdmin = (strpos($_SERVER['REQUEST_URI'], 'admin') === true) ? true : false;
	// redirect if not logged in
	if(!is_logged_in() && $method != 'login'){
		$redirectUrl = urlencode(base_url().ltrim($_SERVER['ORIG_PATH_INFO'],'/'));
		redirect("login?next={$redirectUrl}");
	}
}

function formatProcedureProgress($progress){
	$num = 0;
	$progress = json_decode($progress);
	/* echo "<pre>";
	print_r($progress);
	die; */
	if(!empty((array)$progress->data)){
		foreach($progress->data as $count){
			if($count > 0){
				$num++;
			}
		}
		echo $num.' / '.$progress->stepsCount;
	} else {
		echo '0/0';
	}
}

function formatProcessProgress($progress){
	$num = 0;
	$progress = json_decode($progress);
	if(!empty($progress->data)){
		foreach($progress->data as $count){
			if($count > 0){
				$num++;
			}
		}
		echo $num.' / '.$progress->proceduresCount;
	} else {
		echo '0/0';
	}
}

function procedureProgressPercent($progress){
	$num = 0;
	$progress = json_decode($progress);
	if(!empty((array)$progress->data)){
		if($progress->stepsCount > 0){
			foreach($progress->data as $count){
				if($count > 0){
					$num++;
				}
			}
			echo number_format(($num/$progress->stepsCount) * 100, 2, '.', ',');
		} else {
			echo number_format(0, 2, '.', ',');
		}
	} else {
		echo number_format(0, 2, '.', ',');
	}
}

function processProgressPercent($progress){
	$num = 0;
	$progress = json_decode($progress);
	if(!empty($progress->data)){
		if($progress->proceduresCount > 0){
			foreach($progress->data as $count){
				if($count > 0){
					$num++;
				}
			}
			echo number_format(($num/$progress->proceduresCount) * 100, 2, '.', ',');
		} else {
			echo number_format(0, 2, '.', ',');
		}
	} else {
		echo number_format(0, 2, '.', ',');
	}
}

function tcpdf()
{
    require_once('../third_party/tcpdf/config/lang/eng.php');
    require_once('../third_party/tcpdf/tcpdf.php');
}

function userPlaceholderUrl(){
	return site_url('assets/images/user-placeholder.jpg');
}


function timezone_list(){
    static $timezones = null;

    if ($timezones === null) {
        $timezones = [];
        $offsets = [];
        $now = new DateTime();

        foreach (DateTimeZone::listIdentifiers() as $timezone) {
            $now->setTimezone(new DateTimeZone($timezone));
            $offsets[] = $offset = $now->getOffset();
            $timezones[$timezone] = '(' . format_GMT_offset($offset) . ') ' . format_timezone_name($timezone);
        }

        array_multisort($offsets, $timezones);
    }

    return $timezones;
}

function format_GMT_offset($offset) {
    $hours = intval($offset / 3600);
    $minutes = abs(intval($offset % 3600 / 60));
    return 'GMT' . ($offset ? sprintf('%+03d:%02d', $hours, $minutes) : '');
}

function format_timezone_name($name) {
    $name = str_replace('/', ', ', $name);
    $name = str_replace('_', ' ', $name);
    $name = str_replace('St ', 'St. ', $name);
    return $name;
}

function remote_timezone(){
	$ci =& get_instance();
	$ci->load->library('session');
	$ci->load->database();
	$user = $ci->session->userdata('userdata');
	$userTimezone = get_user_data($user['id'], 'timezone', true);
	if(!empty($userTimezone)){
		return $userTimezone;
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
		$location = json_decode(file_get_contents("http://ip-api.com/json/{$ip}")); 
		$timezone = isset($location->timezone) ? $location->timezone : 'Asia/Kolkata';
		return $timezone;
	}
}

function get_user_data($userId = 0, $key, $single){
	if($userId == 0) return;
	$ci =& get_instance();
	$ci->load->database();
	$result = $ci->db->query("SELECT * FROM user_data WHERE user_id = '{$userId}' AND `key` = '{$key}'");
	if($result->num_rows() > 0){
		if($single){
			$result = $result->row();
			return $result[$key];
		} else {
			return $result->row();
		}
	} else {
		return false;
	}
}

function update_user_data($userId = 0, $key, $value){
	if($userId == 0) return;
	$ci =& get_instance();
	$ci->load->database();
	$exists = $ci->db->query("SELECT * FROM user_data WHERE user_id = '{$userId}' AND `key` = '{$key}'");
	if($result->num_rows() > 0){
		$ci->db->query("UPDATE user_data SET value = '{$value}' WHERE user_id = '{$userId}' AND `key` = '{$key}'");
	} else {
		$ci->db->query("INSERT into user_data (user_id, `key`, value) VALUES ('{$userId}', '{$key}', '{$value}')");
	}
}

function getCurrencySymbol(){
	return '$';
}

function getCreditCardType($str, $format = 'string'){
	if (empty($str)) {
		return false;
	}

	$matchingPatterns = [
		'visa' => '/^4[0-9]{12}(?:[0-9]{3})?$/',
		'mastercard' => '/^5[1-5][0-9]{14}$/',
		'amex' => '/^3[47][0-9]{13}$/',
		'diners' => '/^3(?:0[0-5]|[68][0-9])[0-9]{11}$/',
		'discover' => '/^6(?:011|5[0-9]{2})[0-9]{12}$/',
		'jcb' => '/^(?:2131|1800|35\d{3})\d{11}$/',
		'any' => '/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$/'
	];

	$ctr = 1;
	foreach ($matchingPatterns as $key=>$pattern) {
		if (preg_match($pattern, $str)) {
			return $format == 'string' ? $key : $ctr;
		}
		$ctr++;
	}
}

function weekOfMonth($date) {
    $firstOfMonth = strtotime(date("Y-m-01", $date));
    return intval(date("W", $date)) - intval(date("W", $firstOfMonth)) + 1;
}

function weekDayOfMonth($date) {
	$relativeNums = array('', 'First', 'Second', 'Third', 'Fourth', 'Fifth', 'Sixth');
     if($date==''){
        $t=date('d-m-Y');
    } else {
        $t=date('d-m-Y',$date);
    }

    $dayName = strtolower(date("D",strtotime($t)));
    $dayNum = strtolower(date("d",strtotime($t)));
    $day = floor(($dayNum - 1) / 7) + 1;
	return $relativeNums[$day];
}

function setDefaultTimezone(){
	$obj = &get_instance();
	$obj->load->library('session');
	$obj->load->model('Users_model');
	if(isset($_SESSION['userdata']) && isset($_SESSION['userdata']['id'])){
		$userTimezone = $obj->Users_model->getUsermeta($_SESSION['userdata']['id'], 'timezone', true);
		$timezone = !empty($userTimezone) ? $userTimezone : 'Asia/Kolkata';
		date_default_timezone_set($timezone);
	}
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