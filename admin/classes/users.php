<?php

class users extends crud{

public static $table = 'users';

public static function getUser($id=''){

	$con = $id ? "AND id=$id" : '';
	return parent::selectRow(self::$table, '*', $con);

}

public static function setUser($fields, $id=''){

	if( isset($id) && is_numeric($id) ){
		return parent::update( self::$table, $fields, 'AND id='.$id );
	}else{
		return parent::create( self::$table, $fields );
	}

}

}

?>
