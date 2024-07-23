<?php
session_start();
include 'db-connect.php';

// Check if the session variable for the reset email is set
if (!isset($_SESSION['reset_email'])) {
    echo '<script>alert("Unauthorized access. Please try again."); window.location.href="find_account.php";</script>';
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredOtp = $_POST['otp'];
    $email = $_SESSION['reset_email'];

    // Check OTP against the stored OTP in the database
    $stmt = $conn->prepare("SELECT otp, otp_expiration FROM registration_details WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($storedOtp, $otpExpiration);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        $currentDateTime = new DateTime();
        $expirationDateTime = new DateTime($otpExpiration);

        if ($enteredOtp === $storedOtp && $currentDateTime <= $expirationDateTime) {
            // OTP is correct and not expired, redirect to reset password page
            header("Location: reset_password.php");
            exit();
        } else {
            // OTP is incorrect or expired
            echo '<script>alert("Invalid or expired OTP. Please try again."); window.location.href="otp.php";</script>';
        }
    } else {
        echo '<script>alert("Invalid OTP or email. Please try again."); window.location.href="find_account.php";</script>';
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" async></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" async></script>
    <style>
        body {
            background-image: url('https://picsum.photos/2000/1000');
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: 60%; /* Adjust width as needed */
        }

        .card-body {
            padding: 2.5rem; /* Increased padding */
        }

        .text-white {
            color: white;
        }
    </style>
</head>
<body>
    <div class="card bg-dark text-white">
        <div class="card-body p-5 text-center">
            <h1 class="fw-bold mb-2 text-uppercase">Verify OTP</h1>
            <p class="text-white-50 mb-5">Enter the OTP sent to your email.</p>

            <form id="otp-form" method="POST" action="otp.php">
                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="otp">OTP</label>
                    <input type="text" id="otp" name="otp" class="form-control form-control-lg" required>
                </div>

                <button class="btn btn-outline-light btn-lg px-5" type="submit">Verify OTP</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#otp-form').on('submit', function(event){
                const otp = $('#otp').val().trim();

                if (!otp) {
                    event.preventDefault();
                    alert('Please enter the OTP.');
                }
            });
        });
    </script>
</body>
</html>












