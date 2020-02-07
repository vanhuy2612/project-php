<?php 
	// Trả về kết quả dạng JSON
	function getAllCategoryPHP(){
		$sql = '
			select *
			from tblcategory;
		';
		$stmt = $GLOBALS['con']->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();

		$LIST = array();
		if($result->num_rows>0){
			while ($row = $result->fetch_assoc()) {
			    $LIST[] = array(
			    	"id" => $row['id'],
			    	"name" => $row['name']
			    );
			}
		}
		$stmt->close();
		return (json_encode($LIST)); 
	}
	// 
	function getAllCategory(){
		$sql = '
			select *
			from tblcategory;
		';
		$stmt = $GLOBALS['con']->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();

		$LIST = array();
		if($result->num_rows>0){
			while ($row = $result->fetch_assoc()) {
			    $LIST[] = array(
			    	"id" => $row['id'],
			    	"name" => $row['name']
			    );
			}
		}
		$stmt->close();
		die(json_encode($LIST)); 
	}
 ?>