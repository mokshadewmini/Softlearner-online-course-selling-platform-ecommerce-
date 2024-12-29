<?php
 session_start();

 if (isset($_SESSION["u"])) {
  $user = $_SESSION["u"]["email"]; 

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SoftLeaRNER | watchlist</title>
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

 
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  


</head>

<body  >

  <!-- ======= Header ======= -->
  
  <header id="header" class="header d-flex align-items-center fixed-top" style="background-color :#DE3163	;">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
  
    
    
      <a href="cart.php" class="logo d-flex align-items-center">
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
         }
         else if (hour == 0) {
             hr = 12;
             am_pm = "AM";
         }

         hour = hour < 10 ? "0" + hour : hour;
         min = min < 10 ? "0" + min : min;
         sec = sec < 10 ? "0" + sec : sec;

         let currentTime = hour + ":"
             + min + ":" + sec + am_pm;

         document.getElementById("clock")
             .innerHTML = currentTime;
     }

     showTime();
 </script>



        
        <!-- <img src="assets/img/logo.png" alt=""> -->
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h1 class="d-flex align-items-center">SoftLeaRNER<img src="resource/logo.png"></h1>
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
          <?php 
           require "connection.php";

                        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $user . "'");
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
          $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $user . "'");

          $image_data = $image_rs->fetch_assoc();
         
       ?>
          <li>
          <?php

if (empty($image_data["path"])) {

?>
    <a href="profile.php"><img src="resource/userprofile.svg" width="50px" height="50px" class="rounded-circle"   /></a>
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
  <section class="h-100 ">
  <div class="container py-5">
  <br/>
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 border border-1 border-primary rounded mb-2">
                            <div class="row">

                                <div class="col-12">
                                    <label class="form-label fs-1 fw-bolder">Watchlist &hearts;</label>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <hr />
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="offset-lg-2 col-12 col-lg-6 mb-3">
                                            <input type="text" class="form-control" placeholder="Search for anything..." id="basic_search_txt" button type="submit" />
                                            
                                        </div>
                                        <div class="col-12 col-lg-2 mb-3 d-grid">
                                            <button class="btn btn-primary"  onclick="basicSearch(0);">Search</button>
                                        </div>
                                    </div>
                                </div>
       
                                <hr />

<div class="col-12" id="basicSearchResult">
    <div class="row">
        
        
      
        <div class="row gy-5"></div>

                                <div class="col-12">
                                    <hr />
                                </div>

                                <div class="col-11 col-lg-2 border-0 border-end border-1 border-primary">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Watchlist</li>
                                        </ol>
                                    </nav>
                                    <nav class="nav nav-pills flex-column">
                                        <a class="nav-link active" aria-current="page" href="#">My Watchlist</a>
                                        <a class="nav-link" href="cart.php">My Cart</a>
                                        <a class="nav-link" href="#">Recents</a>
                                    </nav>
                                </div>

                                <?php
                               
                               

                                $watch_rs = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $user . "'");
                                $watch_num = $watch_rs->num_rows;

                                if ($watch_num == 0) {

                                ?>
                                    <!-- empty view -->
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-12 ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="resource/ev.jfif"/></div>
                                            <div class="col-12 text-center">
                                                <label class="form-label fs-1 fw-bold">You have no items in your Watchlist yet.</label>
                                            </div>
                                            <div class="offset-lg-4 col-12 col-lg-4 d-grid mb-3">
                                                <a href="home.php" class="btn btn-outline-warning fs-3 fw-bold">Start Shopping</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- empty view -->
                                    <?php

                                } else {
                                    ?>
                                    <div class="col-12 col-lg-9">
                                            <div class="row">
                                    <?php
                                    for ($x = 0; $x < $watch_num; $x++) {
                                        $watch_data = $watch_rs->fetch_assoc();
                                    ?>

                                        <!-- have Products -->
                                        

                                        <div class="card mb-3 mx-0 mx-lg-2 col-12">
                                                    <div class="row g-0">
                                                        <div class="col-md-4">
                                                        <?php
                                                            $img = array();

                                                            $images_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='".$watch_data["product_id"]."'");
                                                            $images_data = $images_rs->fetch_assoc();
                                                                
                                                            ?>
                                                            <img src="<?php echo $images_data["image_code"]; ?>" class="img-fluid rounded-start" style="height: 200px;" />
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="card-body">
                                                                <?php

                                                                $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$watch_data["product_id"]."'");
                                                                $product_data = $product_rs->fetch_assoc();
                                                                
                                                                ?>
                                                                <h5 class="card-title fs-2 fw-bold text-primary"><?php echo $product_data["title"]; ?></h5>
                                                                
                                                               
                                                                <br />
                                                                <span class="fs-5 fw-bold text-black-50">Price :</span>&nbsp;&nbsp;
                                                                <span class="fs-5 fw-bold text-black">Rs. <?php echo $product_data["price"]; ?> .00</span>
                                                                <br />
                                                                
                                                          
                                                               
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-5">
                                                            <div class="card-body d-lg-grid">
                                                            <a href='<?php echo "singleProductView.php?id=".$product_data["id"];?>' class="btn btn-outline-success mb-2">Buy Now</a>

                                                                <a href="#" class="btn btn-outline-warning mb-2" onclick='addToCart(<?php echo $product_data["id"]; ?>);'>Add To Cart</a>
                                                                <a href="#" class="btn btn-outline-danger" 
                                                                onclick='removeFromWatchlist(<?php echo $watch_data["id"]; ?>);'>  Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            

                                            
                                        <!-- have Products -->

                                <?php
                                    }
                                    ?>
                                    </div>
                                        </div>
                                    <?php
                                }

                                ?>





                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                
            <?php

            } else {
                echo ("Please Login First");
            }
            ?>
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
           