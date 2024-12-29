<?php
 session_start();
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
         am_pm = "PM";

         if (hour > 12) {
             hour -= 12;
             am_pm = "PM";
         }
         else if (hour == 0) {
             hr = 11;
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


      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

      <nav id="navbar" class="navbar">
        <ul>
        
          <li><a href="#" class="active">Home</a></li>
          
          
          <li class="dropdown"><a href="#"><span>All</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#"></a></li>
              
               
              </li>
              <li><a href="profile.php"><i class="bi bi-person-circle "></i>My Profile</a></li>
              <li><a href="watchlist.php"><i class="bi bi-binoculars-fill"></i>Watchlist</a></li>
              <li><a href="#"><i class="bi bi-alarm"></i>Purchasing History</a></li>
            </ul>
          </li>
          <li><a href="contact.html">Contact</a></li>
          <li class="d-none d-lg-block">
            <a href="cart.php"><img src="resource/cart.svg"></a>
            <span class="icon-button " style="font-size : 15px; ">2</span>
        </li>
        <li class="d-block d-lg-none">
            <a href="cart.php"><button class="btn btn-outline-warning">Go to cart</button></a>
            
        </li>
        <?php 
         
         
            if (isset($_SESSION["u"])) {
             
            
            ?>
          <li><a href="profile.php"><img src="resource/sl.jfif" width="50px" height="50px" class="rounded-circle" /></a></li>
          <li><a href="#"><button class="btn btn-outline-dark" onclick="Logout();"><b>Log Out</b></button></a></li>&nbsp;&nbsp;
          <?php


}else{

?>
 
 <span><li><a href="signin.php"><button class="btn btn-outline-info"><b>Log In</b></button></a></li></span>
          <span> <li><a href="signup.php"><button class="btn btn-dark"><b>Sign Up</b></button></a></li></span>&nbsp;&nbsp;
<?php



}
?>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header>
  <script src="script.js"></script>
</body>
</html>