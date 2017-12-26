<?php
include_once('entrypoint.php');

unregisterSession();
$_SESSION['err'][] = json_encode(array('success' => false, 'msg' => 'Successfully Logged Out!'));

echo '<meta http-equiv="refresh" content="0; url='.SITE_URL_ADMIN.'login.php">';

?>
