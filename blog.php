<?php
// Database connection
$servername = "localhost";
$username = "concrete_root";
$password = "0rlvRHdN~y^7"; // Update with your MySQL root password if necessary
$dbname = "concrete_database";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch blog posts from the database
$sql = "SELECT * FROM submissions ORDER BY date DESC";
$result = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Concretech India: Quality RMC & Bitumen Solutions</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="keywords"
        content="Ready Mix Concrete, Bitumen, RMC, Concrete Supplier, Construction Solutions, Quality Concrete">
    <meta name="description"
        content="Concretech India offers premium Ready Mix Concrete (RMC) and bitumen products, providing reliable and high-quality solutions for construction projects.">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Concretech India: Quality Ready Mix Concrete & Bitumen Solutions">
    <meta property="og:description"
        content="Concretech India offers premium Ready Mix Concrete (RMC) and bitumen products, ensuring the highest quality for construction projects.">
    <meta property="og:url" content="https://www.concretechindia.com">
    <link rel="icon" href="img/logo.png" type="image/x-icon">


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-white d-none d-lg-block m-2">
        <div class="row align-items-center top-bar">
            <div class="col-lg-3 col-md-12 text-center text-lg-start">
                <a href="." class="navbar-brand m-0 p-0">
                    <h1 class="text-danger m-0">
                        <img src="./img/concretech-logo.png" style="max-width: 250px;">
                    </h1>
                </a>
            </div>
            <div class="col-lg-9 col-md-12 text-end">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <i class="far fa-envelope-open text-danger me-2"></i>
                    <p class="m-0">info@concretechindia.com</p>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square bg-white text-danger me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square bg-white text-danger me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square bg-white text-danger me-1" href=""><i
                            class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square bg-white text-danger me-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid nav-bar bg-white">
        <nav class="navbar navbar-expand-lg navbar-light bg-white p-3 py-lg-0 px-lg-4">
            <a href="" class="navbar-brand d-flex align-items-center m-0 p-0 d-lg-none">
                <h1 class="text-danger m-0">
                    <img src="./img/concretech-logo.png" style="max-width: 150px;">
                </h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav me-auto">
                    <a href="." class="nav-item nav-link">Home</a>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">About Us</a>
                        <div class="dropdown-menu fade-up m-0">
                            <a href="profile" class="dropdown-item">Profile</a>

                            <a href="team" class="dropdown-item">Our Team</a>
                            <a href="blog.php" class="dropdown-item active">Blog</a>
                            <a href="complete_project.php" class="dropdown-item">Our Complete Project</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Solutions</a>
                        <div class="dropdown-menu fade-up m-0">
                            <a href="rmc" class="dropdown-item">Ready Mix Concrete (RMC)</a>
                            <a href="crusher" class="dropdown-item">Crusher</a>
                        </div>
                    </div>
                    <a href="network" class="nav-link nav-item">Our Network</a>
                    <a href="careers" class="nav-link nav-item">Careers</a>
                    <a href="contact" class="nav-item nav-link">Contact us</a>
                </div>
                <div class="mt-4 mt-lg-0 me-lg-n4 py-3 px-4 bg-danger d-flex align-items-center">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-dark"
                        style="width: 45px; height: 45px;">
                        <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ms-3">
                        <p class="mb-1 text-white">Toll Free</p>
                        <h5 class="m-0 text-white">+91 993 077 1772</h5>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->



    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 py-5">
        <div class="container">
            <h1 class="display-3 text-white mb-3 animated slideInDown">BLOGS</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a class="text-white" href=".">About Us</a></li>
                    <li class="breadcrumb-item" aria-current="client"><b class="text-white">BLOGS</b></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <div class="container mt-5">
        <div class="row">
            <?php if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { 
                    // Format the date for each blog post entry
                    $dbDate = $row['date'];
                    $date = new DateTime($dbDate);
                    $formattedDate = $date->format('d F, Y'); ?>

            <div class="col-md-4 my-4">
                <div class="card blog-card">
                    <a href="showBlog.php?id=<?php echo $row['id']; ?>">
                        <img src="./Admin/<?php echo $row['image_path']; ?>" class="card-img-top" alt="Blog Image">
                    </a>
                    <div class="card-body">
                        <h6 class="fs-6 text-dark"><?php echo $formattedDate; ?></h6>
                        <h5 class="card-title mb-3"><?php echo $row['title']; ?></h5>
                        <a href="showBlog.php?id=<?php echo $row['id']; ?>">Read More +</a>
                    </div>
                </div>
            </div>
            <?php } 
            } else { ?>
            <h1>No blogs found.</h1>
            <?php } ?>
        </div>
    </div>


    <!-- Footer Start -->
    <div class="container-fluid text-light footer pt-5 mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>603, Akshar Blue Chip IT Park, Near Turbhe
                        Naka, Turbhe, Navi Mumbai 400705.</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91 993 077 1772</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@concretechindia.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Opening Hours</h4>
                    <h6 class="text-light">Monday -Saturday:</h6>
                    <p class="mb-4">09.30 AM - 6.30 PM</p>
                    <h6 class="text-light">Sunday: Closed</h6>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="profile">About Us</a>
                    <a class="btn btn-link" href="rmc">Solutions</a>
                    <a class="btn btn-link" href="network">Our Network</a>
                    <a class="btn btn-link" href="careers">Careers</a>
                    <a class="btn btn-link" href="contact">Contact Us</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p>Subscribe to our newsletter for industry news, insights, and exclusive updates on our latest
                        services and products.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button"
                            class="btn btn-danger py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href=".">Concretech India</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://www.idrtm.in">DRTM</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-danger btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>


</body>

</html>