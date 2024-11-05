
<?php
include('connect.php');


session_start();
if(isset($_POST['login'])){
    $tenDangNhap= $_POST['tenDangNhap'];
    $MatKhau= $_POST['MatKhau'];
    
    $ketQua = $conn->query("SELECT * FROM NguoiDung where TaiKhoan='$tenDangNhap'and MatKhau='$MatKhau' ");

    if($ketQua && $ketQua->num_rows == 1) {
        $user = $ketQua->fetch_assoc();
        $_SESSION['id'] = $user['id'];
        $_SESSION['tenDangNhap'] = $user['TaiKhoan'];
        header('Location: index.php');
    }
    else {
        $login_error = "Đăng nhập thất bại";
    }
}



?>










<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="fontawesome-free-6.6.0-web/css/all.min.css">

    <style>
        body {
            background: url('Truc-thang-ngam-canh-Da-Nang-1536x866.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            /* font-size: 20px; */
        }

        #wrapper {

            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 70px;
        }

        #form-login {
            max-width: 400px;
            background-color: rgba(0, 153, 255, 0.23);
            flex-grow: 1;
            padding: 30px 30px 40px;
            box-shadow: 0px 0px 17px 2px rgba(251, 253, 255, 0.23);
        }

        .form-heading {
            font-size: 25px;
            color: white;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            border-bottom: 1px solid #fff;
            margin-top: 15px;
            margin-bottom: 30px;
           display: flex;
        }

        .form-input {
            background: transparent;
            border: 0;
            outline: 0;
            color: #f5f5f5;
            flex-grow: 1;
            font-size: 16px;
        }

        .form-input::placeholder {
            color: #f5f5f5;

        }

        .form-submit {
            background: transparent;
            border: 1px solid #f5f5f5;
            width: 100%;
            text-transform: uppercase;
            padding: 10px 10px;
            color: white;
            /* transition: 0.25s ease-in-out; */
            margin-top: 20px;
            font-size: 16px;
        }

        .form-submit:hover {
            border: 1px solid rgb(145, 255, 92);
        }
    </style>
</head>

<body>
    <h1 style="text-align: center; color: rgb(145, 255, 92);">Chào mừng bạn đến với Du Lịch 3 Miền</h1>
    <div id="wrapper">

        <form action="login.php" id="form-login" method="post">
            <h1 class="form-heading">Đăng Nhập</h1>
            <div class="form-group">

                <i class="fa-regular fa-user"></i>
                <input type="text" class="form-input" name="tenDangNhap" placeholder="Tên đăng nhập" required>
            </div>

            <div class="form-group">
                <i class="fa-solid fa-key"></i>
                <input type="password" class="form-input" name="MatKhau" placeholder="Mật khẩu" required>
                <div id="eye">
                    <i  class="fa-regular fa-eye" ></i>

                </div>
                
                
                
            </div>
            
            <input type="submit" value="Đăng nhập" name="login" class="form-submit">
            



        </form>



    </div>


    

</body>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script>
    $(document).ready(function(){
    $('#eye').click(function(){
        $(this).toggleClass('open');
        
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        
        if($(this).hasClass('open')){
           
            $(this).prev().attr('type','text');
        }
        else{
            $(this).prev().attr('type','password');

        }
    });
    
    

});
</script>

<script>
    alert("<?= $login_error ?>");
</script>



</html>