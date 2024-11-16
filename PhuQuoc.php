<?php
session_start();
include 'connect.php';

if (!$conn) {
    die("Kết nối thất bại");
}

$user = null;
if (isset($_SESSION['id'])) {
    $result = $conn->query("SELECT * FROM NguoiDung WHERE id = " . $_SESSION['id']);
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
    }
}

$sql = "SELECT tour_name FROM Tours where tour_id=1";
$result2 = $conn->query($sql);


// $conn->close();




?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome-free-6.6.0-web/css/all.min.css">
    <link rel="stylesheet" href="slider/slider.css">
    <style>
        table {
            border-collapse: collapse;
            border: 1px solid black;
            width: 100%;
            height: 600px;
        }
    </style>
</head>

<body>
    <div id="banner">
        <img id="logo" src="z5879202938224_88e6b42e7b1c2b1071162d8126d30a84.jpg" alt="Logo">
        <h2>Dulich3mien.vn</h2>
        <p style="position: absolute; left: 200px; top: 10px; color: blueviolet;">
            <i class="fa-solid fa-plane"></i> Bạn muốn đi đâu?
        </p>
        <ul>
            <li style="width: 140px;"><a href=""><i class="fa-solid fa-house"></i> Trang Chủ</a></li>
            <li><a href=""><i class="fa-solid fa-layer-group"></i> Giới thiệu</a>
                <ul class="menucon">
                    <li><a href="">1</a></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                </ul>
            </li>
            <li><a href=""><i class="fa-solid fa-newspaper"></i> Tin Tức</a></li>
            <li style="width: 90px;"><a href=""><i class="fa-solid fa-phone"></i> Hỗ trợ</a></li>
            <?php if ($user): ?>
                <li style="width: inherit; padding-right: 4px;"><a style="padding: 0 10px;" href="" id="accountLink"><i class="fa-solid fa-user" style="padding-right: 5px;"></i><?php echo $user['HoVaTen']; ?></a></li>
            <?php else: ?>
                <li><a id="accountLink"><i class="fa-solid fa-user"></i> Tài Khoản</a></li>
            <?php endif; ?>
        </ul>
    </div>

    <?php if ($user): ?>
        <div class="form_Account" style="display: none; border: 1px solid gray; width: 150px; height: 120px; position: absolute; right: 20px; border-radius: 10px; background-color: white; z-index: 900;">
            <a href="profile.php" style="position: relative; left: 25px; top: 8px;">Xem thông tin</a>
            <button type="button" style="background-color: rgb(0, 228, 255); position: relative; top: 15px;" onclick="window.location.href='ChangeMK.php'">Đổi mật khẩu</button>
            <button id="sua" type="button" style="background-color: rgb(0, 228, 255); position: relative; top: 23px; left: 45px;" onclick="window.location.href='logout.php'">Đăng Xuất</button>
        </div>
    <?php else: ?>
        <div class="form_Account">
            <button type="button" style="background-color: rgb(0, 228, 255);" onclick="window.location.href='login.php'">Bạn đã có tài khoản</button>
            <p>Bạn chưa có tài khoản? <a href="signup.php">Đăng ký</a> ngay</p>
        </div>
    <?php endif; ?>

    <div class="bamien">
        <div id="mb"><a href="">MIỀN BẮC</a></div>
        <div id="mt"><a href="">MIỀN TRUNG</a></div>
        <div id="mn"><a href="">MIỀN NAM</a></div>
    </div>


    <div id="content">
        <table border="1">
            <tr>
                <td style="vertical-align: top;">
                <td style="vertical-align: top;"><?php if ($result2->num_rows > 0) {
                                                        while ($row = $result2->fetch_assoc()) {
                                                            echo $row["tour_name"];
                                                        }
                                                    } else {
                                                        echo "No tour found with ID 1";
                                                    } ?></td>


                </td>
                <td style="vertical-align: top;">Form Du Lich </td>
            </tr>
        </table>


    </div>


</body>

</html>