<?php
session_start();

if (isset($_SESSION["au"])) {
  
    require "connection.php";

    if (isset($_GET["email"])) {

        $email = $_GET["email"];
    




?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Profile | Admin-NewTech</title>

    <link rel="stylesheet" href="bootstrap 5.2.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.jpg" />
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php

    $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
    $user_num = $user_rs->num_rows;

    if ($user_num == 1) {


        $user_data = $user_rs->fetch_assoc();
            ?>

           

               

                <div class="col-12 bg-primary">
                    <div class="row">

                        <div class="col-12 bg-body rounded mt-4 mb-4">
                            <div class="row g-2">

                                <div class="col-md-3 border-end">
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                    <?php
                    

                    $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $user_data['email'] . "'");
                    $image_num = $image_rs->num_rows;
                    $image_data = $image_rs->fetch_assoc();

              ?>

                        <?php

                        if (empty($image_data["path"])) {

                        ?>
                            <img src="resource/userprofile.svg" class="rounded mt-5" style="width: 150px;" id="viewImg" />
                        <?php

                        } else {

                        ?>
                            <img src="<?php echo $image_data["path"]; ?>" class="rounded mt-5" style="width: 150px;" id="viewImg" />
                        <?php

                        }

                        ?>
                                       
                                      



                                        <span class="fw-bold"><?php echo $user_data["fname"]."&nbsp;".$user_data["lname"]?></span>
                                        <span class="fw-bold text-black-50"><?php echo $user_data["email"]; ?></span>

                                        <input type="file" class="d-none" id="profileimg" accept="image/*" />
                                        

                                    </div>
                                </div>

                                <div class="col-md-5 border-end">
                                    <div class="p-3 py-5">

                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="fw-bold">Manage Users</h4>
                                        </div>

                                        <div class="row mt-4">

                                            <div class="col-6">
                                                <label class="form-label">First Name</label>
                                                <input type="text" class="form-control" value="<?php echo $user_data["fname"]; ?>"/>
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" class="form-control" value="<?php echo $user_data["lname"]; ?>"  />
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Mobile</label>
                                                <input type="text" class="form-control" value="<?php echo $user_data["mobile 01"]; ?>" />
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" readonly value="<?php echo $user_data["password"]; ?>" disabled/>
                                                    <span class="input-group-text bg-primary" >
                                                        <i class="bi bi-eye-slash-fill text-white"></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control" readonly value="<?php echo $user_data["email"]; ?>" disabled/>
                                            </div>

                                            

                                            
                                                
                                           

                                                       
                                                  
                                                
                                            <div class="col-12 d-grid mt-3">
                                                <button class="btn btn-primary" >Create user account</button>
                                            </div>
                                            </div>
                                            </div>
                                            
                                            <div class="col-12 col-lg-9">
                                                <div class="row">

                                                <div class="col-4 col-lg-3">
                                                <div class="row">
                                                <?php

if ($user_data["status_id"] == 1) {
?>
    <button id="ub<?php echo $user_data['email']; ?>" class="btn btn-dark" onclick="blockUser('<?php echo $user_data['email']; ?>');">Deactivate</button>
<?php
} else {
?>
    <button id="ub<?php echo $user_data['email']; ?>" class="btn btn-info" onclick="blockUser('<?php echo $user_data['email']; ?>');">Activate</button>
<?php

}

?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-4 col-lg-3">
                                                <div class="row">
                                                    <span><button class="btn btn-success">Update</button></span>
                                                </div>
                                            </div>
                                                </div>
                                            </div>
                                            <br/>


                                        </div>

                                    </div>
                                </div>

                               

                            </div>
                        </div>

                    </div>
                </div>

            



            

        </div>
    </div>

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
<?php

    } else {
      echo ("Sorry for the Inconvenience");
    }
  } else {
    echo ("Something went wrong");
  }
}

?>