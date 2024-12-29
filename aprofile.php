


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SoftLeaRNER | Admin Profile</title>
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
  
 <?php include "aheader.php" ?>
  <?php





    // $details_rs = Database::search("SELECT * FROM `users` INNER JOIN `profile_image` ON 
    // users.email=profile_image.users_email INNER JOIN `user_has_address` ON 
    // user_has_address.users_email=users.email INNER JOIN `city` ON 
    // user_has_address.city_id=city.id INNER JOIN `district` ON 
    // city.district_id=district.id INNER JOIN `province` ON 
    // district.province_id=province.id INNER JOIN `gender` ON 
    // gender.id=users.gender_id WHERE `email`='" . $email . "'");

    $details_rs = Database::search("SELECT * FROM `admin` INNER JOIN `gender` ON 
     `gender`.`id` = `admin`.`gender_id` WHERE `email`='" . $email . "'");

    $image_rs = Database::search("SELECT * FROM `profile_image_a` WHERE `email`='" . $email . "'");


    $data = $details_rs->fetch_assoc();
    $image_data = $image_rs->fetch_assoc();
   

?>

  <section style="background-color: #eee;">
  <div class="container py-5">
   

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
           
            <h5 class="my-3"><?php echo $data["fname"] ."". $data["lname"]; ?></h5>
            <p class="text-muted mb-1"><?php echo $email; ?></p>
           
            <div class="d-flex justify-content-center mb-2">
              
            <input type="file" class="d-none" id="profileimg" accept="image/*" />
             <label for="profileimg" class="btn btn-primary mt-5" onclick="changeAdminImage();"> Update Profile Image </label>

              
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
              <input type="password" class="form-control" readonly value="<?php echo $data["verification_code"]; ?>" />
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile </p>
              </div>
              <div class="col-sm-9">
              <input type="text" class="form-control" value="<?php echo $data["mobile"]; ?>" id="mobile"/>
              </div>
            </div>
            <hr>
            
          
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
              <button type="button" class="btn btn-primary" onclick="updateAdminProfile();">Update My Profile </button>
              
            </div>
       
      </div>
    </div>
  </div>
</section>



<body class="page-index ">

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
