<?php 
    
    include_once './Controller/itemImpl.php';

    $LIST = getItemTopSellerPHP();
    $list = json_decode($LIST,true);
 ?>
<div class="col col-md-9" id="product">
    <div class="row">
        <div class="col col-md-5">
            
        </div>
        <div class="col col-md-7">
            <div class="row">
                <marquee behavior="" direction=""><div style="font-size: 30px;font-family: sans-serif;">Sản phẩm bán chạy</div></marquee>
                <div class="col col-md-12" 
                        style="margin-top: 30px; margin-bottom: 30px;margin-left: 10px;margin-right: 10px;">
                    <div class="bd-example">
                        <div id="carouselExampleCaptions" class="carousel slide"
                            data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php 
                                    $count = 0;
                                    foreach ($list as $val) {
                                        if($count==0) echo '<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>';
                                        else echo '<li data-target="#carouselExampleCaptions" data-slide-to="'.$count.'"></li>';
                                        $count++;
                                    }
                                 ?>
                                <!-- <li data-target="#carouselExampleCaptions" data-slide-to="0"
                                    class="active"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li> -->
                            </ol>
                            <div class="carousel-inner">
                                <!-- Mỗi sản phẩm của slide-->
                                <?php 
                                    $count=0;
                                    foreach ($list as $val) {
                                        if($count==0) echo '<div class="carousel-item active">
                                                                <img class="item" itemID='.$val['id'].' src="'.$val['url'].'"
                                                                        style="height: 400px; width: 100%" class="d-block w-100"
                                                                        alt="...">
                                                                <div class="carousel-caption d-none d-md-block">
                                                                    <h5>'.$val['name'].'</h5>
                                                                   
                                                                </div>
                                                            </div>';
                                        else echo '<div class="carousel-item">
                                                    <img class="item" itemID='.$val['id'].' src="'.$val['url'].'"
                                                            style="height: 400px; width:100%" class="d-block w-100"
                                                            alt="...">
                                                    <div class="carousel-caption d-none d-md-block">
                                                       <h5>'.$val['name'].'</h5>  
                                                    </div>
                                                </div>';
                                        $count++;
                                    }
                                 ?>
                                
                                <!-- Finish-->
                                
                                
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleCaptions"
                                role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleCaptions"
                                role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
               

 