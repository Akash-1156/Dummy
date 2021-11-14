<?php
include_once("../../vendor/autoload.php");

use App\DataManipulation\DataManipulation;

$dbm = new DataManipulation();

if (!isset($_SESSION)) {
  session_start();
}

$email = $_SESSION['res']->email;
$res = $dbm->emailIsExist($email);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ServCompany</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between" style="max-width: 1300px !important;">

      <div id="logo">
        <h1><a href="user_home.php"><span>Serv</span>Company</a></h1>
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="user_home.php">Home</a></li>
          <li><a class="nav-link scrollto" href="#about-us">Order</a></li>
          <li><a class="nav-link scrollto" href="#features">Features</a></li>
          <!-- <li><a class="nav-link scrollto" href="#screenshots">Screenshots</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li> -->
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          <li class="hero-container" style="cursor: pointer;"><h4 class=" nav-link scrollto"><?php echo $res->user_name;?></h4></li>
          <li> <a class="nav-link scrollto"  href="../process/dataProcess.php?logout"><i class="ti-layout-sidebar-left"></i>Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
