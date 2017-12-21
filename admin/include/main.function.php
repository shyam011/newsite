<?php
@session_start();

function checklogin($user_type = 'member'){

	if( isset($_SESSION['user_type']) && isset($_SESSION['id']) ){

		//if admin then throw other user out
		if($user_type == 'admin' && $_SESSION['user_type'] == 'member'){
			echo '<meta http-equiv="refresh" content="0; url='.SITE_URL_ADMIN.'">';exit;
		}

	}else{

		echo '<meta http-equiv="refresh" content="0; url='.SITE_URL_ADMIN.'">';exit;

	}
return true;
}


function checkPass($db_pass, $user_pass){
	if ( crypt($user_pass, $db_pass) == $db_pass ){
		return true;
	}else{
		return false;
	}
}

function cryptPass($password=''){

	return $digest = crypt($password, PASS_SALT);

}

function encode_array($array){
	return urlencode(base64_encode(json_encode($array)));
}

function decode_array($array){
	return json_decode(base64_decode(urldecode($array)));
}





?>
