<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../../vendor/autoload.php'; // Đảm bảo rằng đường dẫn này đúng

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require '../db_connection.php'; // Kết nối với cơ sở dữ liệu

    $fullName = $_POST['fullName'];
    $phoneNumber = $_POST['numberPhone'];
    $email = $_POST['email'];
    $deliveryAddress = $_POST['deliveryAddress'];

    // Kiểm tra định dạng email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Định dạng email không hợp lệ';
        header("Location: ../signup.php");
        exit;
    }

    // Kiểm tra nếu email đã tồn tại
    $stmt = $conn->prepare("SELECT * FROM user WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $_SESSION['error'] = 'Email đã tồn tại trong hệ thống';
        header("Location: ../signup.php");
        exit;
    }
    $stmt->close();

    // Tạo mật khẩu ngẫu nhiên
    $password = bin2hex(random_bytes(5)); // Mật khẩu 10 ký tự

    // Hash mật khẩu với SHA-1
    $hashedPassword = sha1($password);

    // Lưu thông tin người dùng vào cơ sở dữ liệu
    $stmt = $conn->prepare("INSERT INTO user (FullName, NumberPhone, Email, Password, HouseRoadAddress, Status) VALUES (?, ?, ?, ?, ?, 1)");
    $stmt->bind_param('sssss', $fullName, $phoneNumber, $email, $hashedPassword, $deliveryAddress);

    if ($stmt->execute()) {
        // Gửi mật khẩu qua email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'quangbinh261204@gmail.com'; // Địa chỉ email của bạn
            $mail->Password = 'jait mxkg vpud aidn'; // Mật khẩu ứng dụng
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('quangbinh261204@gmail.com', 'vutrudongho');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Mật khẩu đăng ký của bạn';
            $mail->Body    = 'Mật khẩu đăng ký của bạn là: ' . $password;

            $mail->send();

            // Đăng nhập tự động sau khi đăng ký
            $_SESSION['user_id'] = $stmt->insert_id;
            $_SESSION['user_name'] = $fullName;
            $_SESSION['user_email'] = $email;

            header("Location: ../index.php"); // Chuyển hướng đến trang chủ
            exit;
        } catch (Exception $e) {
            $_SESSION['error'] = 'Không thể gửi mật khẩu qua email. Lỗi: ' . $mail->ErrorInfo;
            header("Location: ../signup.php");
            exit;
        }
    } else {
        $_SESSION['error'] = 'Không thể lưu thông tin người dùng vào cơ sở dữ liệu';
        header("Location: ../signup.php");
        exit;
    }

    $stmt->close();
    $conn->close();
}
?>
