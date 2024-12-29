<?php
session_start();

if (isset($_SESSION["u"])) {
  $email = $_SESSION["u"]["email"];

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SoftLeaRNER | Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="resource/s.jfif" rel="icon">
    <link href="resource/logo.png" rel="logo">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

    
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
    <div class="elfsight-app-dc91a690-65df-4cc2-9298-36545acaca5a" data-elfsight-app-lazy></div>
   
  </head>

  <body class="page-index ">

    <!-- ======= Header ======= -->

    <header id="header" class="header d-flex align-items-center fixed-top">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-between">



        <a href="home.php" class="logo d-flex align-items-center">
          <div class="text-light " id="clock">8:10:45</div>

          <script>
            setInterval(showTime, 1000);

            function showTime() {
              let time = new Date();
              let hour = time.getHours();
              let min = time.getMinutes();
              let sec = time.getSeconds();
              am_pm = "";

              if (hour > 12) {
                hour -= 12;
                am_pm = "PM";
              } else if (hour == 0) {
                hr = 12;
                am_pm = "AM";
              }

              hour = hour < 10 ? "0" + hour : hour;
              min = min < 10 ? "0" + min : min;
              sec = sec < 10 ? "0" + sec : sec;

              let currentTime = hour + ":" +
                min + ":" + sec + am_pm;

              document.getElementById("clock")
                .innerHTML = currentTime;
            }

            showTime();
          </script>




          <!-- <img src="assets/img/logo.png" alt=""> -->
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h1 class="d-flex align-items-center">SoftLeaRNER<img src="resource/logo.png"></h1>
        </a>

      </div>


      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

      <nav id="navbar" class="navbar">
        <ul>

          <li><a href="home.php" class="active">Home</a></li>


          <li class="dropdown"><a href="#"><span>All</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#"></a></li>


          </li>
          <li><a href="profile.php"><i class="bi bi-person-circle "></i>My Profile</a></li>
          <li><a href="watchlist.php"><i class="bi bi-binoculars-fill"></i>Watchlist</a></li>
          <li><a href="purchaseHistory.php"><i class="bi bi-alarm"></i>Purchasing History</a></li>
        </ul>
        </li>
        <li><a href="contact.php">Contact</a></li>
        <?php
        require "connection.php";

        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $email . "'");
        $cart_num = $cart_rs->num_rows;

        if ($cart_num == 0) {

        ?>
          <li class="d-none d-lg-block">
            <a href="cart.php"><img src="resource/cart.svg"></a>


          </li>

        <?php

        } else {
        ?>
          <li class="d-none d-lg-block">
            <a href="cart.php"><img src="resource/cart.svg"></a>

            <span class="icon-button " style="font-size : 15px; " window.location.reload();><?php echo $cart_num; ?></span>
          </li>
        <?php
        }
        ?>





        <li class="d-block d-lg-none">
          <a href="cart.php"><button class="btn btn-outline-warning">Go to cart</button></a>

        </li>

        </li>
        <?php
        $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $email . "'");

        $image_data = $image_rs->fetch_assoc();

        ?>
        <li>
          <?php

          if (empty($image_data["path"])) {

          ?>
            <a href="profile.php"><img src="resource/userprofile.svg" width="50px" height="50px" class="rounded-circle" /></a>
          <?php

          } else {

          ?>
            <a href="profile.php"><img src="<?php echo $image_data["path"]; ?>" width="50px" height="50px" class="rounded-circle" /></a>
          <?php

          }

          ?>
        </li>
        <li><a href="#"><button class="btn btn-outline-dark" onclick="Logout();"><b>Log Out</b></button></a></li>&nbsp;&nbsp;




        </ul>
      </nav><!-- .navbar -->

      </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
      <div class="container">
        <div class="row">

          <div class="col-xl-4">
            <h2 data-aos="fade-up">Great savings for a bright future</h2>
            <blockquote data-aos="fade-up" data-aos-delay="100">
              <p>Courses designed to help you reach your goals for less. Log in for special savings through tomorrow.</p>
            </blockquote>
            <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
              <a href="#about" class="btn-get-started">Get Started</a>

            </div>

          </div>
        </div>
      </div>
    </section><!-- End Hero Section -->

    <main id="main">

      <!-- ======= Why Choose Us Section ======= -->
      <section id="why-us" class="why-us">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>Why Choose Us</h2>

          </div>

          <div class="row g-0" data-aos="fade-up" data-aos-delay="200">

            <div class="col-xl-5 img-bg" style="background-image: url('assets/img/why-us-bg.jpg')"></div>
            <div class="col-xl-7 slides  position-relative">

              <div class="slides-1 swiper">
                <div class="swiper-wrapper">

                  <div class="swiper-slide">
                    <div class="item">
                      <h3 class="mb-3">Let's improve the knowledge about the online Platforms</h3>
                      <h4 class="mb-3">This is the Best Place for leaning about the Social media marketing with Sinhala Medium</h4>
                      <p>These courses are Excellent and can recommend to anyone who expects to learn correctly and practice to earn money online and discuss all aspects relevant to be master on the subject. These courses are mainly conducted in the "Sinhala" Language and we share our knowledge about making money online or online business opportunities, among the Sri Lankan people.</p>
                    </div>
                  </div><!-- End slide item -->

                  <div class="swiper-slide">
                    <div class="item">
                      <h3 class="mb-3">සබැඳි වේදිකා පිළිබඳ දැනුම වැඩි දියුණු කරමු</h3>
                      <h4 class="mb-3">සිංහල මාධ්‍ය සමඟ සමාජ මාධ්‍ය අලෙවිකරණයට නැඹුරු වීමට මෙය හොඳම ස්ථානයයි</h4>
                      <p>මෙම පාඨමාලා විශිෂ්ට වන අතර නිවැරදිව ඉගෙන ගැනීමට සහ අන්තර්ජාලය හරහා මුදල් ඉපැයීමට පුරුදු වීමට අපේක්ෂා කරන ඕනෑම කෙනෙකුට නිර්දේශ කළ හැකි, විෂය පිළිබඳ ප්‍රවීණයෙකු වීමට අදාළ සියලු අංශ සාකච්ඡා කරනු ඇත.
                        මෙම පාඨමාලා ප්‍රධාන වශයෙන් "සිංහල" භාෂාවෙන් පවත්වනු ලබන අතර, අන්තර්ජාලයෙන් මුදල් ඉපයීම හෝ අන්තර්ජාලය හරහා ව්‍යාපාරික අවස්ථා පිළිබඳ අපගේ දැනුම ශ්‍රී ලාංකික ජනතාව අතර බෙදා ගනිමු.
                      </p>
                    </div>
                  </div><!-- End slide item -->

                  <div class="swiper-slide">
                    <div class="item">
                      <h3 class="mb-3">Transform your life through education</h3>
                      <h4 class="mb-3"></h4>
                      <p>The best Instructors teach thousands of students on SoftLeaRNER.lk. We provide the tools and skills to learn what you love.</p>
                    </div>
                  </div><!-- End slide item -->

                  <div class="swiper-slide">
                    <div class="item">
                      <h3 class="mb-3">අධ්‍යාපනය තුළින් ඔබේ ජීවිතය සාර්ථක කරගන්න.</h3>
                      <h4 class="mb-3"></h4>
                      <p>හොඳම උපදේශකවරු SoftLeaRNER.lk හි සිසුන් දහස් ගණනකට උගන්වති. ඔබ ආදරය කරන දේ ඉගෙන ගැනීමට අපි මෙවලම් සහ කුසලතා සපයන්නෙමු.</p>
                    </div>
                  </div><!-- End slide item -->

                </div>
                <div class="swiper-pagination"></div>
              </div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-button-next"></div>
            </div>

          </div>

        </div>
      </section><!-- End Why Choose Us Section -->

      <!-- ======= Our Services Section ======= -->
      <section id="services-list" class="services-list">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>Our Services</h2>

          </div>

          <div class="row gy-5">

            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
              <div class="icon flex-shrink-0"><i class="bi bi-briefcase" style="color: #f57813;"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Responsibility</a></h4>
                <p class="description">It's our responsibility to give you an excellent service. So, we are 100% recommended you to be with us for gaining a value for your money as well as for your future.</p>
              </div>
            </div>
            <!-- End Service Item -->

            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
              <div class="icon flex-shrink-0"><i class="bi bi-card-checklist" style="color: #15a04a;"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Money back guarantee</a></h4>
                <p class="description">With in 3 days after your registration for the course, we will send your money back if you want or requested.</p>
              </div>
            </div><!-- End Service Item -->

            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <div class="icon flex-shrink-0"><i class="bi bi-telephone" style="color: #d90769;"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Contact Us</a></h4>
                <p class="description">You can email or contact our department if you have any problem regarding our courses.</p>
              </div>
            </div><!-- End Service Item -->

            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <div class="icon flex-shrink-0"><i class="bi bi-flower1" style="color: #15bfbc;"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Faithfulness</a></h4>
                <p class="description">We guaranteed that you can sure us and we will contact or reply you within 24 hours if you have any problem.</p>
              </div>
            </div><!-- End Service Item -->

            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="500">
              <div class="icon flex-shrink-0"><i class="bi bi-brightness-high" style="color: #f5cf13;"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Recommendation</a></h4>
                <p class="description">We are recommended to give you all the tools which needs you and all these courses for beginners of digital and social media marketing and coding.</p>
              </div>
            </div><!-- End Service Item -->

            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="600">
              <div class="icon flex-shrink-0"><i class="bi bi-gift" style="color: #1335f5;"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Gifts</a></h4>
                <p class="description">12 hours on-demand video and we will give you 5 downloadable resources.We allow the videos full lifetime access and access on mobile and TV. Everyone can have a valuable e-certificate after completing each course.</p>
              </div>
            </div><!-- End Service Item -->

          </div>

        </div>
      </section><!-- End Our Services Section -->

      <!-- ======= Call To Action Section ======= -->
      <section id="call-to-action" class="call-to-action">
        <div class="container" data-aos="fade-up">
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
              <h3>Welcome to SoftLeaRNER.lk</h3>
              <p>Learners around the world are launching new careers, advancing in their fields, and enriching their lives.</p>
              <a class="cta-btn" href="#">Start Now</a>
            </div>
          </div>

        </div>
      </section><!-- End Call To Action Section -->



      <!-- ======= course listing ======= -->
      <section id="recent-posts" class="recent-posts">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>Our Courses</h2>
            <div class="col-12 col-lg-10">

              <div class="input-group mt-3 mb-3">
                <input type="text" class="form-control" placeholder="Search" id="basic_search_txt" button type="submit">
                <button class="btn btn-primary" onclick="basicSearch(0);"><i class="bi bi-search"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-info" onclick="clearSort();">Clear Search</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="advancedSearch.php" class="link-secondary text-decoration-none fw-bold">Advanced</a>
                <form action="" class="mt-3">
                </form>
              </div>

              <br />

            </div>
            <hr />

            <div class="col-12" id="basicSearchResult">
              <div class="row">



                <div class="row gy-5">

                  <?php


                  $product_rs = Database::search("SELECT * FROM `product` WHERE
`status_id`='1' ORDER BY `datetime_added` DESC LIMIT 10  OFFSET 0");
                  $product_num = $product_rs->num_rows;

                  for ($z = 0; $z < $product_num; $z++) {

                    $product_data = $product_rs->fetch_assoc();

                  ?>

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">

                      <?php


                      $images_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $product_data["id"] . "'");
                      $images_data = $images_rs->fetch_assoc();

                      ?>

                      <p class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="<?php echo $product_data["description"]; ?>
                                                    <?php echo $product_data["datetime_added"]; ?>" title="Course Details">
                        <img src="<?php echo $images_data["image_code"]; ?>" class="img-fluid rounded-start" style="height: 200px;" />
                      </p>

                      <div class="post-box">

                        <div class="meta">
                          <span class="post-date" style="font-size: 14px;"><i class="bi bi-patch-exclamation-fill"></i>Last updated <?php echo $product_data["datetime_added"]; ?></span>
                          <span class="post-author"> </span>
                        </div>
                        <h3 class="post-title"><?php echo $product_data["title"]; ?> </h3>

                        <h6 style="font-size: 12px;"><i class="bi bi-award"></i>by softlearner </h6>
                        <h6>Rs. <?php echo $product_data["price"]; ?> .00</h6>
                        <a href='<?php echo "singleProductView.php?id=" . $product_data["id"]; ?>'><button class="col-12 btn btn-success">Buy Now</button></a>
                        <br />
                        <div class=" col-12 col-lg-12">
                          <div class="row">
                            <div class="col-10 col-lg-6 offset-1">
                              <div class="row g-2">
                              <?php
                                $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $product_data["id"] . "' AND 
`user_email`='" . $_SESSION["u"]["email"] . "'");
                                $cart_num = $cart_rs->num_rows;

                                if ($cart_num == 1) {
                                ?>
 
                                <a href="cart.php"><h6>View Cart</h6></a>
                                <?php
                                } else {
                                ?>
                                <button class="btn btn-outline-warning fw-bold" onclick='addToCart(<?php echo $product_data["id"]; ?>);'><i class="bi bi-cart-plus" style="font-size: 23px; color:#E30B5C;"></i></button>
                                <?php
                                }

                                ?>
                              </div>
                            </div>


                            <div class="col-10 col-lg-4 offset-1">
                              <div class="row g-2">
                                <?php
                                $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $product_data["id"] . "' AND 
`user_email`='" . $_SESSION["u"]["email"] . "'");
                                $watchlist_num = $watchlist_rs->num_rows;

                                if ($watchlist_num == 1) {
                                ?>
                                  <button class="btn btn-light fw-bold" onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'>
                                    <i class="bi bi-suit-heart-fill text-danger" style="font-size: 23px;" id='heart<?php echo $product_data["id"]; ?>'></i>
                                  </button>
                                <?php
                                } else {
                                ?>
                                  <button class="btn btn-light fw-bold" onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'>
                                    <i class="bi bi-suit-heart text-dark " style="font-size: 23px;" id='heart<?php echo $product_data["id"]; ?>'></i>
                                  </button>
                                <?php
                                }

                                ?>

                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>

                  <?php
                  }
                  ?>







      </section><!-- End course listing -->

      </div>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

      <div class="footer-content">
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-info">
              <a href="index.html" class="logo d-flex align-items-center">
                <span>SoftLeaRNER.lk<img src="resource/logo.png"></span>
              </a>
              <p>Here we are the SoftLeaRNER.lk&trade; to support you for accomplish your desire by giving high
                quality service with an advance teaching methods in Sinhala medium.</p>
              <div class="social-links d-flex  mt-3">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>

            <div class="col-lg-2 col-6 footer-links">
              <h4></h4>
              <ul>
                <li> <a href="#"></a></li>
                <li> <a href="#"></a></li>
                <li> <a href="#"></a></li>
                <li> <a href="#"></a></li>

              </ul>
            </div>

            <div class="col-lg-2 col-6 footer-links">
              <h4></h4>
              <ul>
                <li> <a href="#"></a></li>
                <li> <a href="#"></a></li>
                <li> <a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
              </ul>
            </div>

            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
              <h4>Contact Us</h4>
              <p>
                Wellawattha, Colombo 06, Sri Lanka <br><br>
                <strong><i class="bi bi-telephone-fill"></i>&nbsp;Phone:</strong> +94112 4445558<br>
                <strong><i class="bi bi-envelope-fill"></i>&nbsp;Email:</strong> softlearner@gmail.com<br>

                <!--<li> <a href="#">Privacy policy</a></li>-->
              </p>

            </div>

          </div>
        </div>
      </div>
      </div>
      </div>

      </head>

      <body>

        <p id="demo"></p>



        <div class="footer-legal">
          <div class="container">
            <div class="copyright">
              &copy;2024 Copyright <strong><span>SoftLeaRNER.lk</span></strong>. All Rights Reserved
            </div>

          </div>
        </div>
    </footer><!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>



    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="script.js"></script>
    <script>
      var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
      var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
      })
    </script>

  </body>

  </html>


