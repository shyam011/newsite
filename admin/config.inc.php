<?php

$show_err = true;//false;

if($show_err === true){
	ini_set("display_erros",1);
	error_reporting(E_ALL);
}else{
	ini_set("display_erros",0);
	error_reporting(0);
}

$site_url = 'http://localhost/newsite/';
$site_dir = '/var/www/html/newsite/';

$site_url_admin = 'http://localhost/newsite/admin/';
$site_dir_admin = '/var/www/html/newsite/admin/';
$salt = '$2a$07$thisisthebestmethodofencryptioneverybodymusttry';

define('SITE_URL', $site_url);
define('SITE_DIR', $site_dir);

define('SITE_URL_ADMIN', $site_url_admin);
define('SITE_DIR_ADMIN', $site_dir_admin);

define('PASS_SALT', $salt);
define('SECURE_CHECK', true);			//false
define('SECURE_CHECK_DURATION', 300);	// Check for 5min
define('PASSWORD_LENGTH', 8);

define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS','shyam@01');
define('DB_NAME','newsite');


$con = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if(mysqli_connect_errno()) {
	echo "Error: Could not connect to database.";exit;
}

$GLOBALS['con'];

//$a = $con->query("SELECT * FROM users")->fetch_all(MYSQLI_ASSOC);print_r($a);

//echo "aaa";
?>
