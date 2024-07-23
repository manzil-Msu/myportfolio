<?php
session_start();
include 'db-connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $stmt = $conn->prepare("SELECT email FROM registration_details WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($email);
        $stmt->fetch();

        // Generate OTP
        $otp = rand(100000, 999999);
        $_SESSION['otp'] = $otp;
        $_SESSION['reset_email'] = $email;

        // Send OTP to user's email
        mail($email, "Your OTP Code", "Your OTP code is $otp");

        echo 'success';
    } else {
        echo 'fail';
    }

    $stmt->close();
    $conn->close();
}
?>
