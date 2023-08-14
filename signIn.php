<?php include('crud.php') ?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sign In</title>
  <meta content="This is the description" name="description">
  <meta content="I am the author" name="author">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  </head>
  <body>
  <div class="main">
		<div class="container">
				<div class="row w-100 mx-0 mt-3">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							 <div class="row">
                                    <div class="col ps-md-0">
                                        <div class="p-3 m-3">
                                            <a href="index.php" class="d-block mb-2"><h2><span>My Resume</span></h2></a>
                                            <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                                            <?php
                                                if(isset($_SESSION['error'])){
                                                    echo
                                                    "
                                                    <div class='alert alert-danger text-center'>
                                                        ".$_SESSION['error']."
                                                
                                                    </div>
                                                    ";
                                                    unset($_SESSION['error']);
                                                }
                                                if(isset($_SESSION['success'])){
                                                    echo
                                                    "
                                                    <div class='alert alert-success text-center'>
                                                        ".$_SESSION['success']."
                                                
                                                    </div>
                                                    ";
                                                    unset($_SESSION['success']);
                                                }
                                            ?>
                                            <form method="POST" action="#">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" placeholder="Password" required>
                                            </div>
                                            <div>
                                                <button type="submit" name="signin_btn" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                                Login
                                                </button>
                                            </div>
                                            <a href="register.php" class="d-block mt-3 text-muted">Not a user? Sign up</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
						</div>
					</div>
				</div>
		</div>
	</div>

	<!-- Custom js for this page -->
	<!-- End custom js for this page -->
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>    

</body>
</html>