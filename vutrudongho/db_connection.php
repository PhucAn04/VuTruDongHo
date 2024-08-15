<?php
ini_set('memory_limit', '512M'); // Tăng giới hạn bộ nhớ

$servername = "localhost";
$username = "root"; // Đảm bảo rằng đây là tên người dùng đúng
$password = ""; // Đảm bảo rằng đây là mật khẩu đúng
$database = "vutrudongho"; // Tên cơ sở dữ liệu đúng

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
