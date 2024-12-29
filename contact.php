<?php

session_start();

if (isset($_SESSION["u"])) {
 $email = $_SESSION["u"]["email"];
$total =0;
?>
 
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="utf-8">
 <meta content="width=device-width, initial-scale=1.0" name="viewport">

 <title>SoftLeaRNER | Cart</title>
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
 
 <header id="header" class="header d-flex align-items-center fixed-top" ">
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
       
         <li><a href="home.php" >Home</a></li>
         
         
         <li class="dropdown"><a href="#"><span>All</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
         
           <ul>
             <li><a href="#"></a></li> 
             
              
           
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

 <section class="h-100 " style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: url('https://i.pinimg.com/736x/e7/86/d1/e786d12c17b3a3c4241516721dddd3ef.jpg') no-repeat center center fixed; background-size: cover; padding: 20px; display: flex; justify-content: center; align-items: center; height: 100vh;">
 <div class="container py-5" >

 


    <div style="max-width: 600px; width: 100%; background-color: rgba(255, 255, 255, 0.9); border: 1px solid #dddddd; padding: 30px; border-radius: 10px; box-shadow: 0 4px 16px rgba(0,0,0,0.1);">
        <div style="text-align: center; margin-bottom: 20px;">
    
        </div>
        <h2 style="color: #333333; text-align: center;">Contact Us</h2>
        
            <div style="margin-bottom: 15px;">
                <label for="name" style="display: block; color: #555555; margin-bottom: 5px; font-weight: bold;">Name:</label>
                <input type="text" id="name" name="name" style="width: 100%; padding: 12px; border: 1px solid #cccccc; border-radius: 5px; box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);" readonly value="<?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?>">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="email" style="display: block; color: #555555; margin-bottom: 5px; font-weight: bold;">Email:</label>
                <input type="email" id="email" name="email" style="width: 100%; padding: 12px; border: 1px solid #cccccc; border-radius: 5px; box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);" readonly value="<?php echo $email; ?>">
            </div>
            <div style="margin-bottom: 15px;">
                <label  style="display: block; color: #555555; margin-bottom: 5px; font-weight: bold;">Subject:</label>
                <input type="text" id="subject"  style="width: 100%; padding: 12px; border: 1px solid #cccccc; border-radius: 5px; box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);">
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; color: #555555; margin-bottom: 5px; font-weight: bold;">Message:</label>
                <textarea id="message" style="width: 100%; padding: 12px; border: 1px solid #cccccc; border-radius: 5px; box-shadow: inset 0 1px 3px rgba(0,0,0,0.1); height: 150px;"></textarea>
            </div>
            <div style="text-align: center;">
                <button type="submit" style="background-color: #007bff; color: #ffffff; padding: 12px 30px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; box-shadow: 0 2px 4px rgba(0,0,0,0.1);" onclick="contact();">Send Message</button>
            </div>
        
    </div>



  
</section ><!-- End #main -->

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
 }
 
 ?>