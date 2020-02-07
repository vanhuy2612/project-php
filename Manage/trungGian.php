<?php 
	include_once '../Controller/dbCon.php';
	include_once '../Controller/userImpl.php';
	session_start();
	$username=(isset($_REQUEST['username'])) ? $_REQUEST['username'] : "";
	$password=(isset($_REQUEST['password'])) ? $_REQUEST['password'] : "";

	if($username!=""&&$password!=""){
		$User=getUser($username,$password);
		$user=json_decode($User,true);
		if($user!=NULL){
			foreach ($user as $val) {
				$_SESSION['name']=$val['username'];
				$_SESSION['position']=$val['position'];
			}
			
			if(isset($_SESSION['name'])&&isset($_SESSION['position'])){
				if($_SESSION['position']=="admin") include_once 'admin.php';
			}
		}
	}

 ?>