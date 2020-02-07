<?php 	
	function getAllNameClassifyingByCategoryID(){
		$id = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : 0;
		$sql = '
			select DISTINCT name
			from tblclassifying
			where categoryID=?;
		';
		$stmt=$GLOBALS['con']->prepare($sql);
		$stmt->bind_param('i',$id);
		$stmt->execute();
		$result=$stmt->get_result();

		$list = array();
		if($result->num_rows>0){
			while ($row=$result->fetch_assoc()) {
			    $list[] = array(
			    	'name' => $row['name'] 
			    );
			}
		}
		$stmt->close();
		die(json_encode($list));
	}
	function getAllNameClassifyingByCategoryIDPHP($id){
		$sql = '
			select DISTINCT name
			from tblclassifying
			where categoryID=?;
		';
		$stmt=$GLOBALS['con']->prepare($sql);
		$stmt->bind_param('i',$id);
		$stmt->execute();
		$result=$stmt->get_result();

		$list = array();
		if($result->num_rows>0){
			while ($row=$result->fetch_assoc()) {
			    $list[] = array(
			    	'name' => $row['name'] 
			    );
			}
		}
		$stmt->close();
		return (json_encode($list));
	}
 ?>