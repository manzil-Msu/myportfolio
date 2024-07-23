<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            background-image: url('img-slide.jpg'); /* Update with your image path */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .custom-div {
            margin: 20px 10px 15px 10px;/* top, right, bottom, left */
        }
        .img-thumbnail {
            height: 100px;
            width: 150px;
            background-color: black;
            border: none;
        }
        .carousel-item {
            background-image: url('./images/text-bg-image/bg-img.avif');
            background-size: cover;
            background-position: center;
        }
        .carousel-inner .row {
            height: 100%;
        }
        .carousel-inner .col-md-6 {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: rgba(255, 255, 255, 0.8);
        }
        .carousel-inner .col-md-6 h2 {
            margin-bottom: 1rem;
        }
        .carousel-inner .col-md-6 p {
            font-size: 0.9rem;
            opacity: 0.8;
        }
        .carousel-inner img {
            max-height: 400px;
            width: 100%;
            object-fit: cover;
        }
        .d-block {
            height: auto;
            max-width: 100%;
        }
        .vh-100 {
            height: 100vh;
        }
        .login-register-btn {
            color: #fff; /* Set the default text color */
            border-color: #fff; /* Set the default border color */
        }
        .login-register-btn:hover,
        .login-register-btn:focus,
        .login-register-btn:active {
            color: #fff; /* Maintain the same text color on hover */
            border-color: #fff; /* Maintain the same border color on hover */
            background-color: transparent; /* Ensure the background does not change */
        }
        #site-footer {
            background-color: black; /* Update with your image path */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
        }
        .footer-top {
            background: rgba(0, 0, 0, 0.5); /* Add a dark overlay to improve text readability */
        }
        #nav-list {
            cursor: pointer;
        }
        #nav-list li {
            display: inline-block;
            position: relative;
            margin-right: 20px;
            background: none; /* remove background image and color */
        }
        #nav-list li ul {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            padding: 10px;
        }
        #nav-list li:hover ul {
            display: block;
        }
        #nav-list li ul li {
            display: block;
            margin-right: 0;
        }
        #nav-list li ul li a {
            color: #333;
            text-decoration: none;
        }
        #nav-list li ul li a:hover {
            color: #337ab7;
            
        }
        .modal-body {
        padding: 20px;
        
    }
    #loginSignupModal .modal-content {
        background-image: url('img-slide.jpg');
        background-size: cover;
        color:white;
    }
    .modal-body .col-md-6 {
        position: relative;
        padding:5px;
    margin-bottom:30px;
    }

    .modal-body .col-md-6 h5 {
        display: inline-block;
        margin-right: 10px;
    }

    .modal-body .btn-primary {
        position: absolute;
        Top: 50px;
        right: 88px;
    }
        /* Light mode styles */
        .light-mode body, .light-mode html {
            background-color: white;
            color: black;
        }
        .light-mode .navbar-dark .navbar-nav .nav-link {
            color: black;
        }
        .light-mode .login-register-btn {
            color: black;
            border-color: black;
        }
        .light-mode .login-register-btn:hover,
        .light-mode .login-register-btn:focus,
        .light-mode .login-register-btn:active {
            color: black;
            border-color: black;
            background-color: transparent;
        }
        .light-mode #site-footer {
            background-color: white;
            color: black;
        }
        .light-mode .footer-top {
            background: rgba(255, 255, 255, 0.5);
        }
        .light-mode .btn-outline-secondary {
            color: black;
            border-color: black;
        }
        .light-mode .btn-outline-secondary:hover,
        .light-mode .btn-outline-secondary:focus,
        .light-mode .btn-outline-secondary:active {
            color: black;
            border-color: black;
            background-color: transparent;
        }
        .light-mode .navbar-dark {
            background-color: white !important;
        }
        .light-mode .navbar-dark .navbar-nav .nav-link,
        .light-mode .navbar-dark .navbar-brand {
            color: black !important;
        }
        .light-mode .navbar-dark .navbar-toggler {
            border-color: black;
        }
        .light-mode .navbar-dark .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(0, 0, 0, 1)' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
        .light-mode .navbar {
            background-image: none !important;
            background-color: white !important;
        }
    </style>
</head>
<body>
<!-- Navbar -->
<header id="site-header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-black fixed-top">
        <div class="container">
            <img src="msu-removebg.png" class="img-thumbnail" alt="...">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0" id="nav-list">
                    <li class="nav-item">
                        <a class="navbar-brand" href="#"><i class="fa-solid fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="#"><i class="fa-solid fa-info-circle"></i> About</a>
                        <ul>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-book"></i> Academics</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user"></i> Non-Academics</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="#"><i class="fa-solid fa-briefcase"></i> My Project</a>
                        <ul>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-file"></i> Project 1</a></li>
                            <li><a class="dropdown-item" href="project_2.php"><i class="fa-solid fa-file"></i> Project 2</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-file"></i> Project 3</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="#"><i class="fa-regular fa-share-from-square"></i> Social</a>
                        <ul>
                            <li><a class="dropdown-item" href="#"><i class="fa-brands fa-linkedin-in"></i> linkedin</a></li>
                            <li><a class="dropdown-item" href="mailto:manzil.rai@msu.edu.in"><i class="fa-regular fa-envelope"></i> Mail</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-phone"></i> Contact</a></li>
                        </ul>
                        <li class="nav-item">
                        <a class="navbar-brand" href="#"><i class="fa-solid fa-file"></i> Blog</a>
                    </li>
                    </li>
                </ul>
                <button class="btn btn-outline-secondary login-register-btn" data-bs-toggle="modal" data-bs-target="#loginSignupModal">
                    <i class="fa-solid fa-user"></i> Login/Register
                </button>
                <button class="btn btn-outline-secondary login-register-btn" id="lightModeToggle">
                    <i class="fa-solid fa-lightbulb"></i> Light Mode
                </button>
            </div>
        </div>
    </nav>
