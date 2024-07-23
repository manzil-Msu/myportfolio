<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $otp = $_POST['otp'];

    if (isset($_SESSION['otp']) && $_SESSION['otp'] == $otp) {
        unset($_SESSION['otp']); // Clear OTP after verification
        echo '<script>window.location.href="reset_password.php";</script>';
    } else {
        echo '<script>alert("Invalid OTP. Please try again."); window.location.href="otp.php";</script>';
    }
}
?>
