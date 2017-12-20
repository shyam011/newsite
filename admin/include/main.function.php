<?php
@session_start();

function checklogin($user_type = 'member'){

	if( isset($_SESSION['user_type']) && isset($_SESSION['id']) ){

		//if admin then throw other user out
		if($user_type == 'admin' && $_SESSION['user_type'] == 'member'){

			echo '<meta http-equiv="refresh" content="0; url='.SITE_URL_ADMIN.'">';

		}

	}else{

		echo '<meta http-equiv="refresh" content="0; url='.SITE_URL_ADMIN.'">';

	}

}



?>
