<?php


include('connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taiKhoan = $_POST['ten'];
    // $matKhau = password_hash($_POST['mk'], PASSWORD_DEFAULT);
    $matKhau=$_POST['mk'];
     $xacnhanmatkhau = $_POST['xacnhanmk']; 
    
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];
    $role = 'user';
    if ($matKhau != $xacnhanmatkhau) {
        echo "Mật khẩu và xác nhận mật khẩu không khớp.";
        exit();
    }

    $sql = "INSERT INTO NguoiDung (TaiKhoan, MatKhau, Email, SDT, DiaChi, Role)
        VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ssssss', $taiKhoan, $matKhau, $email, $sdt, $diachi, $role);

    if (mysqli_stmt_execute($stmt)) {
        $thongbao="Đăng ký thành công";
        header('Location: login.php');
        
        
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}


?>