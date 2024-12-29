<?php
session_start();

if (isset($_SESSION["u"])) {
  $email = $_SESSION["u"]["email"];

  require "connection.php";

  if (isset($_GET["id"])) {

    $pid = $_GET["id"];


    $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid. "'");
    $product_num = $product_rs->num_rows;

    if ($product_num == 1) {


      $product_data = $product_rs->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
 

  <title><?php echo $product_data["title"]; ?> | SoftLeaRNER </title>
 
  

  <!-- Favicons -->
  <link href="resource/s.jfif" rel="icon">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com">

  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
 
  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  
  
 
</head>

<body >

  <!-- ======= Header ======= -->
  
  <header id="header" class="header d-flex align-items-center fixed-top" >
    
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
  
    
    
      <a href="" class="logo d-flex align-items-center">
    
 

      


        
        <!-- <img src="assets/img/logo.png" alt=""> -->
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h1 class="d-flex align-items-center">SoftLeaRNER<img src="resource/logo.png"><h6><?php echo $product_data["title"]; ?></h6></h1>
      </a>
      
</div>


      
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
          
           
        </li>
       
      


        


       
       
          <li>
          <?php
      $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $email . "'");

      $image_data = $image_rs->fetch_assoc();

          ?>
          <li>
          <?php

      if (empty($image_data["path"])) {

          ?>
    <a href="#"><img src="resource/userprofile.svg" width="50px" height="50px" class="rounded-circle"   /></a>
<?php

      } else {

?>
    <a href="#"><img src="<?php echo $image_data["path"]; ?>" width="50px" height="50px" class="rounded-circle" /></a>
<?php

      }

?>
            </li>
          </li>
          <li><a href="#"><button class="btn btn-outline-dark" onclick="Logout();"><b>Log Out</b></button></a></li>&nbsp;&nbsp;
         
 
 

        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">
   

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" >
      <div class="container position-relative d-flex flex-column ">
<h2 style="color: white;"><?php echo $product_data["title"]; ?></h2>
<h5><?php echo $product_data["title 2"]; ?></h5>
<h6 style="color: #0096FF;">123 students</h6>
<h6 style="color: white;"><i class="bi bi-patch-exclamation-fill"></i>&nbsp;Last updated&nbsp;<?php echo $product_data["datetime_added"]; ?></h6>
<h6>by SoftLeaRNER.lk</h6>
        

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

            <div class="blog-details">
            <?php
      $image_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $pid . "'");
      $image_num = $image_rs->num_rows;
      $image_data = $image_rs->fetch_assoc();
            ?>
              <div class="post-img">
                <img src="<?php echo $image_data["image_code"]; ?>" alt="" class="img-fluid">
              </div>

              <h2 class="title"><?php echo $product_data["title"]; ?></h2>

              <div class="meta-top">
                <ul>
                 
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><?php echo $product_data["datetime_added"]; ?></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#">12 Comments</a></li>
                </ul>
              </div><!-- End meta top -->

              <div class="content" >
                <h4 style="color: green;">
                  You will learn
 </h4>
                <p>
                <?php echo $product_data["you_learn"]; ?>
                </p>
                <h4 style="color: green;">
            Requirements     
 </h4>
              

                <p>
                <?php echo $product_data["requirements"]; ?>
                </p>

                <h3> Description</h3>
                <p>
                <?php echo $product_data["description"]; ?>
                </p>
                
              </div><!-- End post content -->

              <div class="meta-bottom">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li><a href="#">Total Lessons&nbsp;<?php echo $product_data["lessons"]; ?></a></li>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  
                  <li><a href="#">Total hours&nbsp;<?php echo $product_data["tot_hours"]; ?></a></li>
                </ul>
              </div><!-- End meta bottom -->

     </div><!-- End blog post -->

            <div class="post-author d-flex align-items-center">
             
              <div>
                <h4>Approved Payment methods</h4>
              
                <p>
                  <img src="resource/mc.png"/>
                  <img src="resource/visa.png"/>
                  <img src="resource/ae.png"/>
                </p>
              </div>
            </div><!-- End post author -->

            <div class="comments">

              <h4 class="comments-count">Feedbacks&nbsp;<i class="bi bi-reply-fill"></i></h4>

           
              <div id="comment-2" class="comment">
                

               

              </div><!-- End comment #2-->

           

              <div id="comment-4" class="comment">
                <div class="d-flex">
                  <div class="comment-img"><img src="assets/img/blog/comments-6.jpg" alt=""></div>
                  <div>
                    <h5><a href="">Kay Duggan</a>  <span class="badge bg-success">Positive</span></a></h5>
                    <time datetime="2020-01-01">01 Jan,2022</time>
                    <p>
                      Amazing course
                    </p>
                  </div>
                </div>

              </div><!-- End comment #4 -->
              
              <hr/>
                <h2 class="d-none d-lg-block">You might be also like...</h2>
             
            </div><!-- End blog comments -->

          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">

            <div class="sidebar ps-lg-4">

           

           

              <div class="sidebar-item recent-posts">
              <div class="row border-bottom border-dark">
                                                    <nav aria-label="breadcrumb">
                                                        <ol class="breadcrumb">
                                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                            <li class="breadcrumb-item active" aria-current="page">Single Product View</li>
                                                        </ol>
                                                    </nav>
                                                </div>

                                                <div class="row border-bottom border-dark">
                                                    <div class="col-12 my-2">
                                                        <span class="fs-4 text-success fw-bold"><?php echo $product_data["title"]; ?></span>
                                                    </div>
                                                </div>

                                                <div class="row border-bottom border-dark">
                                                    <div class="col-12 my-2">
                                                        <span class="badge">
                                                            <i class="bi bi-star-fill text-warning fs-25"></i>
                                                            <i class="bi bi-star-fill text-warning fs-25"></i>
                                                            <i class="bi bi-star-fill text-warning fs-25"></i>
                                                            <i class="bi bi-star-fill text-warning fs-25"></i>
                                                            <i class="bi bi-star-fill text-warning fs-25"></i>

                                                            &nbsp;&nbsp;

                                                            <label class="fs-25 text-dark fw-bold">4.5 Stars | 39 Reviews & Ratings</label>
                                                        </span>
                                                    </div>
                                                </div>

                                                <?php

      $price = $product_data["price"];
      $adding_price = ($price / 100) * 5;
      $new_price = $price + $adding_price;
      $difference = $new_price - $price;
      $percentage = ($difference / $price) * 100;

                                                ?>

                                                <div class="row border-bottom border-dark">
                                                    <div class="col-12 my-2">
                                                        <span class="fs-10 fw-bold text-dark">Rs. <?php echo $price; ?> .00</span>
                                                        &nbsp;&nbsp; | &nbsp;&nbsp;
                                                        <span class="fs-10 fw-bold text-danger text-decoration-line-through">Rs. <?php echo $new_price; ?> .00</span>
                                                        &nbsp;&nbsp; | &nbsp;&nbsp;
                                                        <span class="fs-10 fw-bold text-black-50">Save Rs. <?php echo $difference; ?> .00 (<?php echo $percentage; ?>%)</span>
                                                    </div>
                                                </div>

                                               

                                               

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="my-2 col-12 col-lg-12 border border-1 border-danger rounded">
                                                                <div class="row">
                                                                    <div class="col-3 col-lg-2 border-end border-2 border-danger">
                                                                        <img src="resource/pricetag (1).png" style="height: 40px; width: 40px;"/>
                                                                    </div>
                                                                    <div class="col-9 col-lg-10">
                                                                        <span class="fs-40 text-danger fw-bold">
                                                                            Stand a chance to get 5% discount by using VISA or MASTER
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-12 my-2">
                                                                <div class="row g-2">


                                                                    <div class="row">
                                                                        <div class="col-12 mt-5">
                                                                            <div class="row">
                                                                            <div class="col-4 d-grid">
                                                                                    <button class="btn btn-success" type="submit" id="payhere-payment" onclick="payNow(<?php echo $pid; ?>);"> Buy Now</button>
                                                                                </div>
                                                                                <div class="col-4 d-grid">
                                                                                    <button class="btn btn-warning" onclick='addToCart(<?php echo $product_data["id"]; ?>);'><i class="bi bi-cart-plus" style="font-size: 23px; color:#E30B5C;"></i></button>
                                                                                </div>
                                                                                <div class="col-4 d-grid">
                                                                                    <button class="btn btn-light">
                                                                                    <?php
 $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $product_data["id"] . "' AND 
`user_email`='" . $_SESSION["u"]["email"] . "'");
$watchlist_num = $watchlist_rs->num_rows;

if ($watchlist_num == 1) {
?>
       <button class="btn btn-light fw-bold" 
        onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'>
        <i class="bi bi-suit-heart-fill text-danger" style="font-size: 23px;" id='heart<?php echo $product_data["id"]; ?>'></i>
    </button>
<?php
} else {
?>
     <button class="btn btn-light fw-bold"
        onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'>
        <i class="bi bi-suit-heart text-dark " style="font-size: 23px;" id='heart<?php echo $product_data["id"]; ?>'></i>
    </button>
<?php
}

?>
                                                              
                                                                                     
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    

              </div><!-- End sidebar recent posts-->

              

            </div><!-- End Blog Sidebar -->

          </div>
        </div>

      </div>
                      <hr/>
                <h2 class="d-lg-none">You might be also like...</h2>
    </section><!-- End Blog Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <!-- ======= Footer ======= -->




<body class="page-index ">
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
            <strong><i class="bi bi-telephone-fill"></i>&nbsp;Phone:</strong>  +94112 4445558<br>
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
<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>



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
      echo ("Sorry for the Inconvenience");
    }
  } else {
    echo ("Something went wrong");
  }
}

?>