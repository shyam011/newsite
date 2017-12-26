<?php

class LoginRegister{

public function login( $userName, $password ){

	if( isset($userName) && isset($password) && $userName != '' && $password != '' ){

		global $con;
		$userName = $con->escape_string($userName);

		$getRow = $con->query("SELECT * FROM users WHERE email='$userName' LIMIT 1")->fetch_object();

		if( $getRow->id > 0 && checkPass( $getRow->pass, $password ) === true ){
			registerSession($getRow->id);
			return json_encode(array('success' => true, 'msg' => 'Successfully Logged In'));
		}else{
			return json_encode(array('success' => false, 'msg' => "Invalid Username OR Password"));
		}
	}else{
			return json_encode(array('success' => false, 'msg' => "UserName and Password cannot be blank!"));
	}

}


public function register( $fields ){

	if( trim($fields['email']) == '' ){
		return json_encode(array('success' => false, 'msg' => "Email cannot be blank!"));
	}
	elseif( !filter_var($fields['email'], FILTER_VALIDATE_EMAIL) ){
		return json_encode(array('success' => false, 'msg' => "Invalid Email!"));
	}
	elseif( checkEmail($fields['email']) === true ){
		return json_encode(array('success' => false, 'msg' => "Email '{$fields['email']}' already in use."));
	}
	elseif( trim($fields['pass']) == '' ){
		return json_encode(array('success' => false, 'msg' => "Password cannot be blank!"));
	}
	elseif( strlen(trim($fields['pass'])) < PASSWORD_LENGTH ){
		return json_encode(array('success' => false, 'msg' => "Password should be minimum ".PASSWORD_LENGTH." characters."));
	}

		$vars = array(
						'email' => $fields['email'],
						'pass' => cryptPass($fields['pass']),
						'fname' => $fields['fname'],
						'lname' => $fields['lname'],
						'created_at' => date('Y-m-d H:i:s')
					);
		return $in = crud::create('users', $vars);

}


}

?>
