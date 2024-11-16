<?php
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'thu';
const DB_PORT = '3307';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

if (!$conn) {
    die("Không thể kết nối đến cơ sở dữ liệu: " . mysqli_connect_error());
}




?>