<!-- dashboard.php -->
<?php
include_once 'db-connect.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login-page.php");
    exit();
}


// Handle image upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['profile_pic'])) {
    $target_dir = "uploads/";
    $profile_pic = $target_dir . basename($_FILES["profile_pic"]["name"]);
    $imageFileType = strtolower(pathinfo($profile_pic, PATHINFO_EXTENSION));
    $allowed_file_types = array("jpg", "jpeg", "png", "gif");

    // Check if file is an image
    $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
    if ($check === false) {
        echo '<script>alert("File is not an image."); window.location.href="dashboard.php";</script>';
        exit();
    }

    // Check file size (2MB limit)
    if ($_FILES["profile_pic"]["size"] > 2000000) {
        echo '<script>alert("Sorry, your file is too large. Only 2MB allowed."); window.location.href="dashboard.php";</script>';
        exit();
    }

    // Allow certain file formats
    if (!in_array($imageFileType, $allowed_file_types)) {
        echo '<script>alert("Sorry, only JPEG, PNG, and GIF files are allowed."); window.location.href="dashboard.php";</script>';
        exit();
    }

    // Check if file already exists
    if (file_exists($profile_pic)) {
        echo '<script>alert("Sorry, file already exists."); window.location.href="dashboard.php";</script>';
        exit();
    }

    // Upload the file
    if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $profile_pic)) {
        // Update the database with the new profile picture
        $stmt = $conn->prepare("UPDATE registration_details SET profile_pic = ? WHERE id = ?");
        if ($stmt === false) {
            die("Error preparing statement: " . $conn->error);
        }
        $stmt->bind_param("si", $profile_pic, $_SESSION['id']);
        if ($stmt->execute()) {
            $_SESSION['profile_pic'] = $profile_pic;
            echo '<script>alert("Profile picture updated successfully."); window.location.href="dashboard.php";</script>';
        } else {
            echo '<script>alert("Error updating profile picture in database."); window.location.href="dashboard.php";</script>';
        }
        $stmt->close();
    } else {
        echo '<script>alert("Sorry, there was an error uploading your file."); window.location.href="dashboard.php";</script>';
    }
}

// Retrieve user information from session
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$profile_pic = isset($_SESSION['profile_pic']) ? $_SESSION['profile_pic'] : 'uploads/default.png';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" async></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" async></script>
    <style>
        .card {
            background-image: url('./images/text-bg-image/bg-img.avif');
            background-size: cover;
            font-family: Georgia, serif;
        }
        body {
            background-image: url('img-slide.jpg');
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            width: 60vh; /* Increased width */
            padding: 20px;
            color: white;
        }
        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }
        .btn-upload {
            border: 2px solid #007bff;
            color: white;
            background-color: #007bff;
            padding: 8px 20px;
            border-radius: 8px;
            font-size: 20px;
            font-weight: bold;
        }
        .upload-btn-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }
    </style>
</head>
<body>

<div class="card">
    <div class="card-body text-center">
        <h2 class="card-title">User Dashboard</h2>
        <img src="<?php echo $profile_pic; ?>" alt="Profile Picture" class="profile-pic my-3">
        <h4><?php echo htmlspecialchars($name); ?></h4>
        <p><?php echo htmlspecialchars($email); ?></p>
        
        <form action="dashboard.php" method="post" enctype="multipart/form-data">
            <div class="upload-btn-wrapper">
                <button class="btn-upload">Upload a new profile picture</button>
                <input type="file" name="profile_pic" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update Profile Picture</button>
        </form>

        <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
    </div>
</div>

<script>
    let timer;
    
    function resetTimer() {
        clearTimeout(timer);
        timer = setTimeout(() => {
            alert('You have been logged out due to inactivity.');
            window.location.href = 'logout.php';
        }, 30000); // 30 seconds
    }

    document.onmousemove = resetTimer;
    document.onkeypress = resetTimer;
    document.onscroll = resetTimer;
    document.onclick = resetTimer;
    
    resetTimer(); // Initialize the timer when the page loads
</script>

</body>
</html>
