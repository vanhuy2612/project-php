<?php 
    include_once '../Controller/dbCon.php';
    include_once '../Controller/itemImpl.php';
    include_once '../Controller/categoryImpl.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang quản lý</title>
    <script type="text/javascript" src="../public/jquery.js"></script>
    <link rel="stylesheet" href="../public/layout.css">
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
    <script>
        $(document).ready(function(){
            $('.addItem').hide();
            $('.updateItem').hide();
            $('.logout').click(function(){
                $.ajax({
                    url : '../Controller/userController.php',
                    type : 'post',
                    dataType : 'text',
                    data : {REQUEST:'logout'},
                    success : function(data){
                        console.log(data);
                    }
                });
            });
            $('.add').click(function(){
                $('.addItem').show();
                $('.updateItem').hide();
            });
            $('.update').click(function(){
                $('.updateItem').show();
                $('.addItem').hide();
                var itemID = $(this).attr('itemID');

                $.ajax({
                    url : '../Controller/itemController.php',
                    type : 'post',
                    dataType : 'json',
                    data : {
                        REQUEST : 'getItemByID',
                        id : itemID
                    },
                    success : function(data){
                        $.each(data,function(key,item){
                            var id = item['id'];
                            var name = item['name'];
                            var price = item['price'];
                            var quantity = item['quantity'];
                            var des = item['des'];
                            var image = item['url'];


                            $(".id").val(id);
                            $(".name").val(name);
                            $(".price").val(price);
                            $(".quantity").val(quantity);
                            $(".des").val(des);
                            $(".image").val(image);
                        });
                    }
                });
            });
            $('.delete').click(function(){
                var itemID = $(this).attr('itemID');
                console.log(itemID);
                $.ajax({
                    url: '../Controller/itemController.php',
                    type : 'post',
                    dataType : 'text',
                    data : {REQUEST:'deleteItem',id:itemID },
                    success : function(data){
                        console.log(data);
                    }
                });
            });
        });
    </script>
    <style>
        table {
          border-collapse: collapse;
          width: 100%;
          color: black;
          border: solid 1px black 
        }
        tr th {
            border: solid 1px black;
            padding: 20px
        }
        #input{
            border: solid 1px black;
            border-radius: 10px;
            width: '500px';
            height: '40px'
        }        
    </style>

</head>

<body>
    <div id="information">
        <div class="row">
            <div class="col col-md-4">
                SDT: 0362 091 356
            </div>
            <div class="col col-md-4">
                Email: vanhuy2612@gmail.com
            </div>
            <div class="col col-md-4">
                FB: http://facebook.com/Huyka.s268
            </div>
        </div>
        <!-- NAVBAR  -->
        <div id="navbar">
            <div class="row">
                <div class="col col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <img src="../image/logo.png" id="img-logo" />
                        <form class="form-inline my-2 my-md-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                                value="">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                        <div id="login" class="col col-md-8 dropdown" style="float: right;">
                            <a href="#" class="fas fa-user" id="icon-login"></a>
                            <span>
                                <?php 
                                    if(isset($_SESSION['username'])) echo $_SESSION['username'];
                                 ?>
                            </span>
                            <div class="dropdown-content" style="right:0;">
                                <form method="post" action="/shophuyka/index.php">
                                    <button class="logout" name="username" value="logout" type="submit" class="logout btn btn-primary button">Logout</button>
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END -->
        <!-- BODY -->
        <div class="container">
            <div class="row">                
                <?php include_once '../Component/SliderBestSeller.php'; ?>            
            </div>
        </div>
        <div class="col col-md-12">
            <h2 style="color: red">DANH SÁCH SẢN PHẨM</h2>
        </div> <br /><br />
        <div class="col col-md-12" style="text-laign: right">
            <button type="button" class="add" class="btn btn-primary" style="border: solid 1px ; border-radius: 10px">thêm sản phẩm</button>
        </div><br /> <br />
      
        <!-- khu thêm sản phẩm ----------------------------------------------------------------->
        <div class="addItem row">
            <?php include_once 'additem.php'; ?>
        </div>
        <!-- khu cập nhật sản phẩm----------------------------------------------------------- -->
        <div class="updateItem row">
            <?php include_once 'updateitem.php'; ?>
        </div>
<!-- Show list item-------------------------------------------------------------------- -->
        <div class="container">
            <table>
                <tr>
                    <th>STT</th>
                    <th>id</th>
                    <th>tên sản phẩm</th>
                    <th>view</th>
                    <th>UPDATE</th>
                    <th>DELETE</th>
                </tr>
                <?php 
                    $LIST = getAllItemPHP();
                    $list = json_decode($LIST,true);
                    $i=1;
                    foreach ($list as $val) {
                        echo '
                            <tr>
                                <th>'.$i.'</th>
                                <th>'.$val['id'].'</th>
                                <th>'.$val['name'].'</th>
                                <th>'.$val['view'].'</th>
                                <th><button class="update" itemID='.$val['id'].'>UPDATE</button></th>
                                <th><button class="delete" itemID='.$val['id'].'>DELETE</button></th>
                            </tr>
                        ';
                        $i++;
                    }
                 ?>
            </table>
        </div>
    <!-- END -->
    <!-- Footer-->
    <?php include_once '../Component/Footer.php'; ?>
</body>

</html>
<script>
    
  
</script>