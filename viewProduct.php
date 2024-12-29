<?php
session_start();

if (isset($_SESSION["au"])) {
  $email = $_SESSION["au"]["email"];

    require "connection.php";

  if (isset($_GET["id"])) {

    $pid = $_GET["id"];


    

?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> View Products | Admin-Softlearner</title>

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

            $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "' AND  `user_email`='" . $email . "'");
    $product_num = $product_rs->num_rows;

    if ($product_num == 1) {


      $product_data = $product_rs->fetch_assoc();
      ?>

               

                <div class="col-12 bg-primary">
                    <div class="row">

                        <div class="col-12 bg-body rounded mt-4 mb-4">
                            <div class="row g-2">

                                <div class="col-md-3 border-end">
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                                       <?php
      $image_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $pid . "'");
      $image_num = $image_rs->num_rows;
      $image_data = $image_rs->fetch_assoc();
            ?>
                                           
                                            <img src="<?php echo $image_data["image_code"]; ?>" class="rounded mt-5" style="width: 150px;"  /><br/>
                                      



                                        

                                        

                                    </div>
                                </div>

                                <div class="col-md-5 border-end">
                                    <div class="p-3 py-5">

                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="fw-bold">Manage Courses</h4>
                                        </div>

                                        <div class="row mt-4">

                                            <div class="col-6">
                                                <label class="form-label"><b>Product id</b></label>
                                                <input type="text" class="form-control" value="<?php echo $product_data["id"]; ?>"/>
                                            </div>

                                          

                                            <div class="col-6">
                                                <label class="form-label"><b>Tot.hours</b></label>
                                                <input type="text" class="form-control" value="<?php echo $product_data["tot_hours"]; ?>" />
                                            </div>

                                            

                                            <div class="col-6">
                                                <label class="form-label"><b>No.lessons</b></label>
                                                <input type="text" class="form-control"  value="<?php echo $product_data["lessons"]; ?>" />
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label"><b>title</b></label>
                                                <input type="text" class="form-control" value="<?php echo $product_data["title"]; ?>" />
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label"><b>price</b></label>
                                                <input type="text" class="form-control" value="Rs.<?php echo $product_data["price"]; ?>.00" />
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label"><b>Admin who registerd the course</b></label>
                                                <input type="text" class="form-control" value="<?php echo $product_data["user_email"]; ?>" />
                                            </div>

                                            

                                            
                                                
                                           

                                                       
                                                  
                                                
                                            <div class="col-12 d-grid mt-3">
                                                <button class="btn btn-primary" onclick="addNewCategory();">Register Courses</button>
                                            </div>
                                            </div>
                                            </div>
                                            <div class="modal" tabindex="-1" id="addCategoryModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add New Course</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            
                            <div class="col-12 mt-2">
                                <label class="form-label">Enter Your Email : </label>
                                <input type="text" class="form-control" id="e"/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="go();">Go</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal 2 -->
            <!-- modal 3 -->
            <div class="modal" tabindex="-1" id="addCategoryVerificationModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Admin Verification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label class="form-label">Enter Your Verification Code</label>
                            <input type="text" class="form-control" id="vcode">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="verifyCourse();">Verify</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal 3 -->
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                <div class="col-6 col-lg-3">
                                                <div class="row">
                                                <?php

if ($product_data["status_id"] == 1) {
?>
    <button id="pb<?php echo $product_data['id']; ?>" class="btn btn-dark" onclick="blockProduct('<?php echo $product_data['id']; ?>');">Deactivate</button>
<?php
} else {
?>
    <button id="pb<?php echo $product_data['id']; ?>" class="btn btn-info" onclick="blockProduct('<?php echo $product_data['id']; ?>');">Activate</button>
<?php

}

?>
                                                   
                                                </div>
                                            </div>
                                            
                                            <div class="col-6 col-lg-4">
                                                <div class="row">
                                                    <span>  <a class="btn btn-success fw-bold" onclick="sendId(<?php echo $product_data['id']; ?>);">Update</a></span>
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