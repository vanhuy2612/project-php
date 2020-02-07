<?php 
    include_once './Controller/categoryImpl.php';
    include_once './Controller/dbCon.php';
    include_once './Controller/classifyingImpl.php';
?>
<div class="col col-md-3" id="menu">
    <span class="fa fa-list" id="icon-menu"></span>
    <span style="font-size: 20px;">sản phẩm</span> <br /> <br />
                        <!-- Bắt đầu dropdown sản phầm -->
    <?php 
        $LIST = getAllCategoryPHP();// lấy danh sách các danh mục
        $LI = json_decode($LIST,true);
        foreach ($LI as $VAL) {
            $list = getAllNameClassifyingByCategoryIDPHP($VAL['id']);// tìm danh mục con trong danh mục cha
            $li = json_decode($list,true);
            echo '
                <div class="dropdown" style="float: inline-end;font-size:20px;">
                <p class="category" categoryID='.$VAL['id'].' categoryName="'.$VAL['name'].'">'.$VAL['name'].'</p>
                <div class="dropdown-content-product">
            ';
            foreach ($li as $val) {
                echo '<p class="classifying" name="'.$val['name'].'">'.$val['name'].'</p>';
            }
            echo '</div></div><p></p>';                                                    
        }
     ?>
</div>
