<?php 
	include_once '../Controller/dbCon.php';
	include_once '../Controller/itemImpl.php';
	include_once '../Controller/bookingImpl.php';
	$userID = (isset($_SESSION['id'])) ? $_SESSION['id'] :0;
	$id = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : 0;
	$list = getItemByIDPHP();
	$li = json_decode($list,true);
	foreach ($li as $val) {
		echo '
			<div style="margin : 50px auto;">
				<div class="row">
					<div class="col-6">
						<img width="100%" src="'.$val['url'].'" alt="">
					</div>
					<div class="col-6">
						<div style="font-size: 40px;font-family: "Times New Roman" "Times" serif;">'.$val['name'].'</div>
						<div>'.$val['des'].'</div>
						
							Giá : <input class="price" value='.$val['price'].'  type="text" /><br>
							Số lượng : <input class="quantity" value=""  type="text" />
							<button class="btn btn-success buy" userID='.$userID.'  itemID='.$val['id'].'>Mua</button>
						
					</div>
				</div>
			</div>
		';	
	}
 ?>
 <!-- Xử lý khi click click mua hàng -->
<script>
	$('.buy').click(function(){
		var ITEMID = $(this).attr('itemID');
		var USERID = $(this).attr('userID');
		var QUANTITY = $('.quantity').val();
		var PRICE = $('.price').val();
		if(USERID!=0){
			$.ajax({
				type:'post',
				url : '../Controller/bookingImpl.php',
				dataType : 'text',
				data : {
					REQUEST:'addBooking',
					itemID : ITEMID,
					userID : USERID,
					quantity : QUANTITY,
					price : PRICE
				}
				success : function(data){
					console.log(data);
				}
			});
		}
	});
</script>