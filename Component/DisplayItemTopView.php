<?php 
    include_once './Controller/dbCon.php';
    include_once './Controller/itemImpl.php';
    $list = getItemTopViewPHP();
    $li = json_decode($list,true);
 ?>
<div class="col col-md-4 col-col-sm-12 col-col-xs-12" style="background-color: #C3BFBF;border-radius: 10px">
    <marquee behavior="" direction="">
        <div style="font-size: 40px;font-family: 'Times New Roman' 'Times' serif;">Sản phẩm xem nhiều nhất</div>
    </marquee>
    <hr>
    <?php 
        foreach ($li as $val) {
            echo '
                <div class="card"  style="width: 250px;border-radius: 250px;margin: 10px auto;">
                  <img class="item" src="'.$val['url'].'" itemID='.$val['id'].' class="card-img-top" alt="..." width="250px" height="300px" style="border-radius: 250px">
                  <div class="card-body">
                    <h5 class="card-title">'.$val['name'].'</h5>
                  </div>
                </div><hr>
            ';
        }
     ?>
   
</div>