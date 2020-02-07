<?php 
	function search($name){
		$tg = "%".$name."%";
		$name=$tg;
		$sql = '
			select *
			from tblitem
			where name like ?
			order by view desc;
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
 ?>