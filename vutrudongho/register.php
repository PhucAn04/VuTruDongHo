<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../../vendor/autoload.php';// Ensure the path is correct

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $fullName = $_POST['full_name']; // Make sure these fields are included in your form
    $phoneNumber = $_POST['phone_number'];
    $deliveryAddress = $_POST['delivery_address'];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Invalid email format']);
        exit;
    }

    // Generate random password
    $password = bin2hex(random_bytes(5)); // 10-character password

    // Hash the password with SHA-1
    $hashedPassword = sha1($password);

    // Configure PHPMailer
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'quangbinh261204@gmail.com'; // Your email address
        $mail->Password = 'jait mxkg vpud aidn'; // Application password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('quangbinh261204@gmail.com', 'vutrudongho');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your Registration Password';
        $mail->Body    = 'Your registration password is: ' . $password;

        $mail->send();

        // Store user details in database
        require 'db_connection.php'; // Include your database connection

        $stmt = $conn->prepare("INSERT INTO user (FullName, NumberPhone, Email, Password, HouseRoadAddress, Status) VALUES (?, ?, ?, ?, ?, 1)");
        $status = 0; // Default status
        $stmt->bind_param('sssssi', $fullName, $phoneNumber, $email, $hashedPassword, $deliveryAddress, $status);
        
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Registration successful! Check your email for the password.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to store user information in the database.']);
        }

        $stmt->close();
        $conn->close();
        
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Cannot send registration password. Error: ' . $mail->ErrorInfo]);
    }
}
?>
