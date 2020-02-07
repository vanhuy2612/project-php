<?php 
	include_once 'dbCon.php';
	$request=(isset($_REQUEST['REQUEST'])) ? $_REQUEST['REQUEST'] : "";
	if($request=="addBooking") addBooking();
	function addBooking(){
		$userID = (isset($_REQUEST['userID'])) ? $_REQUEST['userID'] : 0;
		$itemID = (isset($_REQUEST['itemID'])) ? $_REQUEST['itemID'] : 0;
		$quantity = (isset($_REQUEST['quantity'])) ? $_REQUEST['quantity'] : 0;
		$price = (isset($_REQUEST['price'])) ? $_REQUEST['price'] : 0;
		if($userID!=0&&$itemID!=0&&$quantity!=0){
			$sql='
				insert into tblbooking(price,quantity,itemID,userID)
				values(?,?,?,?);
			';
			$stmt=$GLOBALS['con']->bind_param($sql);
			$stmt->bind_param('diii',$price,$quantity,$itemID,$userID);
			$stmt->execute();
			if($stmt->affected_rows>0) echo '("Đặt mua thành công");';
		} 
	}
	
 ?>