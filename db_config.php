<?php
$host = 'localhost';
$username = 'root';
$password = 'Dinhchien03*';
$dbname = 'dulich2'; // Tên cơ sở dữ liệu

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli($host, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}




?>