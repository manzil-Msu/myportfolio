<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('log-bk.jpeg');
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background-color 0.5s, color 0.5s;
        }
        .card {
            background-color: black;
            color: white;
            width: 65vh;
            height: auto; /* Adjust the height as needed */
            max-height: 85vh; /* Limit the maximum height to prevent excessive stretching */
            overflow-y: auto; /* Add scrollbar if content overflows */
        }
        .card-body {
            padding: 2rem;
        }
        .password-toggle {
            position: relative;
        }
        .password-toggle-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            color: white;
            transition: color 0.2s;
            margin-top: 14px;
        }
        .password-toggle-icon:hover {
            color: #343a40;
        }
        .text-white {
            margin-top: 7px;
        }
        .text-black {
            color: black;
        }
        .input-dark-mode {
            color: white;
        }
        .input-dark-mode::placeholder {
            color: white;
        }
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        h2, label {
            font-family: Georgia, serif;
        }
    </style>
</head>
<body>
    <div class="card bg-dark text-white" style="border-radius: 1rem;">
        <div class="card-body p-5 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">
                <h2 class="fw-bold mb-2 text-uppercase">SIGN UP</h2>
                <p class="text-white-50 mb-5">Please create your account!</p>
                <form id="register-form" action="register.php" name="register-form" method="POST" enctype="multipart/form-data">
                    <div class="form-outline form-white mb-4">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" id="name" name="names" class="form-control form-control-lg input-dark-mode" required />
                    </div>
                    <div class="form-outline form-white mb-4">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control form-control-lg input-dark-mode" placeholder="example@gmail.com" required />
                    </div>
                    <div class="form-outline form-white mb-4 password-toggle">
                        <label class="form-label" for="password">Password</label>
                        <div class="password-input">
                            <input type="password" id="password" name="passwords" class="form-control form-control-lg input-dark-mode" required />
                            <i class="fas fa-eye-slash password-toggle-icon"></i>
                        </div>
                    </div>
                    
                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Sign Up</button>
                    <div class="mt-3">
                        <p class="mb-0">Already have an account? <a href="login-page.php" class="text-white-50 fw-bold">LOGIN</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <button onclick="toggleMode()" style="position: absolute; top: 20px; right: 20px;"><i class="fas fa-lightbulb"></i> Light Mode</button>

    <script>
        function toggleMode() {
            const body = document.body;
            const card = document.querySelector('.card');
            const cardBody = document.querySelector('.card-body');
            const textColor = document.querySelectorAll('.text-white, .text-white-50, h2, label, button, .card-body p, .card-body a, .card-body div, .card-body .fw-bold');
            const inputDarkMode = document.querySelectorAll('.input-dark-mode');
            const passwordToggleIcon = document.querySelector('.password-toggle-icon');

            body.classList.toggle('light-mode');
            card.classList.toggle('bg-light');
            cardBody.classList.toggle('bg-light');
            textColor.forEach(item => item.classList.toggle('text-black'));
            inputDarkMode.forEach(item => item.classList.toggle('input-dark-mode'));
            passwordToggleIcon.classList.toggle('text-black');

            // Change the color of the buttons
            const buttons = document.querySelectorAll('button');
            buttons.forEach(button => {
                button.classList.toggle('btn-outline-light');
                button.classList.toggle('btn-outline-dark');
            });

            // Change the color of the links
            const links = document.querySelectorAll('.card-body a');
            links.forEach(link => {
                link.classList.toggle('text-white-50');
                link.classList.toggle('text-primary');
            });
        }

        const passwordToggleIcon = document.querySelector('.password-toggle-icon');
        const passwordInput = document.querySelector('#password');

        passwordToggleIcon.addEventListener('click', () => {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordToggleIcon.classList.remove('fa-eye-slash');
                passwordToggleIcon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                passwordToggleIcon.classList.remove('fa-eye');
                passwordToggleIcon.classList.add('fa-eye-slash');
            }
        });
    </script>
</body>
</html>
