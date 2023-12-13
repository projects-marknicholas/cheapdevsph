<?php require_once 'adminpanel/config.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>News - CheapDevs PH</title>
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
          <h2>News</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>News</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">
        <div class="news-grid">
          <div class="news-item1">
            <h5>Latest News</h5>

            <?php
              $latest_sql = "SELECT * FROM news ORDER BY id DESC LIMIT 1";
              $latest_res = mysqli_query($link, $latest_sql);

              if (mysqli_num_rows($latest_res) > 0) {
                while ($latest_result = mysqli_fetch_assoc($latest_res)) {
            ?>
            <a href="new-view-news?newsid=<?php echo $latest_result['id']?>&news_title=<?php echo $latest_result['news_title']?>" class="text-secondary">
              <div class="news-main">
                <?php
                  if ($latest_result['image_1'] == "") {
                    echo '<img src="uploads/no-image.png" class="news-main-img">';
                  }
                  else{
                    echo '<img src="uploads/'.$latest_result['image_1'].'" class="news-main-img">';
                  }
                ?>
                <h6><?php echo $latest_result['news_title']?></h6>
                <p class="text-uppercase"><i class='bx bxs-show'></i> <?php echo $latest_result['news_date']?>&nbsp;&nbsp;&nbsp;<span class="text-danger"><i class='bx bxs-hot'></i>
                  <?php
                    if ($latest_result['clicks'] == "") {
                      echo '0';
                    }
                    else{
                      echo $latest_result['clicks'];
                    }
                  ?>
                </span></p>
              </div>
            </a>
            <?php
                }
              }
            ?>

            <?php
              $latest_sql2 = "SELECT * FROM news ORDER BY id DESC LIMIT 1, 4";
              $latest_res2 = mysqli_query($link, $latest_sql2);

              if (mysqli_num_rows($latest_res2) > 0) {
                while ($latest_result2 = mysqli_fetch_assoc($latest_res2)) {
            ?>
            <a href="new-view-news?newsid=<?php echo $latest_result2['id']?>&news_title=<?php echo $latest_result2['news_title']?>" class="text-secondary mt-10">
              <div class="news-flexer">
                <div class="news-flexer-left">
                  <?php
                    if ($latest_result2['image_1'] == "") {
                      echo '<img src="uploads/no-image.png" class="flexer-img">';
                    }
                    else{
                      echo '<img src="uploads/'.$latest_result2['image_1'].'" class="flexer-img">';
                    }
                  ?>
                </div>
                <div class="news-flexer-right">
                  <div>
                    <h6><?php echo $latest_result2['news_title']?></h6>
                    <p class="text-uppercase"><i class='bx bxs-show'></i> <?php echo $latest_result2['news_date']?>&nbsp;&nbsp;&nbsp;<span class="text-danger"><i class='bx bxs-hot'></i> 
                      <?php
                        if ($latest_result2['clicks'] == "") {
                          echo '0';
                        }
                        else{
                          echo $latest_result2['clicks'];
                        }
                      ?>
                    </span></p>
                  </div>
                </div>
              </div>
            </a>
            <?php
                }
              }
            ?>

            <hr>
            <h5>Old News</h5>

            <?php
              $latest_sql3 = "SELECT * FROM news ORDER BY id LIMIT 9";
              $latest_res3 = mysqli_query($link, $latest_sql3);

              if (mysqli_num_rows($latest_res3) > 0) {
                while ($latest_result3 = mysqli_fetch_assoc($latest_res3)) {
            ?>
            <a href="new-view-news?newsid=<?php echo $latest_result3['id']?>&news_title=<?php echo $latest_result3['news_title']?>" class="text-secondary mt-10">
              <div class="news-flexer">
                <div class="news-flexer-right">
                  <div>
                    <h6><?php echo $latest_result3['news_title']?></h6>
                    <p class="text-uppercase"><i class='bx bxs-show'></i> <?php echo $latest_result3['news_date']?>&nbsp;&nbsp;&nbsp;<span class="text-danger"><i class='bx bxs-hot'></i> 
                      <?php
                        if ($latest_result3['clicks'] == "") {
                          echo '0';
                        }
                        else{
                          echo $latest_result3['clicks'];
                        }
                      ?>
                    </span></p>
                  </div>
                </div>
              </div>
            </a>
            <?php
                }
              }
            ?>


          </div>
          <div class="news-item2">
            <?php
              $latest_sql4 = "SELECT * FROM news ORDER BY id DESC LIMIT 5, 1";
              $latest_res4 = mysqli_query($link, $latest_sql4);

              if (mysqli_num_rows($latest_res4) > 0) {
                while ($latest_result4 = mysqli_fetch_assoc($latest_res4)) {
            ?>
            <a href="new-view-news?newsid=<?php echo $latest_result4['id']?>&news_title=<?php echo $latest_result4['news_title']?>" class="text-secondary">
              <div class="news-main">
                <?php
                  if ($latest_result4['image_1'] == "") {
                    echo '<img src="uploads/no-image.png" class="news-main-img">';
                  }
                  else{
                    echo '<img src="uploads/'.$latest_result4['image_1'].'" class="news-main-img">';
                  }
                ?>
                <h2><?php echo $latest_result4['news_title']?></h2>
                <p></p>
                <p class="text-uppercase"><i class='bx bxs-show'></i> <?php echo $latest_result4['news_date']?>&nbsp;&nbsp;&nbsp;<span class="text-danger"><i class='bx bxs-hot'></i> 
                  <?php
                    if ($latest_result4['clicks'] == "") {
                      echo '0';
                    }
                    else{
                      echo $latest_result4['clicks'];
                    }
                  ?>
                </span></p>
              </div>
            </a>
            <?php
                }
              }
            ?>

            <div class="news-item-flex-main">
              <?php
                $latest_sql5 = "SELECT * FROM news ORDER BY id DESC LIMIT 6, 4";
                $latest_res5 = mysqli_query($link, $latest_sql5);

                if (mysqli_num_rows($latest_res5) > 0) {
                  while ($latest_result5 = mysqli_fetch_assoc($latest_res5)) {
              ?>
              <div class="news-item-flex-main-item">
                <a href="new-view-news?newsid=<?php echo $latest_result5['id']?>&news_title=<?php echo $latest_result5['news_title']?>" class="text-secondary">
                  <div class="news-main">
                    <?php
                      if ($latest_result5['image_1'] == "") {
                        echo '<img src="uploads/no-image.png" class="news-main-img">';
                      }
                      else{
                        echo '<img src="uploads/'.$latest_result5['image_1'].'" class="news-main-img">';
                      }
                    ?>
                    <h6><?php echo $latest_result5['news_title']?></h6>
                    <p class="text-uppercase"><i class='bx bxs-show'></i> <?php echo $latest_result5['news_date']?>&nbsp;&nbsp;&nbsp;<span class="text-danger"><i class='bx bxs-hot'></i> 
                      <?php
                        if ($latest_result5['clicks'] == "") {
                          echo '0';
                        }
                        else{
                          echo $latest_result5['clicks'];
                        }
                      ?>
                    </span></p>
                  </div>
                </a>
              </div>
              <?php
                  }
                }
              ?>
            </div>
          </div>
          <div class="news-item3">
            <h5>Recent News</h5>

            <?php
              $latest_sql6 = "SELECT * FROM news ORDER BY id DESC LIMIT 11, 6";
              $latest_res6 = mysqli_query($link, $latest_sql6);

              if (mysqli_num_rows($latest_res6) > 0) {
                while ($latest_result6 = mysqli_fetch_assoc($latest_res6)) {
            ?>
            <a href="new-view-news?newsid=<?php echo $latest_result6['id']?>&news_title=<?php echo $latest_result6['news_title']?>" class="text-secondary mt-10">
              <div class="news-flexer">
                <div class="news-flexer-left">
                  <?php
                    if ($latest_result6['image_1'] == "") {
                      echo '<img src="uploads/no-image.png" class="flexer-img">';
                    }
                    else{
                      echo '<img src="uploads/'.$latest_result6['image_1'].'" class="flexer-img">';
                    }
                  ?>
                </div>
                <div class="news-flexer-right">
                  <div>
                    <h6><?php echo $latest_result6['news_title']?></h6>
                    <p class="text-uppercase"><i class='bx bxs-show'></i> <?php echo $latest_result6['news_date']?>&nbsp;&nbsp;&nbsp;<span class="text-danger"><i class='bx bxs-hot'></i> 
                    <?php
                      if ($latest_result6['clicks'] == "") {
                        echo '0';
                      }
                      else{
                        echo $latest_result6['clicks'];
                      }
                    ?>
                    </span></p>
                  </div>
                </div>
              </div>
            </a>
            <?php
                }
              }
            ?>

            <hr>
            <h5>Socials</h5>

            <a href="" class="text-secondary mt-10">
              <div class="news-flexer">
                <div class="news-flexer-right">
                  <div>
                    <a href="https://web.facebook.com/cheapdevsph" class="text-primary"><i class='bx bxl-facebook-circle'></i> Facebook</a><br>
                    <a href="mailto:cheapdevsph@gmail.com" class="text-danger"><i class='bx bxl-google'></i> Google</a><br>
                    <a href="https://www.linkedin.com/in/mark-nicholas-razon-812996239?originalSubdomain=ph" class="text-info"><i class='bx bxl-linkedin' ></i> Linkedin</a>
                  </div>
                </div>
              </div>
            </a>

            <hr>
            <h5>More News</h5>

            <?php
              $latest_sql7 = "SELECT * FROM news ORDER BY rand() DESC LIMIT 9";
              $latest_res7 = mysqli_query($link, $latest_sql7);

              if (mysqli_num_rows($latest_res7) > 0) {
                while ($latest_result7 = mysqli_fetch_assoc($latest_res7)) {
            ?>
            <a href="new-view-news?newsid=<?php echo $latest_result7['id']?>&news_title=<?php echo $latest_result7['news_title']?>" class="text-secondary mt-10">
              <div class="news-flexer">
                <div class="news-flexer-right">
                  <div>
                    <h6><?php echo $latest_result7['news_title']?></h6>
                    <p class="text-uppercase"><i class='bx bxs-show'></i> <?php echo $latest_result7['news_date']?>&nbsp;&nbsp;&nbsp;<span class="text-danger"><i class='bx bxs-hot'></i> 
                      <?php
                      if ($latest_result7['clicks'] == "") {
                        echo '0';
                      }
                      else{
                        echo $latest_result7['clicks'];
                      }
                    ?>
                    </span></p>
                  </div>
                </div>
              </div>
            </a>
            <?php
                }
              }
            ?>

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