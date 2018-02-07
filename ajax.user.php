<?php

include_once('entryme.php');

$mode = $_POST['mode'];

switch($mode){

	case 'dologin':

		echo $trylogin = LoginRegister::login($_POST['email'], $_POST['password']);

	break;

	/*case '':
	break;*/

	default:
			echo json_encode(array('success' => false, 'msg' => "Invalid Request!!!"));
	break;

}

?>
