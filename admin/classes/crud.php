<?php

class crud{


static public function selectRow( $table, $fields='*', $whr='' ){
	if( isset($table) && $table != '' ){
		global $con;

		$query = "SELECT $fields FROM ".$table." WHERE 1 $whr;";
		$sel = $con->query($query);
		if($sel){
			return json_encode( array( 'success' => true, 'data' => $sel->fetch_all(MYSQLI_ASSOC) ) );
		}else{
			return json_encode(array('success' => false, 'msg' => $con->error));
		}
	}else{
			return json_encode(array('success' => false, 'msg' => 'Table name missing'));
	}
}


public function create( $table, $fields ){

	if( isset($table) && isset($fields) && $table != '' && sizeof($fields) > 0 ){
		global $con;
		foreach($fields as $k=>$v){
			$columns[] = $k;
			$values[]  = "'".$con->escape_string($v)."'";
		}
		$query = "INSERT INTO ".$table." (".implode(',',$columns).") values (".implode(',',$values).");";
		$ins = $con->query($query);
		if($ins){
			return json_encode(array('success' => true, 'id' => $con->insert_id, 'msg' => 'Successfully Inserted', 'data' => $fields));
		}else{
			return json_encode(array('success' => false, 'msg' => $con->error));
		}
	}else{
			return json_encode(array('success' => false, 'msg' => 'Insufficient Parameter'));
	}

}


public function update( $table, $fields, $cond ='' ){

	if( isset($table) && isset($fields) && $table != '' && sizeof($fields) > 0 && $cond ){
		global $con;
		foreach($fields as $k=>$v){
			$fldval[]  =  $k." = '".$con->escape_string($v)."'";
		}
		$query = "UPDATE ".$table." SET ".implode(', ',$fldval)." WHERE 1 ".$cond.";";
		$up = $con->query($query);
		if($up){
			return json_encode(array('success' => true, 'msg' => 'Successfully Updated', 'data' => $fields));
		}else{
			return json_encode(array('success' => false, 'msg' => $con->error));
		}
	}else{
			return json_encode(array('success' => false, 'msg' => 'Insufficient Parameter'));
	}

}


public function delete( $table, $cond = '' ){

	if( isset($table) && $cond ){
		global $con;
		$query = "DELETE FROM ".$table." WHERE 1 ".$cond.";";
		$del = $con->query($query);
		if($del){
			return json_encode(array('success' => true, 'msg' => 'Successfully Deleted'));
		}else{
			return json_encode(array('success' => false, 'msg' => $con->error));
		}
	}else{
			return json_encode(array('success' => false, 'msg' => 'Insufficient Parameter'));
	}

}

}

?>
