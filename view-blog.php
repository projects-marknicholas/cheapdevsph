<?php 

require_once 'adminpanel/config.php';

if (isset($_GET['blogid']) && isset($_GET['blog_title']) && !empty($_GET['blogid']) && !empty($_GET['blog_title'])) {
  $sql = "SELECT * FROM blogs WHERE id = '".$_GET['blogid']."' AND blog_title = '".$_GET['blog_title']."' ";
  $res = mysqli_query($link, $sql);

  if (mysqli_num_rows($res) > 0) {
    while ($result = mysqli_fetch_assoc($res)) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $result['blog_title']?> - CheapDevs PH</title>
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

  <header id="header">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.html">CheapDevs PH</a></h1>
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
      </nav>

    </div>
  </header>

  <main id="main">

    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?php echo $result['blog_title']?></h2>
          <ol>
            <li><a href="#">Home</a></li>
            <li><a href="#">Blogs</a></li>
            <li><?php echo $result['blog_title']?></li>
          </ol>
        </div>

      </div>
    </section>

    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <?php
                    if ($result['image_1'] == "") {
                      echo '<img src="uploads/no-image.png" alt="">';
                    }
                    else{
                      echo '<img src="uploads/'.$result['image_1'].'" alt="">';
                    }
                  ?>
                </div>

                <div class="swiper-slide">
                  <?php
                    if ($result['image_2'] == "") {
                      echo '<img src="uploads/no-image.png" alt="">';
                    }
                    else{
                      echo '<img src="uploads/'.$result['image_2'].'" alt="">';
                    }
                  ?>
                </div>

                <div class="swiper-slide">
                  <?php
                    if ($result['image_3'] == "") {
                      echo '<img src="uploads/no-image.png" alt="">';
                    }
                    else{
                      echo '<img src="uploads/'.$result['image_3'].'" alt="">';
                    }
                  ?>
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>News Information</h3>
              <ul>
                <li><strong>Total Clicks</strong>: <?php echo $result['clicks']?></li>
                <li><strong>Company Name</strong>: CheapDevs PH</li>
                <li><strong>Project date</strong>: <?php echo $result['blog_date']?></li>
                <li><strong>Website URL</strong>: <a href="www.cheapdevsph.epizy.com">www.cheapdevsph.epizy.com</a></li>
              </ul>
            </div>
          </div>

          
            <div class="portfolio-description">
              <h2><?php echo $result['blog_title']?></h2>
              <p>
                <?php echo nl2br($result['blog_description'])?>
              </p>
            </div>

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
<?php
    }
  }
}
else{
  header('location: blog');
}

?>