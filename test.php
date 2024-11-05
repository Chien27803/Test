<?php
include('connect.php');
$id = $_POST['id'];

// Truy vấn database
$sql = "SELECT TenChuyenDi, Price FROM tour WHERE id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $tenchuyendi=$row['TenChuyenDi'];
    $Price = $row['Price'];

    // Chuyển hướng đến trang HTML2 và truyền giá tour qua URL
    header("Location: xacNhan.php?tenchuyendi=$tenchuyendi&Price=$Price");
    exit();
} else {
    echo "Không tìm thấy tour có mã: " . $id;
}



?>