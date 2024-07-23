<?php
session_start();
include 'db-connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['passwords'];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT id, names, email, passwords, profile_pic FROM registration_details WHERE email = ?");
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $name, $db_email, $db_password, $profile_pic);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if (password_verify($password, $db_password)) {
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $db_email;
            $_SESSION['profile_pic'] = $profile_pic;
            header("Location: dashboard.php");
            exit();
        } else {
            echo '<script>alert("Invalid password."); window.location.href="login-page.php";</script>';
        }
    } else {
        echo '<script>alert("No user found with this email."); window.location.href="login-page.php";</script>';
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