<?php

} else {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SoftLeaRNER | Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="resource/s.jfif" rel="icon">
    <link href="resource/logo.png" rel="logo">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">


    <!-- =======================================================
* Template Name: Nova - v1.2.1
* Template URL: https://bootstrapmade.com/nova-bootstrap-business-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
======================================================== -->
  </head>

  <body class="page-index ">

    <!-- ======= Header ======= -->

    <header id="header" class="header d-flex align-items-center fixed-top">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-between">



        <a href="home.php" class="logo d-flex align-items-center">
          <div class="text-light " id="clock">8:10:45</div>

          <script>
            setInterval(showTime, 1000);

            function showTime() {
              let time = new Date();
              let hour = time.getHours();
              let min = time.getMinutes();
              let sec = time.getSeconds();
              am_pm = "AM";

              if (hour > 12) {
                hour -= 12;
                am_pm = "PM";
              } else if (hour == 0) {
                hr = 12;
                am_pm = "AM";
              }

              hour = hour < 10 ? "0" + hour : hour;
              min = min < 10 ? "0" + min : min;
              sec = sec < 10 ? "0" + sec : sec;

              let currentTime = hour + ":" +
                min + ":" + sec + am_pm;

              document.getElementById("clock")
                .innerHTML = currentTime;
            }

            showTime();
          </script>




          <!-- <img src="assets/img/logo.png" alt=""> -->
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h1 class="d-flex align-items-center">SoftLeaRNER<img src="resource/logo.png"></h1>
        </a>

      </div>


      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

      <nav id="navbar" class="navbar">
        <ul>

          <li><a href="#" class="active">Home</a></li>


          <li class="dropdown"><a href="#"><span>All</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#"></a></li>


          </li>
          <li><a href="#"><i class="bi bi-person-circle "></i>My Profile</a></li>
          <li><a href="#"><i class="bi bi-binoculars-fill"></i>Watchlist</a></li>
          <li><a href="#"><i class="bi bi-alarm"></i>Purchasing History</a></li>
        </ul>
        </li>
        <li><a href="#">Contact</a></li>





        </li>




        <?php





        ?>


        <span>
          <li><a href="signin.php"><button class="btn btn-outline-info"><b>Log In</b></button></a></li>
        </span>
        <span>
          <li><a href="signup.php"><button class="btn btn-dark"><b>Sign Up</b></button></a></li>
        </span>&nbsp;&nbsp;

        </ul>
      </nav><!-- .navbar -->

      </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
      <div class="container">
        <div class="row">

          <div class="col-xl-4">
            <h2 data-aos="fade-up">Great savings for a bright future</h2>
            <blockquote data-aos="fade-up" data-aos-delay="100">
              <p>Courses designed to help you reach your goals for less. Log in for special savings through tomorrow.</p>
            </blockquote>
            <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
              <a href="#about" class="btn-get-started">Get Started</a>
            
            </div>

          </div>
        </div>
      </div>
    </section><!-- End Hero Section -->

    <main id="main">

      <!-- ======= Why Choose Us Section ======= -->
      <section id="why-us" class="why-us">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>Why Choose Us</h2>

          </div>

          <div class="row g-0" data-aos="fade-up" data-aos-delay="200">

            <div class="col-xl-5 img-bg" style="background-image: url('assets/img/why-us-bg.jpg')"></div>
            <div class="col-xl-7 slides  position-relative">

              <div class="slides-1 swiper">
                <div class="swiper-wrapper">

                  <div class="swiper-slide">
                    <div class="item">
                      <h3 class="mb-3">Let's improve the knowledge about the online Platforms</h3>
                      <h4 class="mb-3">This is the Best Place for leaning about the Social media marketing with Sinhala Medium</h4>
                      <p>These courses are Excellent and can recommend to anyone who expects to learn correctly and practice to earn money online and discuss all aspects relevant to be master on the subject. These courses are mainly conducted in the "Sinhala" Language and we share our knowledge about making money online or online business opportunities, among the Sri Lankan people.</p>
                    </div>
                  </div><!-- End slide item -->

                  <div class="swiper-slide">
                    <div class="item">
                      <h3 class="mb-3">සබැඳි වේදිකා පිළිබඳ දැනුම වැඩි දියුණු කරමු</h3>
                      <h4 class="mb-3">සිංහල මාධ්‍ය සමඟ සමාජ මාධ්‍ය අලෙවිකරණයට නැඹුරු වීමට මෙය හොඳම ස්ථානයයි</h4>
                      <p>මෙම පාඨමාලා විශිෂ්ට වන අතර නිවැරදිව ඉගෙන ගැනීමට සහ අන්තර්ජාලය හරහා මුදල් ඉපැයීමට පුරුදු වීමට අපේක්ෂා කරන ඕනෑම කෙනෙකුට නිර්දේශ කළ හැකි, විෂය පිළිබඳ ප්‍රවීණයෙකු වීමට අදාළ සියලු අංශ සාකච්ඡා කරනු ඇත.
                        මෙම පාඨමාලා ප්‍රධාන වශයෙන් "සිංහල" භාෂාවෙන් පවත්වනු ලබන අතර, අන්තර්ජාලයෙන් මුදල් ඉපයීම හෝ අන්තර්ජාලය හරහා ව්‍යාපාරික අවස්ථා පිළිබඳ අපගේ දැනුම ශ්‍රී ලාංකික ජනතාව අතර බෙදා ගනිමු.
                      </p>
                    </div>
                  </div><!-- End slide item -->

                  <div class="swiper-slide">
                    <div class="item">
                      <h3 class="mb-3">Transform your life through education</h3>
                      <h4 class="mb-3"></h4>
                      <p>The best Instructors teach thousands of students on SoftLeaRNER.lk. We provide the tools and skills to learn what you love.</p>
                    </div>
                  </div><!-- End slide item -->

                  <div class="swiper-slide">
                    <div class="item">
                      <h3 class="mb-3">අධ්‍යාපනය තුළින් ඔබේ ජීවිතය සාර්ථක කරගන්න.</h3>
                      <h4 class="mb-3"></h4>
                      <p>හොඳම උපදේශකවරු SoftLeaRNER.lk හි සිසුන් දහස් ගණනකට උගන්වති. ඔබ ආදරය කරන දේ ඉගෙන ගැනීමට අපි මෙවලම් සහ කුසලතා සපයන්නෙමු.</p>
                    </div>
                  </div><!-- End slide item -->

                </div>
                <div class="swiper-pagination"></div>
              </div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-button-next"></div>
            </div>

          </div>

        </div>
      </section><!-- End Why Choose Us Section -->

      <!-- ======= Our Services Section ======= -->
      <section id="services-list" class="services-list">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>Our Services</h2>

          </div>

          <div class="row gy-5">

            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
              <div class="icon flex-shrink-0"><i class="bi bi-briefcase" style="color: #f57813;"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Responsibility</a></h4>
                <p class="description">It's our responsibility to give you an excellent service. So, we are 100% recommended you to be with us for gaining a value for your money as well as for your future.</p>
              </div>
            </div>
            <!-- End Service Item -->

            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
              <div class="icon flex-shrink-0"><i class="bi bi-card-checklist" style="color: #15a04a;"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Money back guarantee</a></h4>
                <p class="description">With in 3 days after your registration for the course, we will send your money back if you want or requested.</p>
              </div>
            </div><!-- End Service Item -->

            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <div class="icon flex-shrink-0"><i class="bi bi-telephone" style="color: #d90769;"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Contact Us</a></h4>
                <p class="description">You can email or contact our department if you have any problem regarding our courses.</p>
              </div>
            </div><!-- End Service Item -->

            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <div class="icon flex-shrink-0"><i class="bi bi-flower1" style="color: #15bfbc;"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Faithfulness</a></h4>
                <p class="description">We guaranteed that you can sure us and we will contact or reply you within 24 hours if you have any problem.</p>
              </div>
            </div><!-- End Service Item -->

            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="500">
              <div class="icon flex-shrink-0"><i class="bi bi-brightness-high" style="color: #f5cf13;"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Recommendation</a></h4>
                <p class="description">We are recommended to give you all the tools which needs you and all these courses for beginners of digital and social media marketing and coding.</p>
              </div>
            </div><!-- End Service Item -->

            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="600">
              <div class="icon flex-shrink-0"><i class="bi bi-gift" style="color: #1335f5;"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Gifts</a></h4>
                <p class="description">12 hours on-demand video and we will give you 5 downloadable resources.We allow the videos full lifetime access and access on mobile and TV. Everyone can have a valuable e-certificate after completing each course.</p>
              </div>
            </div><!-- End Service Item -->

          </div>

        </div>
      </section><!-- End Our Services Section -->

      <!-- ======= Call To Action Section ======= -->
      <section id="call-to-action" class="call-to-action">
        <div class="container" data-aos="fade-up">
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
              <h3>Welcome to SoftLeaRNER.lk</h3>
              <p>Learners around the world are launching new careers, advancing in their fields, and enriching their lives.</p>
              <a class="cta-btn" href="#">Start Now</a>
            </div>
          </div>

        </div>
      </section><!-- End Call To Action Section -->



      <!-- ======= Recent Blog Posts Section ======= -->
      <section id="recent-posts" class="recent-posts">
        <div class="container" data-aos="fade-up">


          <div class="section-header">
            <h2>Our Courses</h2>
            <div class="col-12 col-lg-6">

              <div class="input-group mt-3 mb-3">
                <input type="text" class="form-control" placeholder="Search" id="basic_search_txt" button type="submit">
                <button class="btn btn-primary" onclick="basicSearch(0);"><i class="bi bi-search"></i></button>
                <form action="" class="mt-3">
                </form>
              </div>
              <br />

            </div>
            <hr />

            <div class="col-12" id="basicSearchResult">
              <div class="row gy-5">



                <div class="row gy-5">

                  <?php
                  require "connection.php";

                  $product_rs = Database::search("SELECT * FROM `product` WHERE
`status_id`='1' ORDER BY `datetime_added` DESC LIMIT 10  OFFSET 0");
                  $product_num = $product_rs->num_rows;

                  for ($z = 0; $z < $product_num; $z++) {

                    $product_data = $product_rs->fetch_assoc();

                  ?>

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">

                      <?php


                      $images_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $product_data["id"] . "'");
                      $images_data = $images_rs->fetch_assoc();

                      ?>



                      <p class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="<?php echo $product_data["description"]; ?>
                                                    <?php echo $product_data["datetime_added"]; ?>" title="Course Details">
                        <img src="<?php echo $images_data["image_code"]; ?>" class="img-fluid rounded-start" style="height: 200px;" />
                      </p>














                      <div class="post-box">

                        <div class="meta">
                          <span class="post-date" style="font-size: 14px;"><i class="bi bi-patch-exclamation-fill"></i>Last updated <?php echo $product_data["datetime_added"]; ?></span>
                          <span class="post-author"> </span>
                        </div>
                        <h3 class="post-title"><?php echo $product_data["title"]; ?> </h3>

                        <h6 style="font-size: 12px;"><i class="bi bi-award"></i>by softlearner </h6>
                        <h6>Rs. <?php echo $product_data["price"]; ?> .00</h6>
                        <a href="signin.php"><button class="col-12 btn btn-success">Buy Now</button></a>
                        <br />

                      </div>
                    </div>

                  <?php
                  }
                  ?>







      </section><!-- End Recent Blog Posts Section -->

      </div>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

      <div class="footer-content">
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-info">
              <a href="index.html" class="logo d-flex align-items-center">
                <span>SoftLeaRNER.lk<img src="resource/logo.png"></span>
              </a>
              <p>Here we are the SoftLeaRNER.lk&trade; to support you for accomplish your desire by giving high
                quality service with an advance teaching methods in Sinhala medium.</p>
              <div class="social-links d-flex  mt-3">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>

            <div class="col-lg-2 col-6 footer-links">
              <h4></h4>
              <ul>
                <li> <a href="#"></a></li>
                <li> <a href="#"></a></li>
                <li> <a href="#"></a></li>
                <li> <a href="#"></a></li>

              </ul>
            </div>

            <div class="col-lg-2 col-6 footer-links">
              <h4></h4>
              <ul>
                <li> <a href="#"></a></li>
                <li> <a href="#"></a></li>
                <li> <a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
              </ul>
            </div>

            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
              <h4>Contact Us</h4>
              <p>
                Wellawattha, Colombo 06, Sri Lanka <br><br>
                <strong><i class="bi bi-telephone-fill"></i>&nbsp;Phone:</strong> +94112 4445558<br>
                <strong><i class="bi bi-envelope-fill"></i>&nbsp;Email:</strong> softlearner@gmail.com<br>

                <!-- <li> <a href="#">Privacy policy</a></li>-->
              </p>

            </div>

          </div>
        </div>
      </div>
      </div>
      </div>

      </head>

      <body>

        <p id="demo"></p>



        <div class="footer-legal">
          <div class="container">
            <div class="copyright">
              &copy;2024 Copyright <strong><span>SoftLeaRNER.lk</span></strong>. All Rights Reserved
            </div>

          </div>
        </div>
    </footer><!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>



    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="script.js"></script>
    <script>
      var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
      var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
      })
    </script>

  </body>

  </html>

<?php
}

?>