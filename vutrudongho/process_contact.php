<?php
// Thông tin kết nối cơ sở dữ liệu
$servername = "localhost"; 
$username = "root";    
$password = "";    
$dbname = "vutrudongho";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Chuẩn bị câu lệnh SQL để chèn dữ liệu
$sql = "INSERT INTO contacts (full_name, email, subject, message) VALUES (?, ?, ?, ?)";

// Sử dụng prepared statements để tránh SQL injection
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $full_name, $email, $subject, $message);

// Thực hiện câu lệnh
if ($stmt->execute()) {
    // Hiển thị thông báo và chuyển hướng
    echo "<script>
        alert('Thông tin của bạn đã được gửi thành công.');
        window.location.href = 'contact.php';
    </script>";
} else {
    // Hiển thị thông báo lỗi và chuyển hướng
    echo "<script>
        alert('Lỗi khi gửi thông tin: " . $stmt->error . "');
        window.location.href = 'contact.php';
    </script>";
}

// Đóng statement và kết nối
$stmt->close();
$conn->close();
?>
