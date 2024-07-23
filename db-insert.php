<?php
include 'db-connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['names'];
    $email = $_POST['email'];
    $password = password_hash($_POST['passwords'], PASSWORD_DEFAULT);
    $profile_pic = 'uploads/default.jpg';

    // Check if a file was uploaded
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
        $target_dir = "uploads/";
        $profile_pic = $target_dir . basename($_FILES["profile_pic"]["name"]);
        move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $profile_pic);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO registration_details (names, email, passwords, profile_pic) VALUES (?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("ssss", $name, $email, $password, $profile_pic);

    // Execute the statement
    if ($stmt->execute()) {
        echo '<script>alert("Registration successful"); window.location.href="login-page.php";</script>';
    } else {
        echo '<script>alert("Error: ' . $stmt->error . '"); window.location.href="register.php";</script>';
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
