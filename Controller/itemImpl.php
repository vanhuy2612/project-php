<?php 

	
	function getItemByClassifyingName(){
		$name = (isset($_REQUEST['name'])) ? $_REQUEST['name'] : "";
		$sql = '
			select tblitem.id as id,tblitem.name as name,tblitem.price as price,tblitem.quantity as quantity,tblitem.des as des,tblitem.branchID as branchID,tblitem.view as view,tblitem.url as url  
			from tblitem 
			inner join tblclassifying
			on tblitem.id=tblclassifying.itemID
			where tblclassifying.name like ?
			order by tblitem.view desc;
		';
		if($name!=""){
			$name='%'.$name.'%';
			$stmt = $GLOBALS['con']->prepare($sql);
			$stmt->bind_param('s',$name);
			$stmt->execute();
			$result = $stmt->get_result();

			$list = array();
			if($result->num_rows>0){
				while ($row = $result->fetch_assoc()) {
			    	$list[] = array(
			    		'id' => $row['id'],
			    		'name' => $row['name'],
			    		'price' => $row['price'],
			    		'quantity' => $row['quantity'],
			    		'des' => $row['des'],
			    		'branchID' => $row['branchID'],
			    		'view' => $row['view'],
			    		'url' => $row['url']
			    	);
				}
			}
			$stmt->close();
			die(json_encode($list));
		}
	}
	function getItemByClassifyingNamePHP($name){
		$sql = '
			select tblitem.id as id,tblitem.name as name,tblitem.price as price,tblitem.quantity as quantity,tblitem.des as des,tblitem.branchID as branchID,tblitem.view as view,tblitem.url as url  
			from tblitem 
			inner join tblclassifying
			on tblitem.id=tblclassifying.itemID
			where tblclassifying.name like ?
			order by tblitem.view desc;
		';
		if($name!=""){
			$name='%'.$name.'%';
			$stmt = $GLOBALS['con']->prepare($sql);
			$stmt->bind_param('s',$name);
			$stmt->execute();
			$result = $stmt->get_result();

			$list = array();
			if($result->num_rows>0){
				while ($row = $result->fetch_assoc()) {
			    	$list[] = array(
			    		'id' => $row['id'],
			    		'name' => $row['name'],
			    		'price' => $row['price'],
			    		'quantity' => $row['quantity'],
			    		'des' => $row['des'],
			    		'branchID' => $row['branchID'],
			    		'view' => $row['view'],
			    		'url' => $row['url']
			    	);
				}
			}
			$stmt->close();
			return (json_encode($list));
		}
	}
	function autoIncrementViewItem(){
		$id = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : 0;
		$sql = '
			update tblitem 
				set view = view + 1
			where id=?;
		';
		$stmt = $GLOBALS['con']->prepare($sql);
		$stmt->bind_param('i',$id);
		$stmt->execute();

		$success = "Tăng số lần xem thất bại";
		if ($stmt->affected_rows>0) $success="Tăng số lần xem thành công";
		die($success); 
	}
	// Hàm thống kê số lượng hàng bán ra (kết quả trả về :id,sum) 
	function countSoldItem(){
		$sql = '
			select itemID as id,sum(quantity) as soluong
			from tblbooking
			group by itemID
			order by SUM(quantity) desc;
		';
		$stmt = $GLOBALS['con']->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();

		$list = array();
		if($result->num_rows>0){
			while ($row=$result->fetch_assoc()) {
			    $list[] = array(
			    	'id' => $row['id'],
			    	'soluong' => $row['soluong']	    		
		    	);
			}
		}
		$stmt->close();
		die(json_encode($list));
	}
	function getAllItem(){
		// Pass
		$sql = '
			select * 
			from tblitem
			order by view desc;
		';
		$stmt = $GLOBALS['con']->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();

		$list = array();
		if($result->num_rows>0){
			while ($row = $result->fetch_assoc()) {
		    	$list[] = array(
		    		'id' => $row['id'],
		    		'name' => $row['name'],
		    		'price' => $row['price'],
		    		'quantity' => $row['quantity'],
		    		'des' => $row['des'],
		    		'branchID' => $row['branchID'],
		    		'view' => $row['view'],
		    		'url' => $row['url']
		    	);
			}
		}
		$stmt->close();
		die(json_encode($list));
	}
	function getAllItemPHP(){
		// Pass
		$sql = '
			select * 
			from tblitem
			order by view desc;
		';
		$stmt = $GLOBALS['con']->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();

		$list = array();
		if($result->num_rows>0){
			while ($row = $result->fetch_assoc()) {
		    	$list[] = array(
		    		'id' => $row['id'],
		    		'name' => $row['name'],
		    		'price' => $row['price'],
		    		'quantity' => $row['quantity'],
		    		'des' => $row['des'],
		    		'branchID' => $row['branchID'],
		    		'view' => $row['view'],
		    		'url' => $row['url']
		    	);
			}
		}
		$stmt->close();
		return (json_encode($list));
	}
	function getItemByID(){
		$id = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : "";
		// Pass
		$sql = '
			select * 
			from tblitem
			where id=?
			order by view desc;
		';
		$stmt = $GLOBALS['con']->prepare($sql);
		$stmt->bind_param('i',$id);
		$stmt->execute();
		$result = $stmt->get_result();

		$list = array();
		if($result->num_rows>0){
			while ($row = $result->fetch_assoc()) {
		    	$list[] = array(
		    		'id' => $row['id'],
		    		'name' => $row['name'],
		    		'price' => $row['price'],
		    		'quantity' => $row['quantity'],
		    		'des' => $row['des'],
		    		'branchID' => $row['branchID'],
		    		'view' => $row['view'],
		    		'url' => $row['url']
		    	);
			}
		}
		$stmt->close();
		die(json_encode($list));
	}
	function getItemByIDPHP(){
		$id = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : "";
		// Pass
		$sql = '
			select * 
			from tblitem
			where id=?
			order by view desc;
		';
		$stmt = $GLOBALS['con']->prepare($sql);
		$stmt->bind_param('i',$id);
		$stmt->execute();
		$result = $stmt->get_result();

		$list = array();
		if($result->num_rows>0){
			while ($row = $result->fetch_assoc()) {
		    	$list[] = array(
		    		'id' => $row['id'],
		    		'name' => $row['name'],
		    		'price' => $row['price'],
		    		'quantity' => $row['quantity'],
		    		'des' => $row['des'],
		    		'branchID' => $row['branchID'],
		    		'view' => $row['view'],
		    		'url' => $row['url']
		    	);
			}
		}
		$stmt->close();
		return (json_encode($list));
	}
	function getItemByCategoryID(){
		// Pass
		$id = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : "";
		$sql = '
			select tblitem.id as id,tblitem.name as name,tblitem.price as price,tblitem.quantity as quantity,tblitem.des as des,tblitem.branchID as branchID,tblitem.view as view,tblitem.url as url  
			from tblitem
			inner join tblclassifying
				on tblitem.id=tblclassifying.itemID
			where tblclassifying.categoryID = ?
			order by tblitem.view desc;
		';
		$stmt = $GLOBALS['con']->prepare($sql);
		$stmt->bind_param('i',$id);
		$stmt->execute();
		$result = $stmt->get_result();

		$list = array();
		if($result->num_rows>0){
			while ($row = $result->fetch_assoc()) {
		    	$list[] = array(
		    		'id' => $row['id'],
		    		'name' => $row['name'],
		    		'price' => $row['price'],
		    		'quantity' => $row['quantity'],
		    		'des' => $row['des'],
		    		'branchID' => $row['branchID'],
		    		'view' => $row['view'],
		    		'url' => $row['url']
		    	);
			}
		}
		$stmt->close();
		die(json_encode($list));
	}
	function getItemByCategoryIDPHP($id){
		// Pass
		
		$sql = '
			select tblitem.id as id,tblitem.name as name,tblitem.price as price,tblitem.quantity as quantity,tblitem.des as des,tblitem.branchID as branchID,tblitem.view as view,tblitem.url as url  
			from tblitem
			inner join tblclassifying
				on tblitem.id=tblclassifying.itemID
			where tblclassifying.categoryID = ?
			order by tblitem.view desc;
		';
		$stmt = $GLOBALS['con']->prepare($sql);
		$stmt->bind_param('i',$id);
		$stmt->execute();
		$result = $stmt->get_result();

		$list = array();
		if($result->num_rows>0){
			while ($row = $result->fetch_assoc()) {
		    	$list[] = array(
		    		'id' => $row['id'],
		    		'name' => $row['name'],
		    		'price' => $row['price'],
		    		'quantity' => $row['quantity'],
		    		'des' => $row['des'],
		    		'branchID' => $row['branchID'],
		    		'view' => $row['view'],
		    		'url' => $row['url']
		    	);
			}
		}
		$stmt->close();
		return (json_encode($list));
	}
	function addItem(){
		$name = (isset($_REQUEST['name'])) ? $_REQUEST['name'] : "";
		$price = (isset($_REQUEST['price'])) ? $_REQUEST['price'] : 0;
		$quantity = (isset($_REQUEST['quantity'])) ? $_REQUEST['quantity'] : 0;
		$des = (isset($_REQUEST['des'])) ? $_REQUEST['des'] : "";
			$branchID = (isset($_REQUEST['branchID'])) ? $_REQUEST['branchID'] : 1;
			$view = (isset($_REQUEST['view'])) ? $_REQUEST['view'] : 0;
		$url = (isset($_REQUEST['url'])) ? $_REQUEST['url'] : "";
		$categoryID = (isset($_REQUEST['categoryID'])) ? $_REQUEST['categoryID'] : 0;;
		$classifyingName = (isset($_REQUEST['classifyingName'])) ? $_REQUEST['classifyingName'] : "";

		$sql = '
			insert into tblitem(name,price,quantity,des,branchID,view,url) 
			values(?,?,?,?,?,?,?);
		';
		$success = 'Thêm item thất bại';
		if($name!="" && $price!=0 && $des!="" && $branchID!=0 && $url!="" ){
			$stmt = $GLOBALS['con']->prepare($sql);
			$stmt->bind_param('sdisiis',$name,$price,$quantity,$des,$branchID,$view,$url);
			$stmt->execute();
			if($stmt->affected_rows>0) echo '(Thêm item thành công)';
			$insertedID = $GLOBALS['con']->insert_id;
			//Thêm vào classifying với id=insertedID : 
			addClassifying($insertedID,$categoryID,$classifyingName);
			$stmt->close();
		}
		die($success);
	};
	function addClassifying($insertedID,$categoryID,$classifyingName){
		$sql = '
			insert into tblclassifying(name,itemID,categoryID)
			values(?,?,?);
		';
		$stmt = $GLOBALS['con']->prepare($sql);
		$stmt->bind_param('sii',$classifyingName,$insertedID,$categoryID);
		$stmt->execute();
		if($stmt->affected_rows>0) echo '(Thêm classifying thành công)';
		else echo '(thêm classifying thất bại)';
	}

	function deleteItem(){
		echo "delete Item";
		$id = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : "";
		$sql = '
			delete from tblclassifying 
			where itemID=?;
		';
		$stmt = $GLOBALS['con']->prepare($sql);
		$stmt->bind_param('i',$id);
		$stmt->execute();
		
		$sql = '
			delete from tblitem 
			where id=?;
		';
		$stmt = $GLOBALS['con']->prepare($sql);
		$stmt->bind_param('i',$id);
		$stmt->execute();
		
		$success = "Xoá Item thất bại";
		if($stmt->affected_rows>0) $success="Xóa Item thành công";
		echo $success;
	}
	function updateItem(){
		$id = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : "";
		$name = (isset($_REQUEST['name'])) ? $_REQUEST['name'] : "";
		$price = (isset($_REQUEST['price'])) ? $_REQUEST['price'] : 0;
		$quantity = (isset($_REQUEST['quantity'])) ? $_REQUEST['quantity'] : 0;
		$des = (isset($_REQUEST['des'])) ? $_REQUEST['des'] : "";
		$branchID = (isset($_REQUEST['branchID'])) ? $_REQUEST['branchID'] : 1;
		$view = (isset($_REQUEST['view'])) ? $_REQUEST['view'] : 0;
		$url = (isset($_REQUEST['url'])) ? $_REQUEST['url'] : "";

		$sql = '
			update tblitem 
				set name=?,price=?,quantity=?,des=?,branchID=?,view=?,url=?
			where id=?;
		';
		$success = 'Cập nhật item thất bại';
		if($name!="" && $price!=0 && $des!="" && $branchID!=0 && $url!="" ){
			$stmt = $GLOBALS['con']->prepare($sql);
			$stmt->bind_param('sdisiisi',$name,$price,$quantity,$des,$branchID,$view,$url,$id);
			$stmt->execute();
			if($stmt->affected_rows>0) $success="Cập nhật item thành công";
			$stmt->close();
		}
		die($success);
	}
	function getItemTopSeller(){
		$sql = '
			select tblitem.id as id,tblitem.name as name,tblitem.price as price,tblitem.quantity as quantity,tblitem.des as des,tblitem.branchID as branchID,tblitem.view as view,tblitem.url as url 
				from tblitem 
        	INNER join tblbooking ON tblitem.id=tblbooking.itemID
			GROUP BY tblitem.id
        	order by sum(tblbooking.quantity) desc
            LIMIT 4
		';

		$stmt = $GLOBALS['con']->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();

		$list = array();
		if($result->num_rows>0){
			while ($row=$result->fetch_assoc()) {
			    $list[] = array(
			    	'id' => $row['id'],			    		    		
		    		'name' => $row['name'],
		    		'price' => $row['price'],
		    		'quantity' => $row['quantity'],
		    		'des' => $row['des'],
		    		'branchID' => $row['branchID'],
		    		'view' => $row['view'],
		    		'url' => $row['url']
		    	);
			}
		}
		$stmt->close();
		die(json_encode($list));
	}
	function getItemTopSellerPHP(){
		$sql = '
			select tblitem.id as id,tblitem.name as name,tblitem.price as price,tblitem.quantity as quantity,tblitem.des as des,tblitem.branchID as branchID,tblitem.view as view,tblitem.url as url 
				from tblitem 
        	INNER join tblbooking ON tblitem.id=tblbooking.itemID
			GROUP BY tblitem.id
        	order by sum(tblbooking.quantity) desc
            LIMIT 4
		';

		$stmt = $GLOBALS['con']->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();

		$list = array();
		if($result->num_rows>0){
			while ($row=$result->fetch_assoc()) {
			    $list[] = array(
			    	'id' => $row['id'],			    		    		
		    		'name' => $row['name'],
		    		'price' => $row['price'],
		    		'quantity' => $row['quantity'],
		    		'des' => $row['des'],
		    		'branchID' => $row['branchID'],
		    		'view' => $row['view'],
		    		'url' => $row['url']
		    	);
			}
		}
		$stmt->close();
		return (json_encode($list));
	}
	function getItemBestSeller(){
		$sql = '
			select tblitem.id as id,tblitem.name as name,tblitem.price as price,tblitem.quantity as quantity,tblitem.des as des,tblitem.branchID as branchID,tblitem.view as view,tblitem.url as url 
				from tblitem 
        	INNER join tblbooking ON tblitem.id=tblbooking.itemID
			GROUP BY tblitem.id
        	order by sum(tblbooking.quantity) desc
            LIMIT 1
		';

		$stmt = $GLOBALS['con']->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();

		$list = array();
		if($result->num_rows>0){
			while ($row=$result->fetch_assoc()) {
			    $list[] = array(
			    	'id' => $row['id'],			    		    		
		    		'name' => $row['name'],
		    		'price' => $row['price'],
		    		'quantity' => $row['quantity'],
		    		'des' => $row['des'],
		    		'branchID' => $row['branchID'],
		    		'view' => $row['view'],
		    		'url' => $row['url']
		    	);
			}
		}
		$stmt->close();
		die(json_encode($list));
	}
	function getItemBestSellerPHP(){
		$sql = '
			select tblitem.id as id,tblitem.name as name,tblitem.price as price,tblitem.quantity as quantity,tblitem.des as des,tblitem.branchID as branchID,tblitem.view as view,tblitem.url as url 
				from tblitem 
        	INNER join tblbooking ON tblitem.id=tblbooking.itemID
			GROUP BY tblitem.id
        	order by sum(tblbooking.quantity) desc
            LIMIT 1
		';

		$stmt = $GLOBALS['con']->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();

		$list = array();
		if($result->num_rows>0){
			while ($row=$result->fetch_assoc()) {
			    $list[] = array(
			    	'id' => $row['id'],			    		    		
		    		'name' => $row['name'],
		    		'price' => $row['price'],
		    		'quantity' => $row['quantity'],
		    		'des' => $row['des'],
		    		'branchID' => $row['branchID'],
		    		'view' => $row['view'],
		    		'url' => $row['url']
		    	);
			}
		}
		$stmt->close();
		return (json_encode($list));
	}
	function getItemTopView(){
		$sql = '
			select * 
			from tblitem
			order by view desc
			limit 4;
		';
		$stmt = $GLOBALS['con']->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();

		$list = array();
		if($result->num_rows>0){
			while ($row=$result->fetch_assoc()) {
			    $list[] = array(
			    	'id' => $row['id'],			    		    		
		    		'name' => $row['name'],
		    		'price' => $row['price'],
		    		'quantity' => $row['quantity'],
		    		'des' => $row['des'],
		    		'branchID' => $row['branchID'],
		    		'view' => $row['view'],
		    		'url' => $row['url']
		    	);
			}
		}
		$stmt->close();
		die(json_encode($list));
	}
	function getItemTopViewPHP(){
		$sql = '
			select * 
			from tblitem
			order by view desc
			limit 4;
		';
		$stmt = $GLOBALS['con']->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();

		$list = array();
		if($result->num_rows>0){
			while ($row=$result->fetch_assoc()) {
			    $list[] = array(
			    	'id' => $row['id'],			    		    		
		    		'name' => $row['name'],
		    		'price' => $row['price'],
		    		'quantity' => $row['quantity'],
		    		'des' => $row['des'],
		    		'branchID' => $row['branchID'],
		    		'view' => $row['view'],
		    		'url' => $row['url']
		    	);
			}
		}
		$stmt->close();
		return (json_encode($list));
	}
	function getItemBestView(){
		$sql = '
			select * 
			from tblitem
			order by view desc
			limit 1;
		';
		$stmt = $GLOBALS['con']->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();

		$list = array();
		if($result->num_rows>0){
			while ($row=$result->fetch_assoc()) {
			    $list[] = array(
			    	'id' => $row['id'],			    		    		
		    		'name' => $row['name'],
		    		'price' => $row['price'],
		    		'quantity' => $row['quantity'],
		    		'des' => $row['des'],
		    		'branchID' => $row['branchID'],
		    		'view' => $row['view'],
		    		'url' => $row['url']
		    	);
			}
		}
		$stmt->close();
		die(json_encode($list));
	}
 ?>