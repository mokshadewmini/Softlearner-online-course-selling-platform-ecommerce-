
<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin | Dashboard</title>

    <link rel="stylesheet" href="bootstrap 5.2.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/s.jfif" />

</head>

<body >

    <div class="container-fluid">
        <div class="row">

        <?php include "aheader.php"; 
        
        $image_rs = Database::search("SELECT * FROM `profile_image_a` WHERE `email`='" . $email . "'");


    
    $image_data = $image_rs->fetch_assoc();
        ?>
        <hr/>
           <div class="col-12 ">
            <div class="row">
            <div class="col-12 col-lg-4 bg-info">
                            <div class="row">
            </div>
           </div>
           <!-- body -->
           <div class="col-12">
                    <div class="row"> 
                       
                        <!-- filter -->
                        <div class="col-11 col-lg-2 mx-3 my-3 border border-dark rounded">
                            <div class="row">
                                <div class="col-12 mt-3 ">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold ">
                                                <span>
                                                <?php

if (empty($image_data["path"])) {

?>
    <img src="resource/userprofile.svg" width="50px" height="50px" class="rounded-circle" />
<?php

} else {

?>
    <img src="<?php echo $image_data["path"]; ?>" width="50px" height="50px" class="rounded-circle" />
<?php

}

?> 
                                              </span>
                                                <span><label class="text-sm-start">Hello, <?php echo $_SESSION["au"]["fname"] . " " . $_SESSION["au"]["lname"]; ?></label><br/><br/>
                                                <a href="aprofile.php"><button class="btn btn-primary text-white">View Profile ></button></a>
</div></span>
                                            </label>
                                        </div>
<hr/>
                                        <div class="col-11">
                                            <div class="row">
                                                <div class="col-12">
                                                <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
</div></span>
<label class="badge bg-dark text-wrap font-size: 30px;">Modules</label>
<br/><br/>
<hr/>
<span><a href="#"> <i class="bi bi-house-fill"></i></a> &nbsp; Dashboard</span>
<hr/>
<span><a href="users.php" ><i class="bi bi-people-fill"></i></a> &nbsp; Users</span>
<hr/>


<span><a href="products.php"><i class="bi bi-gift-fill  "></i></a> &nbsp; Courses</span>
<hr/>
<span><a href="GRN.php"><i class="bi bi-journal-check"></i></a> &nbsp; Messages</span>
<hr/>
<span><a href="Invoice.php"><i class="bi bi-file-text "></i></a> &nbsp; Invoices</span>
<hr/>

<span><a href="home.php"><i class="bi bi-bullseye"></i></a> &nbsp; My Softlearner</span>
<hr/>
<span><i class="bi bi-arrow-bar-right "></i> &nbsp; Exit</span>
<hr/><br/><br/><br/>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                               
                                                </div>
                                              
                                                </div>
                                                
                                                <div class="col-12 col-lg-9 mt-3 mb-3 ">
                            <div class="row" >
                                <div class="offset-1 col-10 text-center">
                                    <div class="row justify-content-right">
                                <div class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end">
   <i class="bi bi-journal-check" style="font-size: 50px;"></i></a> &nbsp; <span style="font-size: 25px;">Messages</span>
</div>
                                       
                                                </div>
                                                </div>
                                                </div>
                                                </div>


                                               
                                                </div>
                                                </div>
                                                
                                                
                                               
                                                <!--body-->
                                                <!--filter-->

                                                <!--filter-->
                                                
</div>
                                    </div>
                                                </div>
                                                </div>
                                                </div>

                                            


           </div>
               </div>
</hr>
</body>
</html>