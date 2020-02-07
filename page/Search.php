<?php 
    include_once '../Controller/dbCon.php';
    include_once '../Controller/searchImpl.php';
    $sttPage=(isset($_REQUEST['sttPage'])) ? $_REQUEST['sttPage'] : 1;
    $text=(isset($_REQUEST['text'])) ? $_REQUEST['text'] : "";
    
    $list=search($text);
    $li=json_decode($list,true);
    $len=sizeof($li); $sodu=$len%2;
    $soPage=$len/2; if($sodu>0) $soPage++; 
    // Hiển thị 4 sản phẩm trên 1 page:
    
    $sttStart = ($sttPage-1)*2+1;
    $sttEnd = $sttPage*2; 
 ?>
<div class="col col-col-sm-12 col-col-xs-12">
    <!-- Show sản phẩm -->
    <div class="col col-md-12 "
        style="margin-top: 20px; margin-bottom: 20px; font-family: 'Times New Roman', Times, serif">
        <div class="row">
            <!-- Card mỗi sản phẩm -->
            <?php 
                $count=1;
                foreach ($li as $val) {
                    if($count<=$sttEnd&&$count>=$sttStart) echo '
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
                    $count++; 
                }
             ?>
            <!-- Finish-->
        </div>
    </div>
    <!-- danh sách trang -->
    <nav aria-label="Page navigation example">
      <ul class="pagination pagination-lg justify-content-center">
        <?php 
            for ($i=1;$i<=$soPage;$i++) {
                echo '<li class="page-item pageSearch page-link" searchText="'.$text.'" stt='.$i.'>'.$i.'</li>';
            }
         ?>
      </ul>
    </nav>
</div>  
<!-- hàm document ready chạy sau khi đã load xong page, nhưng trang ListItem nhúng vào sau nên cần phải lặp lại phần jquery để nó chạy-->
 <script>
    $(document).ready(function(){
        $('.pageSearch').click(function(){
            var stt = $(this).attr('stt');
            var TEXT = $(this).attr('searchText');
            $.ajax({
                url : './page/Search.php',
                dataType : 'text',
                type : 'post',
                data : {
                    sttPage:stt,
                    text : TEXT
                },
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