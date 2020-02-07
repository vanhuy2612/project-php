<?php 
	include_once './dbCon.php';
	include_once './classifyingImpl.php';
	$request = (isset($_REQUEST['REQUEST'])) ? $_REQUEST['REQUEST'] : "";
	switch ($request) {
		// Tìm tên tất cả danh mục con trong danh mục cha : ---------------------Pass
		case 'getAllNameClassifyingByCategoryID':
			getAllNameClassifyingByCategoryID();
			break;
		// Thêm vào sau khi thêm 1 Item:------------------------------------------Pass	
		default:
			// code...
			break;
	}
	
 ?>