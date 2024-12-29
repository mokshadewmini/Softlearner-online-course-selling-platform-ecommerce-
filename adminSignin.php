<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin SignIn | SoftLeaRNER</title>

    <link rel="stylesheet" href="bootstrap 5.2.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/s.jfif" />
</head>

<body class="overflow-scroll">

<div class="container-fluid " >
<div class="row "> 
<div class="col-12 d-none col-lg-6 d-lg-block">
<div class="row ">
<img src="resource/g2.jpg" >
</div>
</div>
<div class="col-12 col-lg-6 justify-content-center">
                    <div class="row g-2">
                        <div class="col-12" >
                        <div class="col-12 col-lg-4 mt-1 mb-1 text-center">
                           <p style="font-size: 25px;">SoftLeaRNER.lk <img src="resource/logo.png" width="100px" height="100px" class="rounded-circle" /></p>
                            </div>
                        <br/><br/><br/>
                            <p style="font-size: 25px;" >Sign In as an Admin</p>
                            <span class="text-danger" id="msg2"></span>
                        </div>

                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="ex : john@gmail.com" id="e" />
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-primary" onclick="adminVerification();">Send Verification Code</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-danger">Back to Customer Log In</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!--  -->

            <div class="modal" tabindex="-1" id="verificationModal">
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
                            <button type="button" class="btn btn-primary" onclick="verify();">Verify</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--  -->

            <div class="col-12 fixed-bottom text-center">
                <p>&copy; 2022 SoftLeaRNER.lk | All Rights Reserved</p>
            </div>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>