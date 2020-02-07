<?php 
	include_once './dbCon.php';
	include_once './categoryImpl.php';
	// Lấy tất cả danh mục-----------------------------------Pass
	$request = (isset($_REQUEST['REQUEST'])) ? $_REQUEST['REQUEST'] : "";
	switch ($request) {
		case 'getAllCategory':
			getAllCategory();
			break;
		
		default:
			// code...
			break;
	}
 ?>