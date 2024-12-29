<?php

session_start();

require "connection.php";

if (isset($_SESSION["au"])) {
    $email = $_SESSION["au"]["email"];
    $fname = $_SESSION["au"]["fname"];
    $lname = $_SESSION["au"]["lname"];
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin</title>

    <link rel="stylesheet" href="bootstrap 5.2.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/s.jfif" />

</head>

<body >

    <div class="container-fluid">
        <div class="row">

            <!-- header -->
            <div class="col-12 " style="background-color: #E9EBEE;">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="row">
                                <div class="col-12 col-lg-4 mt-1 mb-1 text-center">
                                <img src="resource/logo.png" width="100px" height="100px" class="rounded-circle" />
                                </div>
                                <div class="col-12 col-lg-8">
                                    <div class="row text-center text-lg-start">
                                        <div class="col-12 mt-0 mt-lg-4">
                                            <span class="text-primary fw-bold"><i class="bi bi-patch-check-fill"></i>Admin</span>
                                        </div>
                                        <div class="col-12">
                                            <span class="text-black-50 fw-bold"><?php echo $email ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8">
                            <div class="row">
                                <div class="col-12 col-lg-10 mt-2 my-lg-4">
                                  
                                </div>
                                
                                <div class="col-12 col-lg-2 mx-2 mb-2 my-lg-4 mx-lg-0 d-grid">
                                    <span>
                                        
                                        <a href="newAdMsg.php"><i class="bi bi-envelope text-black "></i></a> &nbsp;
                                        <i class="bi bi-bell"></i> &nbsp;
                                        <i class="bi bi-flag"></i> &nbsp; &nbsp; &nbsp; &nbsp; 
                                        <i class="bi bi-chat"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                            </div>
                        </div>
</body>
</html>
<?php

} else {
    echo ("You are Not a valid user");
}

?>