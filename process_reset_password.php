<?php
session_start();
include 'db-connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($newPassword !== $confirmPassword) {
        echo '<script>alert("Passwords do not match. Please try again."); window.location.href="reset_password.php";</script>';
        exit();
    }

    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $email = $_SESSION['reset_email'];

    $stmt = $conn->prepare("UPDATE registration_details SET password = ? WHERE email = ?");
    $stmt->bind_param("ss", $hashedPassword, $email);

    if ($stmt->execute()) {
        echo '<script>alert("Password reset successful. Please log in with your new password."); window.location.href="login-page.php";</script>';
    } else {
        echo '<script>alert("Error updating password. Please try again."); window.location.href="reset_password.php";</script>';
    }

    $stmt->close();
    $conn->close();
    unset($_SESSION['reset_email']);
}
?>
