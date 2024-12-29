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

  <title>SoftLeaRNER | Profile</title>
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

<body  >

  <!-- ======= Header ======= -->
  
  <header id="header" class="header d-flex align-items-center fixed-top" style="background-color :#800080;">
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
       <?php
          $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $email . "'");

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
  <?php





    // $details_rs = Database::search("SELECT * FROM `users` INNER JOIN `profile_image` ON 
    // users.email=profile_image.users_email INNER JOIN `user_has_address` ON 
    // user_has_address.users_email=users.email INNER JOIN `city` ON 
    // user_has_address.city_id=city.id INNER JOIN `district` ON 
    // city.district_id=district.id INNER JOIN `province` ON 
    // district.province_id=province.id INNER JOIN `gender` ON 
    // gender.id=users.gender_id WHERE `email`='" . $email . "'");

    $details_rs = Database::search("SELECT * FROM `user` INNER JOIN `gender` ON 
     gender.id=user.gender_id WHERE `email`='" . $email . "'");

    $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $email . "'");


    $data = $details_rs->fetch_assoc();
    $image_data = $image_rs->fetch_assoc();
   

?>

  <section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            
            <li class="breadcrumb-item active" aria-current="page">My Profile</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
          <?php

if (empty($image_data["path"])) {

?>
    <img src="resource/userprofile.svg" class="rounded mt-5"  style="width: 150px;" id="viewImg" />
<?php

} else {

?>
    <img src="<?php echo $image_data["path"]; ?>" class="rounded mt-5"  style="width: 150px;" id="viewImg" />
<?php

}

?>
           
            <h5 class="my-3"><?php echo $data["fname"] . " " . $data["lname"]; ?></h5>
            <p class="text-muted mb-1"><?php echo $email; ?></p>
           
            <div class="d-flex justify-content-center mb-2">
              
            <input type="file" class="d-none" id="profileimg" accept="image/*" />
             <label for="profileimg" class="btn btn-primary mt-5" onclick="changeImage();"> Update Profile Image </label>

              
            </div>
          </div>
        </div>
        
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">First Name</p>
              </div>
              <div class="col-sm-9">
              
              <input type="text" class="form-control" value="<?php echo $data["fname"]; ?>" id="fname"/>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Last Name</p>
              </div>
              <div class="col-sm-9">
              
              <input type="text" class="form-control" value="<?php echo $data["lname"]; ?>" id="lname"/>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
              <input type="text" class="form-control" readonly value="<?php echo $data["email"]; ?>" />
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Password</p>
              </div>
              <div class="col-sm-9">
              <input type="password" class="form-control" readonly value="<?php echo $data["password"]; ?>" />
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile </p>
              </div>
              <div class="col-sm-9">
              <input type="text" class="form-control" value="<?php echo $data["mobile 01"]; ?>" id="mobile"/>
              </div>
            </div>
            <hr>
            
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
              <input type="text" class="form-control" value="<?php echo $data["address"]; ?>" id="address"/>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Registered Date</p>
              </div>
              <div class="col-sm-9">
              <input type="text" class="form-control" readonly value="<?php echo $data["joined_date"]; ?>" />
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Gender</p>
              </div>
              <div class="col-sm-9">
              <input type="text" class="form-control" readonly value="<?php echo $data["name"]; ?>" />
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-center mb-2 col-12">
              <button type="button" class="btn btn-primary" onclick="updateProfile();">Update My Profile </button>
              
            </div>
       
      </div>
    </div>
  </div>
</section>
<?php

            } else {
                header("Location:http://localhost/Nova/home.php");
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