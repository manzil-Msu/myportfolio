<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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
            <h1 class="fw-bold mb-2 text-uppercase">Reset Password</h1>
            <p class="text-white-50 mb-5">Enter your new password.</p>

            <form id="reset-password-form" method="POST" action="process_reset_password.php">
                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="newPassword">New Password</label>
                    <input type="password" id="newPassword" name="newPassword" class="form-control form-control-lg" required>
                </div>
                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" class="form-control form-control-lg" required>
                </div>

                <button class="btn btn-outline-light btn-lg px-5" type="submit" name="resetPassword">Reset Password</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#reset-password-form').on('submit', function(event){
                const newPassword = $('#newPassword').val().trim();
                const confirmPassword = $('#confirmPassword').val().trim();

                if (newPassword !== confirmPassword) {
                    event.preventDefault();
                    alert('Passwords do not match. Please try again.');
                }
            });
        });
    </script>
</body>
</html>
