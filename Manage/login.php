<?php 
    session_start();
    // Kiểm tra tài khoản mật khẩu có đúng hay ko?
    
    // ghi lại session của tên người dùng
    // ghi link vào action của form : tạo hàm getLink();
    function getLink(){
        if(isset($_SESSION['username'])) echo 'admin.php';
        else echo '';
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shophuyka</title>
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
    
</head>
<style>
#input-txt{
    width: 100%;
    height: 40px;
    border-radius: 10px;
    border: solid 1px black;
}
#submit{
    text-align: center;
    border: solid 1px black;
    border-radius: 10px;
    margin-bottom: 30px; 
    font-size: 30px;
}
form{
    border: solid 1px black;
    border-radius: 20px;
    text-align: center;
    padding: 30px
}
</style>
<body>
    <p></p><p></p>
    <div class="container">
        <div class="row">
            <div class="col col-md-4">
            </div>
            <div class="col col-md-4">
                <form method="post" action="../index.php">
                    <p style="color: blue; font-size: 30px">ĐĂNG NHẬP</p>
                    Tài khoản:<br>
                        <input type="text" name="username" id="input-txt">
                    <br>
                    Mật khẩu:<br>
                        <input type="password" name="password" id="input-txt">
                    <br><br>
                        <input type="submit" value="login" id="submit">
                </form> 
            </div>
        </div>
    </div>
    <p></p><p></p>
</body>
</html>