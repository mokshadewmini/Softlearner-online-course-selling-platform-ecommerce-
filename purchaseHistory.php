<?php
 session_start();


 
            require "connection.php";

            if (isset($_SESSION["u"])) {
                $email = $_SESSION["u"]["email"];

                $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `user_email`='" . $email . "'");
                $invoice_num = $invoice_rs->num_rows;

        

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SoftLeaRNER | Purchase History</title>
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

     function printHistory(){
    var body = document.body.innerHTML;
    var reportUsers = document.getElementById("report").innerHTML;
    document.body.innerHTML = reportUsers;
    window.print();
    document.body.innerHTML = body;
}
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


  <section class="h-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-10 col-xl-8">
        <div class="card" style="border-radius: 10px;">
          <div class="card-header px-4 py-5" id="report">
            <h5 class="text-muted mb-0">Thanks for your Order, <span style="color: #a8729a;"><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></span>!</h5>
          </div>
          <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0" style="color: #a8729a;">Your purchasing History</p>
              <button class="btn btn-dark me-2" onclick="printHistory();"><i class="bi bi-printer-fill"></i> Print History</button>
              
            </div>
            <?php
                if ($invoice_num == 0) {
                ?>
                    <div class="col-12 bg-body text-center" style="height: 450px;">
                        <span class="fs-1 fw-bolder text-black-50 d-block" style="margin-top: 200px;">
                            You have not purchased any product yet...
                        </span>
                    </div>
                <?php
            } else {
              ?>
              <?php
              for ($x = 0; $x < $invoice_num; $x++) {
                $invoice_data = $invoice_rs->fetch_assoc();
            ?>
            
            <div class="card shadow-0 border mb-4">
              <div class="card-body">
                <div class="row">
                <?php
                                                            $pid = $invoice_data["product_id"];
                                                            $image_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $pid . "' ");
                                                            $image_data = $image_rs->fetch_assoc();
                                                            ?>
                                                               <?php
                                                                $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "' ");
                                                                $product_data = $product_rs->fetch_assoc();

                                                               
                                                                ?>
                                                                
                  <div class="col-md-2">
                
                    <img src="<?php echo $image_data["image_code"]; ?>" class="img-fluid rounded-start">
                      
                  </div>
                 
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0"><?php echo $product_data["title"]; ?></p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small"><?php echo $product_data["tot_hours"]; ?>&nbsp;hours</p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small"><?php echo $product_data["lessons"]; ?>&nbsp;lessons</p>
                  </div>
                  
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">Rs.<?php echo $product_data["price"]; ?>.00</p>
                  </div>
                </div>
                <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                <div class="row d-flex align-items-center">
                  <div class="col-md-2">
                    <button class="text-white mb-0 small btn btn-success">Feedback</button>
                  </div>
                  <div class="col-md-10">
                    
                    <div class="d-flex justify-content-around mb-1">
                     
                      <button class="text-white mt-1 mb-0 small ms-xl-5 btn btn-danger">Delete</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
                      

            <div class="d-flex justify-content-between pt-2">
              <p class="fw-bold mb-0">Order Details</p>
              <p class="text-muted mb-0"><span class="fw-bold me-4">Total</span> Rs.<?php echo $invoice_data["total"]; ?>.00</p>
            </div>

            <div class="d-flex justify-content-between pt-2">
              <p class="text-muted mb-0">Order Id : <?php echo $invoice_data["order_id"]; ?></p>
              <p class="text-muted mb-0"><span class="fw-bold me-4">Discount</span> -</p>
            </div>

            <div class="d-flex justify-content-between">
              <p class="text-muted mb-0">Invoice Date & time : <?php echo $invoice_data["date"]; ?></p>
              </div>
              <br/>
              <hr/>
              <?php
              }
                            ?> 
              
          </div>
          <?php
        $rs = Database::search("SELECT * FROM `invoice` WHERE `user_email`='" . $email . "'");
        $num = $rs->num_rows;
    
        
    
    
            $total = "0";
           
    
            for ($x = 0; $x < $num; $x++) {
                $data = $rs->fetch_assoc();
                $rs1 = Database::search("SELECT * FROM `product` WHERE `id` = '" . $data["product_id"] . "'");
                $p = $rs1->fetch_assoc();
    
                
    
                    $total += $p["price"];
                  
            }
          
          
          ?>
          <div class="card-footer border-0 px-4 py-5"
            style="background-color: #a8729a; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
            <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total
              paid: <span class="h2 mb-0 ms-2">Rs.<?php echo $total; ?>.00</span></h5>
              
          </div>
          
        </div>
       
      </div>
      
    </div>
  </div>
</section>

 
  <?php
            }
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
          
          <li> <a href="#">Privacy policy</a></li>
        </p>

      </div>

    </div>
  </div>
</div>

<div class="footer-legal">
  <div class="container">
    <div class="copyright">
      &copy;2022 Copyright <strong><span>SoftLeaRNER.lk</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nova-bootstrap-business-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </div>
</div>
</footer><!-- End Footer -->
<!-- End Footer -->

    <script src="bootstrap.bundle.js"></script>
    <script src="main.js"></script>
    <script src="script.js"></script>
    </body>
</html>