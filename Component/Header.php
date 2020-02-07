<div id="information">
        <div class="row" style="background-color: #423C3C;color:white">
            <div class="col col-md-4">
                SDT: 032 660 9183 hoặc 0362 091 356
            </div>
            <div class="col col-md-4">
                Email: vanhuy2612@gmail.com
            </div>
            <div class="col col-md-4">
                FB: http://facebook.com/HuyKa.s268
            </div>
        </div>
        <!-- NAVBAR  -->
        <div id="navbar">
            <div class="row">
                <div class="col col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <img src="./image/logo.png" id="img-logo" />
                        <div class="form-inline my-2 my-md-0">
                            <input class="form-control mr-sm-2 searchText" type="search" placeholder="Search" aria-label="Search"
                                value="">
                            <button class="search btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </div>
 <!-- nếu Admin đăng nhập thì sẽ hiển thị mục đi vào giao diện quản lý -->
                        <?php if($position=="admin") echo '<a href="./Manage/admin.php">Đi tới trang quản lý</a>';; ?>
                        <div id="login" class="col col-md-8 dropdown" style="float: right;">
                            <a href="#" class="fas fa-user" id="icon-login"></a>
                            <span>
                                <?php 
                                    $ele1="Tài khoản";
                                    if($username!="")
                                        echo $username;
                                    else echo $ele1;
                                 ?>
                            </span>
                            <?php 
                                $ele1 = '<div class="dropdown-content" style="right:0;">
                                            <a href="./Manage/login.php">
                                                <button type="button" class="btn btn-primary button">
                                                    Đăng nhập
                                                </button>    
                                            </a>
                                            <p></p> 
                                            <a href="./Manage/register.php">
                                                <button type="button" class="btn btn-primary button">
                                                    Tạo tài khoản
                                                </button>
                                            </a>                               
                                        </div>';
                                $ele2 = '<div class="dropdown-content" style="right:0;">
                                                <form method="post" action="/shophuyka/index.php">
                                                    <a href="./Manage/login.php">
                                                        <button class="logout" type="submit" name="username" value="logout" class="btn btn-primary button">
                                                            Logout
                                                        </button>    
                                                    </a> 
                                                </form>                              
                                            </div>';
                                if($username!="")
                                    echo $ele2;                                       
                                else echo $ele1;                            
                             ?>
                            
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END -->
<script>
    $(document).ready(function(){
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
        $('.search').click(function(){
            var TEXT = $('.searchText').val();
            $.ajax({
                url : './page/Search.php',
                type : 'post',
                dataType : 'text',
                data : {text:TEXT},
                success : function(data){
                    $('#content').html(data);
                }
            });
        });
    });
</script>