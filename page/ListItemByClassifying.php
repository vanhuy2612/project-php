<?php 
	include_once '../Controller/dbCon.php';
	include_once '../Controller/itemImpl.php';
	$sttPage=(isset($_REQUEST['sttPage'])) ? $_REQUEST['sttPage'] : 1;
	$name = (isset($_REQUEST['name'])) ? $_REQUEST['name'] : "";
	// Chuyển JSON thành array:
    $list=getItemByClassifyingNamePHP($name);
	$li = json_decode($list,true);
    // Hiển thị 4 sản phẩm trên 1 page:
    $len=sizeof($li); $sodu=$len%2;
    $soPage=$len/2; if($sodu>0) $soPage++; 
   
    $sttStart = ($sttPage-1)*2+1;
    $sttEnd = $sttPage*2; 
?>

<?php 
	echo 'Classifying>>'.$name.'<br>';
	echo '<div class="row">';
    $i=1;
	foreach($li as $val) {
		if($i>=$sttStart&&$i<=$sttEnd) echo '
			<div class="col-6 ">
                <div class="card"  style="width: 250px;border-radius: 250px;margin: 10px auto;">
                  <img class="item" src="'.$val['url'].'" itemID='.$val['id'].' class="card-img-top" alt="..." width="250px" height="300px" style="border-radius: 250px">
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
                echo '<li class="page-item pageClassifying page-link" nameClassifying="'.$name.'" stt='.$i.'>'.$i.'</li>';
            }
         ?>
      </ul>
    </nav>

 <!-- hàm document ready chạy sau khi đã load xong page, nhưng trang ListItem nhúng vào sau nên cần phải lặp lại phần jquery để nó chạy-->
 <script>
 	$(document).ready(function(){
 		$('.pageClassifying').click(function(){
            var stt = $(this).attr('stt');
            var NAME = $(this).attr('nameClassifying');
            $.ajax({
                url : './page/ListItemByClassifying.php',
                dataType : 'text',
                type : 'post',
                data : {sttPage:stt,name:NAME},
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