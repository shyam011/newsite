<?php
include_once( "/var/www/html/newsite/admin/config.inc.php" );
include_once( SITE_DIR_ADMIN."include/main.function.php" );

function __autoload($class_name) {
	require_once("classes/$class_name.php");
}
?>
