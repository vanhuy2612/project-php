<?php 
    include_once './Controller/dbCon.php';
    include_once './Controller/userImpl.php';
    session_start();
    $username=isset($_REQUEST['username']) ? $_REQUEST['username'] : "";
    $password=isset($_REQUEST['password']) ? $_REQUEST['password'] : "";
    $position = "";
    // Nếu người dùng logout thì xóa sesion
    if($username=="logout") {
        session_destroy();
        $username="";
        $password="";
    }
    if($username!=""&&$password!=""){       
       $User=getUser($username,$password);
        $user=json_decode($User,true);
        if($user!=NULL){
            foreach ($user as $val) {
                $_SESSION['id']=$val['id'];
                $_SESSION['username']=$val['username'];
                $_SESSION['position']=$val['position'];
                $position = $val['position'];

            }
        }         
    }
    
 ?>
 <?php 
    if($position=="admin"){
        echo '<div style="color: white;">Admin</div>';
    }else if($position=="user") echo '<div style="color: white;">User</div>';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shophuyka</title>
	<script type="text/javascript" src="./public/jquery.js"></script>
    <!-- bootstrap  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- jquery -->

    <!-- ajax -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <!-- script icon css -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="./public/layout.css">
    <script>
        $(document).ready(function(){
            $.ajax({
                url : './page/Home.php',
                dataType : 'text',
                type : 'post',
                success : function(data){
                    $("#content").html(data);
                }
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
            $('.category').click(function(){
                var categoryID=$(this).attr('categoryID');
                var categoryName=$(this).attr('categoryName');
                $.ajax({
                    url : './page/ListItemByCategory.php',
                    type : 'post',
                    dataType : 'text',
                    data : {id:categoryID,name:categoryName},
                    success : function(data){
                        $('#content').html(data);
                    }
                });
            });
            $('.classifying').click(function(){
                var Name=$(this).attr('name');
                $.ajax({
                    url : './page/ListItemByClassifying.php',
                    type : 'post',
                    dataType : 'text',
                    data : {name:Name},
                    success : function(data){
                        $('#content').html(data);
                    }
                });
            });
            $('.logout').click(function(){
                $.ajax({
                    url : './Controller/userController.php',
                    type : 'post',
                    dataType : 'text',
                    data : {REQUEST:'logout'},
                    success : function(data){
                        console.log(data);
                    }
                });
            });
            
        });
    </script>
</head>
<style>
	.classifying:hover{		
		text-decoration: underline;
	}
	.category:hover{		
		text-decoration: underline;
	}
    body{ 
        background-color: black;
    }
</style>

<body>
    	<?php include_once './Component/Header.php'; ?>
        <!-- TITLE -->
        <div>
            <div class="container" id="title">
                <div class="row">
                    <?php include_once './Component/Category.php'; ?>
                    <?php include_once './Component/SliderBestSeller.php'; ?>
                </div>
            </div>
        </div>
        <!-- END -->
        <div class="container">
        	<div style="margin-top: 20px; margin-bottom: 20px; color: white;font-family: serif;font-size: 20px;">
            	<h2>Sản phẩm</h2>
			</div>
        </div>
        <!-- Display Item -->
        <div class="container">
        	<div class="row" id="product">
        		<div class="col col-8">
        			<div id="content"></div>
        		</div>       		
        		<?php include_once './Component/DisplayItemTopView.php'; ?>
        	</div>
        </div>
        <!-- END -->
        <!-- Footer-->
        <?php include_once './Component/Footer.php'; ?>
</body>

</html>

<!-- 
Hàm die() : dùng để in ra thông báo == echo
Nếu bắn AJAX thì dùng hàm abcd();
Nếu ko bắn AJAX thì dùng hàm abcd+PHP();

trong phpXử lý kết quả trả về JSON thành array nhờ hàm json_decode($json_string,true);
        $LIST = getAllCategory();
        $list = json_decode($LIST,true);
        foreach ($list as $value) {
            echo '<div>'.$value['name'].'</div>';
        }
  
 -->