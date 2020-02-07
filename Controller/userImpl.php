<?php 
	function checkUsernameNull($username){
		$sql='
			select * 
			from tbluser
			where username like ?;
		 ';
		 $stmt=$GLOBALS['con']->prepare($sql);
		 $stmt->bind_param('s',$username);
		 $stmt->execute();
		 $result=$stmt->get_result();
		 if($result->num_rows>0) return 0;
		 else return 1;
	}
	function register(){
		$username = (isset($_REQUEST['username'])) ? $_REQUEST['username'] : "";
		$password = (isset($_REQUEST['password'])) ? $_REQUEST['password'] : "";
		$position = 'user';
		$ok=checkUsernameNull($username);
		if($ok==1&&$username!=""&&$password!=""){
			$sql='
				insert into tbluser(username,password,position)
				values(?,?,?);
			 ';
			 $position="user";
			 $stmt=$GLOBALS['con']->prepare($sql);
			 $stmt->bind_param('sss',$username,$password,$position);
			 $stmt->execute();
			 if($stmt->affected_rows>0) echo "Đăng kí tài khoản thành công";
			 else echo "Đăng kí thất bại";
		}else echo "Tài khoản khoản đã có người dùng";
	}
	function getUser($username,$password){
		$username = (isset($_REQUEST['username'])) ? $_REQUEST['username'] : '';
		$password = (isset($_REQUEST['password'])) ? $_REQUEST['password'] : '';

		$sql='
			select * 
			from tbluser
			where username like ? and password like ?;
		';
		$stmt=$GLOBALS['con']->prepare($sql);
		$stmt->bind_param('ss',$username,$password);
		$stmt->execute();
		$result = $stmt->get_result();
		$list=array();
		if($result->num_rows){
			while ($row=$result->fetch_assoc()) {
			   $list[]=array(
			   		"id" => $row['id'],
			   		"username" => $row['username'],
			   		"password" => $row['password'],
			   		"position" => $row['position']
			   );
			}
		}
		$stmt->close();
		return json_encode($list);
	}
	function logout()
	{
		session_destroy();// Xóa sạch session
	}
 ?>