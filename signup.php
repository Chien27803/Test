<?php
include 'connect.php';
session_start();

function checkTaiKhoanTonTai($conn, $taiKhoan) {
    $result = $conn->query("SELECT TaiKhoan FROM nguoidung WHERE TaiKhoan = '$taiKhoan'");
    return $result->num_rows > 0;
}
function validatePassword($matKhau, $xacnhanmatkhau) {
    if ($matKhau != $xacnhanmatkhau) {
        return "Mật khẩu và xác nhận mật khẩu không khớp.";
    } 
    if (strlen($matKhau) < 6) {
        return "Độ dài mật khẩu phải ít nhất 6 ký tự.";
    }
    $chuHoa = preg_match('@[A-Z]@', $matKhau);
    $chuThuong = preg_match('@[a-z]@', $matKhau);
    $So = preg_match('@[0-9]@', $matKhau);
    if (!$chuHoa || !$chuThuong || !$So) {
        return "Yêu cầu mật khẩu của bạn phải có cả chữ in hoa, chữ thường và số!";
    }
    return ''; // Không có lỗi
}
function validatePhoneNumber($sdt) {
    if (!preg_match('@[0-9]@', $sdt) || strlen($sdt) != 10) {
        return "Định dạng số điện thoại của bạn chưa đúng.";
    }
    return ''; // Không có lỗi
}
function registerUser($conn, $taiKhoan, $matKhau, $hovaten, $sdt, $email, $diachi, $role) {
    $stmt = $conn->prepare("INSERT INTO nguoidung (TaiKhoan, MatKhau, HoVaTen, SDT, Email, DiaChi, Role) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $taiKhoan, $matKhau, $hovaten, $sdt, $email, $diachi, $role);
    return $stmt->execute();
}




if (isset($_POST['dangKy'])) {
    $taiKhoan       = trim($_POST['ten']);
    $matKhau        = trim($_POST['mk']);
    $xacnhanmatkhau = trim($_POST['xacnhanmk']);
    $hovaten        = trim($_POST['hovaten']);
    $sdt            = trim($_POST['sdt']);
    $email          = trim($_POST['email']);
    $diachi         = trim($_POST['diachi']);
    $role           = 'user';
    $thongbao       = ''; // Khởi tạo biến thông báo lỗi

    // Kiểm tra tài khoản đã tồn tại
    if (checkTaiKhoanTonTai($conn, $taiKhoan)) {
        $thongbao = "Tên tài khoản đã tồn tại. Vui lòng nhập tên tài khoản khác.";
    }
    else {
        // Kiểm tra mật khẩu và xác nhận mật khẩu
        $thongbao = validatePassword($matKhau, $xacnhanmatkhau);
        
        if (empty($thongbao)) {
            // Kiểm tra số điện thoại
            $thongbao = validatePhoneNumber($sdt);
        }
        
        if (empty($thongbao)) {
            // Nếu không có lỗi, đăng ký người dùng
            if (registerUser($conn, $taiKhoan, $matKhau, $hovaten, $sdt, $email, $diachi, $role)) {
                header('Location: login.php');
                exit(); // Đảm bảo kết thúc script sau khi chuyển hướng
            } else {
                $thongbao = "Đăng ký thất bại.";
            }
        }
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

        <form action="signup.php" id="form-login" method="POST">
            <h1 class="form-heading">Đăng Ký</h1>
            <div class="form-group">

                <i class="fa-regular fa-user"></i>
                <input type="text" class="form-input" name="ten" placeholder="Nhập tên đăng nhập" required >
            </div>

            <div class="form-group">
                <i class="fa-solid fa-key"></i>
                <input type="password" class="form-input" name="mk" placeholder="Nhập mật khẩu" required >
                <div id="eye">
                    <i class="fa-regular fa-eye"></i>

                </div>



            </div>


            <div class="form-group">
                <i class="fa-solid fa-key"></i>
                <input type="password" class="form-input" name="xacnhanmk" placeholder="Xác nhận mật khẩu" required>
                <div id="eye2">
                    <i class="fa-regular fa-eye"></i>

                </div>



            </div>


            <div class="form-group">

                <input type="text" class="form-input" name="hovaten" placeholder="Nhập họ và tên " required>




            </div>

            <div class="form-group">

                <input type="text" class="form-input" name="sdt" placeholder="Nhập SĐT " required>




            </div>

            <div class="form-group">

                <input type="text" class="form-input" name="email" placeholder="Nhập Email " required>




            </div>

            <div class="form-group">

                <input type="text" class="form-input" name="diachi" placeholder="Nhập địa chỉ " required>




            </div>

            <input type="submit" value="Đăng ký" name="dangKy" class="form-submit">



        </form>



    </div>




</body>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script>
    $(document).ready(function () {
        $('#eye').click(function () {
            $(this).toggleClass('open');

            $(this).children('i').toggleClass('fa-eye-slash fa-eye');

            if ($(this).hasClass('open')) {

                $(this).prev().attr('type', 'text');
            }
            else {
                $(this).prev().attr('type', 'password');

            }
        });



    });
</script>
<script>
    $(document).ready(function () {
        $('#eye2').click(function () {
            $(this).toggleClass('open2');

            $(this).children('i').toggleClass('fa-eye-slash fa-eye');

            if ($(this).hasClass('open2')) {

                $(this).prev().attr('type', 'text');
            }
            else {
                $(this).prev().attr('type', 'password');

            }
        });



    });

</script>
<script>
    alert("<?= $thongbao ?>");
</script>


</html>