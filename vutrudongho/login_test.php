<?php
// Mật khẩu gốc và giá trị băm SHA-1 mong muốn
$original_password = 'cc0a270ef8';
$expected_hash = 'be6a5675e8cfbc63a69a';

// Băm mật khẩu gốc
$hashed_password = sha1($original_password);

// Kiểm tra xem giá trị băm có khớp với giá trị mong muốn không
if ($hashed_password === $expected_hash) {
    echo "Mật khẩu băm khớp với giá trị mong muốn!";
} else {
    echo "Mật khẩu băm không khớp với giá trị mong muốn.";
}

// Hiển thị giá trị băm đã tính
echo "<p>Mã băm tính được: " . $hashed_password . "</p>";
?>
