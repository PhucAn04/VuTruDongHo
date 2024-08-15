<?php
require_once('../lib_session.php');

$user = $_REQUEST['userName'];
$pass = $_REQUEST['passWord'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vutrudongho";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare SQL statements
$sql = sprintf("SELECT * FROM user WHERE NumberPhone='%s'", mysqli_real_escape_string($conn, $user));
$sqlMail = sprintf("SELECT * FROM user WHERE Email='%s'", mysqli_real_escape_string($conn, $user));

// Execute queries
$result = mysqli_query($conn, $sql);
$resultMail = mysqli_query($conn, $sqlMail);

// Check for query errors
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

if (!$resultMail) {
    die("Query failed: " . mysqli_error($conn));
}

// Check if user exists
$errorLogin = "";
if (mysqli_num_rows($result) == 1 || mysqli_num_rows($resultMail) == 1) {
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    } elseif (mysqli_num_rows($resultMail) == 1) {
        $row = mysqli_fetch_assoc($resultMail);
    }

    $userID = $row['UserID'];
    $fullName = $row['FullName'];
    $numberPhone = $row['NumberPhone'];
    $email = $row['Email'];
    $passwordUser = $row['Password'];
    $houseRoadAddress = $row['HouseRoadAddress'];
    $ward = $row['Ward'];
    $district = $row['District'];
    $province = $row['Province'];
    $status = $row['Status'];

    // Hash the input password
    $hashedInputPassword = sha1($pass);

    // Debugging
    echo '<pre>';
    echo "User Name: " . htmlspecialchars($user) . "<br>";
    echo "Input Password (SHA-1): " . htmlspecialchars($hashedInputPassword) . "<br>";
    echo "Stored Password: " . htmlspecialchars($passwordUser) . "<br>";
    echo '</pre>';

    if ($hashedInputPassword == $passwordUser) {
        // Successful login
        if ($status == 1) {
            $_SESSION['current_username'] = $user;
            $_SESSION['isAdmin'] = true;
            $_SESSION['current_userID'] = $userID;
            $_SESSION['current_fullName'] = $fullName;
            $_SESSION['current_numberPhone'] = $numberPhone;
            $_SESSION['current_email'] = $email;
            $_SESSION['current_password'] = $passwordUser;
            $_SESSION['current_houseRoadAddress'] = $houseRoadAddress;
            $_SESSION['current_ward'] = $ward;
            $_SESSION['current_district'] = $district;
            $_SESSION['current_province'] = $province;
            $_SESSION['current_status'] = $status;

            $_SESSION['loginSuccess'] = true;
            header('Location: ../../index.php');
            exit();
        } else {
            // Account is locked
            $errorLogin = "Tài khoản của bạn bị khóa!";
            $_SESSION['errorLogin'] = $errorLogin;
            header("Location: ../../login.php?errorLogin=" . urlencode($errorLogin));
            exit();
        }
    } else {
        // Incorrect password
        $errorLogin = "Thông tin tài khoản chưa chính xác!";
        $_SESSION['errorLogin'] = $errorLogin;
        header("Location: ../../login.php?errorLogin=" . urlencode($errorLogin));
        exit();
    }
} else {
    // User does not exist
    $errorLogin = "Thông tin tài khoản chưa chính xác!";
    $_SESSION['errorLogin'] = $errorLogin;
    header("Location: ../../login.php?errorLogin=" . urlencode($errorLogin));
    exit();
}

// Close connection
mysqli_close($conn);
?>
