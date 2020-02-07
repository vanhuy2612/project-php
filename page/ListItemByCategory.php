<?php 
	include_once '../Controller/dbCon.php';
	include_once '../Controller/itemImpl.php';
	$id = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : 0;
	$name = (isset($_REQUEST['name'])) ? $_REQUEST['name'] : "";
	$sttPage=(isset($_REQUEST['sttPage'])) ? $_REQUEST['sttPage'] : 1;

	$list=getItemByCategoryIDPHP($id);
	$li = json_decode($list,true);
	$len=sizeof($li); $sodu=$len%2;
    $soPage=$len/2; if($sodu>0) $soPage++; 
    // Hiển thị 4 sản phẩm trên 1 page:  
    $sttStart = ($sttPage-1)*2+1;
    $sttEnd = $sttPage*2;


	echo 'Category>>'.$name.'<br>';
	echo '<div class="row">';

	$i=1;
	foreach($li as $val) {
		if($i>=$sttStart&&$i<=$sttEnd) echo '
			<div class="col col-md-6 " style="width: 250px;border-radius:250px;">
                <div class="card" style="width: 250px;border-radius:250px;">
                    <img class="item" itemID="'.$val['id'].'" style="width: 250px;border-radius:250px;height=250px" src="'.$val['url'].'" class="card-img-top" alt="..."style="height: 300px">
                    <div class="card-body">
                        <h5 class="card-title">'.$val['name'].'</h5>
                        <p class="card-text">Click để xem chi tiết hơn</p>
                    </div>
                </div>
            </div>
		';	
		$i++;
	}
	echo '</div>';
 ?>
 <!-- danh sách trang -->
    <nav aria-label="Page navigation example">
      <ul class="pagination pagination-lg justify-content-center">
        <?php 
            for ($i=1;$i<=$soPage;$i++) {
                echo '<li class="page-item pageCategory page-link" categoryName="'.$name.'" categoryID='.$id.' stt='.$i.'>'.$i.'</li>';
            }
         ?>
      </ul>
    </nav>
 <script>
 	$(document).ready(function(){
 		$('.pageCategory').click(function(){
 			var ID = $(this).attr('categoryID');; 
 			var stt=$(this).attr('stt');
 			var NAME=$(this).attr('categoryName');
 			$.ajax({
 				url:'./page/ListItemByCategory.php',
 				dataType: 'text',
 				data:{sttPage:stt,id:ID,name:NAME},
 				type:'post',
 				success : function(data){
					$("#content").html(data);
				}
 			});
 		});
 		$('.item').click(function(){
			var itemID = $(this).attr('itemID');
			$.ajax({
				url : './page/DetailItem.php',
				dataType : 'text',
				type : 'post',
				data : {id:itemID},
				success : function(data){
					$("#content").html(data);
				}
			});
            $.ajax({
                data : {REQUEST:'autoIncrementViewItem',id:itemID},
                url : './Controller/itemController.php',
                dataType : 'text',
                type : 'post',
                success : function(data){
                    console.log(data+":"+itemID);
                }
            });
		});
 	});
 </script>