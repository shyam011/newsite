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

	$_SESSION['refreshtime'] = time();
	if( SECURE_CHECK === true && ( time() - $_SESSION['secure_check_duration'] ) >= SECURE_CHECK_DURATION ){
			global $con;
			$chk = $con->query("SELECT * FROM users WHERE id={$_SESSION['id']} AND user_type='{$_SESSION['user_type']}' AND email='{$_SESSION['email']}' AND status='Active' LIMIT 1")->fetch_object();

			if( $chk->id && checkPass($chk->pass,$_SESSION['pass']) === true ){
				$_SESSION['secure_check_duration'] = time();
			}else{
				unregisterSession();
			}

	}
	return true;
}


function registerSession($user_id=''){
	if( isset($user_id) && is_numeric($user_id) ){
		global $con;
		$user = $con->query("SELECT * FROM users WHERE id=$user_id")->fetch_object();
		if($user->id){
			$_SESSION['id']						= $user->id;
			$_SESSION['user_type']				= $user->user_type;
			$_SESSION['email']					= $user->email;
			$_SESSION['pass']					= $user->pass;
			$_SESSION['fname']					= $user->fname;
			$_SESSION['lname']					= $user->lname;
			$_SESSION['logintime']				= time();
			$_SESSION['refreshtime']			= time();
			$_SESSION['secure_check_duration']	= time();
		}else{
			echo "Not a Valid User";die;
		}
	}else{
		echo "User ID is missing!";die;
	}
}


function checkEmail( $email ){
	if( isset($email) ){
		global $con;
		$email = $con->escape_string($email);
		$hasRow = $con->query("SELECT * FROM users WHERE email='$email'")->num_rows;
		if( $hasRow > 0 ){
			return true;
		}else{
			return false;
		}
	}
}


function unregisterSession(){
		unset($_SESSION['id']);
		unset($_SESSION['user_type']);
		unset($_SESSION['email']);
		unset($_SESSION['pass']);
		unset($_SESSION['fname']);
		unset($_SESSION['lname']);
		unset($_SESSION['logintime']);
		unset($_SESSION['refreshtime']);
		unset($_SESSION['secure_check_duration']);
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


function showMessage($msg, $type = 'success'){
//success, info, warning, danger

	return '<div class="alert alert-'.$type.' fade in alert-dismissable" style="margin-top:18px;">
				<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
			'.$msg.'
			</div>';

}


function showSessionMessage($jsonData=''){
	if($jsonData){
		foreach($jsonData as $k => $data){
			$real = json_decode($data);
			$type = ($real->success == true) ? 'success' : ($real->type?:'danger');
			echo showMessage($real->msg, $type);
		}
			unset($_SESSION['err']);
	}
}




?>
