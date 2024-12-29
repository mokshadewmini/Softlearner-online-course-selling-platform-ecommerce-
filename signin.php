

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SoftLeaRNER | Signin</title>

<link rel="stylesheet" href="bootstrap 5.2.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

<link rel="icon" href="resource/s.jfif" />

</head>

<body class="overflow-hidden">




<div class="container-fluid " >
<div class="row ">
<div class="col-6 d-none d-lg-block">
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
                            <p style="font-size: 25px;" >Sign In</p>
                            <span class="text-danger" id="msg2"></span>
                        </div>

                            <?php

                            $email = "";
                            $password = "";

                            if (isset($_COOKIE["email"])) {
                                $email = $_COOKIE["email"];
                            }

                            if (isset($_COOKIE["password"])) {
                                $password = $_COOKIE["password"];
                            }

                            ?>

                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="email2" value="<?php echo $email; ?>" />
                            </div>
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" id="password2" value="<?php echo $password; ?>" />
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rememberme">
                                    <label class="form-check-label">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <a href="#" class="link-primary" onclick="forgotPassword();">Forgot Password?</a>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-primary" onclick="signIn();">Sign In</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-danger"  onclick="window.location='signup.php';">New to SoftLeaRNER?Join Now</button>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <!-- content -->

           
            <!-- modal -->
            <div class="modal" tabindex="-1" id="forgotPasswordModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Reset Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">

                                <div class="col-6">
                                    <label class="form-label">New Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="npi"/>
                                        <button class="btn btn-outline-secondary" type="button" id="npb" onclick="showPassword1();"><i id="e1" class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Re-type Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="rnp"/>
                                        <button class="btn btn-outline-secondary" type="button" id="rnpb" onclick="showPassword2();"><i id="e2" class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Verification Code</label>
                                    <input type="text" class="form-control" id="vc"/>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="resetpw();">Reset Password</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- footer -->

            <div class="col-12 fixed-bottom d-none d-lg-block">
                <p class="text-center">&copy;2024 Copyright SoftLeaRNER.lk. All Rights Reserved</p>
            </div>

            <!-- footer -->

        </div>

    </div>

    <script src="script.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