</header>

<!-- Carousel -->
<div class="d-flex justify-content-center align-items-center vh-100 custom-div">
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row h-100">
                        <div class="col-md-6">
                            <h2>WEB DEVELOPMENT</h2>
                            <p>I am a web developer skilled in both front-end and <br>back-end technologies.I have experience with HTML, <br>CSS, JavaScript. I am passionate about building <br>responsive,user-friendly web applications.</p>
                            <button class="btn btn-primary">HIRE ME</button>
                        </div>
                        <div class="col-md-6">
                            <img src="images/slides-images/first-slide.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row h-100">
                        <div class="col-md-6">
                            <h2>DATABASE</h2>
                            <p>Cybersecurity protects data and systems from cyber threats, <br>ensuring confidentiality, integrity, and availability through<br> preventive measures and monitoring."</p>
                            <button class="btn btn-primary">HIRE ME</button>
                        </div>
                        <div class="col-md-6">
                            <img src="images/slides-images/second-slide.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row h-100">
                        <div class="col-md-6">
                            <h2>FREE FIRE</h2>
                            <p>I ᴡᴀɴᴛ ᴛᴏ sᴜᴄᴄᴇssғᴜʟ ʙʏ ᴡᴇᴀʀɪɴɢ E-sᴘᴏʀᴛ Jᴇʀsᴇʏ <br> ɴᴏᴛ ᴜɴɪғᴏʀᴍ🎮🥇
</p>
                            <button class="btn btn-primary">HIRE ME</button>
                        </div>
                        <div class="col-md-6">
                            <img src="images/slides-images/fourth-slide.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>


  
<!-- Modal for Login/Signup -->
<div class="modal fade" id="loginSignupModal" tabindex="-1" aria-labelledby="loginSignupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="mb-3">Already have an account?</h5>
                        <a href="login-page.php" class="btn btn-primary">Login</a>

                    </div>
                    <div class="col-md-6">
                        <h5 class="mb-3">Don't have an account?</h5>
                        <a href="register.php" class="btn btn-primary">Sign up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Your existing HTML code -->

<!-- Bootstrap Bundle with Popper and Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<!-- Script to trigger the modal -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(function() {
            var myModal = new bootstrap.Modal(document.getElementById('loginSignupModal'));
            myModal.show();
        }, 5000); // Show modal after 5 seconds
    });
</script>






<script>
    var myCarousel = document.querySelector('#carouselExampleIndicators');
    var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 3000, // 3000ms = 3 seconds
        ride: 'carousel'
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script>
    document.getElementById('lightModeToggle').addEventListener('click', function() {
        document.body.classList.toggle('light-mode');
    });
</script>
<!-- Footer -->
<footer id="site-footer">
    <div class="footer-top py-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-sm-12">
                    <h5 class="pb-3"><i class="fa-solid fa-user-group pe-1"></i> About Me</h5>
                    <span class="text-secondary">Welcome to my portfolio! I'm Manzil Rai, a versatile Full Stack with a passion for Website Design. With 1 year of experience in web development.</span>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12">
                    <h5 class="pb-3"><i class="fa-solid fa-link pe-1"></i> Important links</h5>
                    <ul>
                        <li><a href="#" class="text-decoration-none link-secondary">About me</a></li>
                        <li><a href="#" class="text-decoration-none link-secondary">Privacy policy</a></li>
                        <li><a href="#" class="text-decoration-none link-secondary">Terms of services</a></li>
                    </ul>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12">
                    <h5 class="pb-3"><i class="fa-solid fa-location-dot pe-1"></i> My location</h5>
                    <span class="text-secondary">
                        Sajong<br>
                        Rangpo, East Sikkim, Sikkim<br>
                        737103, India<br>
                    </span>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12">
                    <h5 class="pb-3"><i class="fa-solid fa-paper-plane pe-1"></i> Stay updated</h5>
                    <form>
                        <input type="text" class="w-100 mb-2 form-control" name="" placeholder="Email ID">
                        <button class="w-100 btn btn-dark">Subscribe now</button>
                    </form>
                </div>
                <div class="mt-4 w-100 aos-item__inner">
                    <iframe class="hvr-shadow" width="100%" height="345" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3561.341037256256!2d88.5242873150483!3d27.1762105830099!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e6a17d42a9e3f7%3A0x67e4c13c8a0bbda2!2sSajong%2C%20Rangpo%2C%20Sikkim%20737103%2C%20India!5e0!3m2!1sen!2sin!4v1713530351848!5m2!1sen!2sin"></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-dark py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a class="btn btn-outline-secondary" href="https://www.facebook.com/manzil.rai.5872?mibextid=ZbWKwL"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a class="btn btn-outline-secondary" href="https://www.youtube.com/@sikkimkanxo4349"><i class="fa-brands fa-youtube"></i></a></li>
                        <li class="list-inline-item"><a class="btn btn-outline-secondary" href="#"><i class="fa-brands fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a class="btn btn-outline-secondary" href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        <li class="list-inline-item"><a class="btn btn-outline-secondary" href="#"><i class="fa-brands fa-github"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-12">
                    <span class="text-secondary pt-1 float-md-end float-sm-start">Copyright &copy; 2024</span>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

