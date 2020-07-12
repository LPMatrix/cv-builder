<?php
session_start();

    require_once 'settings/config.php';
    $db = DB();
    require_once 'settings/library.php';
    $app = new library;

$register_error_message = '';


if (isset($_POST['btnRegister'])) {
    if ($_POST['name'] == "") {
        $register_error_message = 'Name field is required!';
    } else if ($_POST['email'] == "") {
        $register_error_message = 'Email field is required!';
    } else if ($_POST['password'] == "") {
        $register_error_message = 'Password field is required!';
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $register_error_message = 'Invalid email address!';
    } else if ($app->isEmail($_POST['email'])) {
        $register_error_message = 'Email is already in use!';
    } else {
        $user_id = $app->Register($_POST['name'], $_POST['email'], $_POST['password']);
        
        $_SESSION['user'] = $user_id;
        $_SESSION['email'] = $_POST['email'];
        header("Location: dashboard.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>DigitalCV Pro - Log In</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

        <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="colorlib-load"></div>
    </div>

   <!-- ***** Header Area Start ***** -->
   <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
      <a href="index.php" class="navbar-brand">DigitalCVPro</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navNavbar"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <!-- <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="signup.php" class="nav-link">Sign Up</a>
          </li>
          <li class="nav-item">
            <a href="signup.php" class="nav-link active">Sign In</a>
          </li>
        </ul> -->
      </div>
    </div>
  </nav>
    <!-- ***** Header Area End ***** -->

<!-- ***** Special Area Start ***** -->
    <section class="special-area bg-white section_padding_70" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto py-5">
                    <?php
                        if ($register_error_message != "") {
                            echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $register_error_message . '</div>';
                        }
                    ?>
                     <!-- form card login -->
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h3 class="mb-0">Register</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" method="POST" action="">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="name" id="uname1" required="">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control form-control-lg rounded-0" name="email" id="uname1" required="">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control form-control-lg rounded-0" id="pwd1" name="password" required="">
                                </div>
                                <!-- <div>
                                    <label class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input">
                                      <span class="custom-control-indicator"></span>
                                      <span class="custom-control-description small text-dark">Remember me</span>
                                    </label>
                                </div> -->
                                <button type="submit" class="btn btn-primary btn-lg float-right" name="btnRegister">Register</button>
                            </form>
                        </div>
                        <!--/card-block-->
                    </div>
                    <!-- /form card login -->
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-social-icon text-center section_padding_70 clearfix" id="footer">
        <!-- footer logo -->
        <div class="footer-text">
            <h3>DigitalCv Pro</h3>
        </div>
        <!-- social icon-->
        <div class="footer-social-icon">
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
        </div>
        <div class="footer-menu">
            <nav>
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Terms &amp; Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </div>
        <!-- Foooter Text-->
        <div class="copyright-text">
            <p>Copyright ©2018 DigitalCv Pro</p>
        </div>
    </footer>
    <!-- ***** Footer Area Start ***** -->



    <!-- Jquery-2.2.4 JS -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap-4 Beta JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All Plugins JS -->
    <script src="js/plugins.js"></script>
    <!-- Slick Slider Js-->
    <script src="js/slick.min.js"></script>
    <!-- Footer Reveal JS -->
    <script src="js/footer-reveal.min.js"></script>
    <!-- Active JS -->
    <script src="js/active.js"></script>

</body>

</html>
