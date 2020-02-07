<?php 
	include_once './dbCon.php';
	include_once './userImpl.php';
	$request = (isset($_REQUEST['REQUEST'])) ? $_REQUEST['REQUEST'] : "";
	switch ($request) {
		case 'logout':
			logout();
			break;
		case 'register':
			register();
			break;
		default:
			// code...
			break;
	}
	
 ?>