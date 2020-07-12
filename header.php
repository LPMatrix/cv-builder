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
    <link rel="stylesheet" href="css/pillar-1.css">

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
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
		    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?= $_SESSION['email']; ?></a>
		    <div class="dropdown-menu">
		      <a class="dropdown-item" href="#">Action</a>
		      <a class="dropdown-item" href="#">Another action</a>
		      <a class="dropdown-item" href="#">Something else here</a>
		      <div class="dropdown-divider"></div>
		      <a class="dropdown-item" href="settings/logout.php">Logout</a>
		    </div>
		  </li>
        </ul>
      </div>
    </div>
  </nav>
    <!-- ***** Header Area End ***** -->