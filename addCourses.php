<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Product | softLeaRNER</title>
    <link rel="stylesheet" href="bootstrap 5.2.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.svg" />

</head>

<body> 

    <div class="container-fluid">
        <div class="row gy-3">
            <?php include "aheader.php";

           

       

            ?>

                <div class="col-12">
                    <div class="row">

                        <div class="col-12 text-center">
                            <h2 class="h2 text-primary fw-bold">Add New Course</h2>
                        </div>
                        <br/>
<hr/>
                        <div class="col-12">
                            <div class="row">
                            
                                            <label class="form-label fw-bold" style="font-size: 20px;">Title 1</label>
                                        
                                        <div class="col-12">
                                            <textarea cols="12" rows="2" class="form-control" id="t1"></textarea>
                                     
                                        <br/>
                                       
                                        <label class="form-label fw-bold" style="font-size: 20px;">Title 2</label>
                                     
                                        <div class="col-12">
                                            <textarea cols="12" rows="2" class="form-control" id="t2"></textarea>
                                        </div>
                                        <br/>
                                        <label class="form-label fw-bold" style="font-size: 20px;">Tot hours</label>
                                     
                                     <div class="col-12">
                                         <textarea cols="12" rows="2" class="form-control" id="h"></textarea>
                                     </div>
                                     <br/>
                                     <label class="form-label fw-bold" style="font-size: 20px;">No.of lessons</label>
                                     
                                     <div class="col-12">
                                         <textarea cols="12" rows="2" class="form-control" id="l"></textarea>
                                     </div>
                                     <br/>
                                        <label class="form-label fw-bold" style="font-size: 20px;">What student's will learn...</label>
                                       
                                        <div class="col-12">
                                            <textarea cols="12" rows="8" class="form-control" id="yl"></textarea>
                                        </div>
                                        <br/>
                                        <label class="form-label fw-bold" style="font-size: 20px;">The including content in the subject</label>
                                     
                                        <div class="col-12">
                                            <textarea cols="12" rows="10" class="form-control" id="c"></textarea>
                                        </div>
                                        <br/>
                                        <label class="form-label fw-bold" style="font-size: 20px;">Requirements</label>
                                        
                                        <div class="col-12">
                                            <textarea cols="12" rows="5" class="form-control" id="r"></textarea>
                                        </div>
                                        <br/>
                                        <label class="form-label fw-bold" style="font-size: 20px;">Description</label>
                                       
                                        <div class="col-12">
                                            <textarea cols="12" rows="10" class="form-control" id="desc"></textarea>
                                        </div>
                                        <br/>
                                        <label class="form-label fw-bold" style="font-size: 20px;">Cost Per Item</label>
                                                </div>
                                                <div class=" col-8 col-lg-4">
                                                    <div class="input-group mb-2 mt-2">
                                                        <span class="input-group-text">Rs.</span>
                                                        <input type="text" class="form-control" id="cost" />
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                </div>
                                                <br/>
                                        <label class="form-label fw-bold" style="font-size: 20px;">For whom</label>
                                      
                                        <div class="col-12">
                                            <textarea cols="12" rows="4" class="form-control" id="w"></textarea>
                                        </div>
                                        <br/>
                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Add an image</label>
                                        </div>
                                        <div class="offset-lg-3 col-12 col-lg-6">
                                            <div class="row">
                                                <div class="col-4 border border-primary rounded">
                                                    <img src="resource/addproductimg.svg" class="img-fluid" style="height: 300px;" id="i0" />
                                                </div>
                                              
                                            </div>
                                        </div>
                                        <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
                                            <input type="file" class="d-none" id="imageuploader"  />
                                            <label for="imageuploader" class="col-4 btn btn-warning" onclick="changeProductImage();"> Upload a file</label>
                                            <br/>
                                        </div>
                                        <br/>
                                     
                                        <br/>
                                        
                                        <hr/>
                                        <div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3 mb-3">
                                    <button class="btn btn-success" onclick="addProduct();">Save Course</button>
                                </div>
                                <br/>
                                <div class="col-12">
                                            <textarea cols="20" rows="1" class="form-control bg-primary" ></textarea>
                                        </div>
 
        </div>
    </div>

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








