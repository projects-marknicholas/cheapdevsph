<?php
include 'adminpanel/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Events & Seminars - CheapDevs PH</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/favicon.png" rel="apple-touch-icon">

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

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.html">CheapDevs PH</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="./#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="./#about">About Us</a></li>
          <li><a class="nav-link scrollto" href="./#services">Services</a></li>
          <li><a class="nav-link scrollto" href="./#portfolio">Our Works</a></li>
          <li><a class="nav-link scrollto" href="./#team">Team</a></li>
          <li><a class="nav-link scrollto" href="./#contact">Contact</a></li>
          <li class="dropdown"><a href="#"><span>What's New?</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="news">News</a></li>
              <li><a href="events&seminar">Events & Seminars</a></li>
              <li><a href="promo">Promo</a></li>
              <li><a href="blog">Blog</a></li>
            </ul>
          </li>
          <li><a class="getstarted scrollto" href="./#about">Get Started</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Events & Seminars</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Events & Seminars</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">
        <div class="pr-grid-4">
          <?php
            $sql = "SELECT * FROM events_seminars ORDER BY id DESC";
            $res = mysqli_query($link, $sql);

            if (mysqli_num_rows($res) > 0) {
              while ($result = mysqli_fetch_assoc($res)) {
          ?>
          <div class="pr-grid-item">
            <a href="new-view-es?id=<?php echo $result['id']?>&title=<?php echo $result['es_title']?>">
              <?php
                if ($result['image_1'] == "") {
                  echo '<img src="uploads/no-image.png" class="pr-image">';
                }
                else{
                  echo '<img src="uploads/'.$result['image_1'].'" class="pr-image">';
                }
              ?>
              <div class="pr-text">
                <h1><?php echo $result['es_title']?></h1>
                <?php echo substr($result['es_description'], 0, 20)?>...
              </div>
            </a>
          </div>
          <?php
              }
            }
          ?>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php include 'footer.php'?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>