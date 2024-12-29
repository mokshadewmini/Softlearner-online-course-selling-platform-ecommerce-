<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SoftLeaRNER</title>

    <link rel="stylesheet" href="bootstrap 5.2.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="style.css" rel="stylesheet">

    <link rel="icon" href="resource/s.jfif" />
</head>

<body style="font-family: Arial, sans-serif; background-image: url(''); background-size: cover; background-position: center; padding: 20px;">

    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <!-- header -->
            <div class="col-12 text-center mb-4">
                
                <h1 style="font-size: 2.5rem; font-weight: bold; color: purple;">Hello, welcome to SoftLeaRNER! <img src="resource/logo.png" width="100px" height="100px" class="rounded-circle" /></h1>
            </div>
            <!-- header -->

            <!-- content -->
            <div class="col-12 col-lg-6 offset-lg-3 p-4 " style="background-image: url('https://i.pinimg.com/564x/0f/84/05/0f84059971bfa1334fdc9d3aae852259.jpg'); border-radius: 15px; box-shadow: 0 4px 16px rgba(0, 0, 0, 0.6) ;">
                <h3 class="text-center text-dark">Create New Account</h3>
                <div class="alert alert-danger d-none" role="alert" id="alertdiv">
                    <i class="bi bi-x-octagon-fill fs-5" id="msg"></i>
                </div>
                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" id="f" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="l" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" id="e" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" id="p" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Mobile</label>
                    <input type="text" class="form-control" id="m" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <select class="form-select" id="g">
                        <?php
                            require "connection.php";
                            $rs = Database::search("SELECT * FROM `gender`");
                            $n = $rs->num_rows;
                            for ($x = 0; $x < $n; $x++) {
                                $d = $rs->fetch_assoc();
                                echo '<option value="' . $d["id"] . '">' . $d["name"] . '</option>';
                            } 
                        ?>
                    </select>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button class="btn btn-primary me-md-2" onclick="signUp();">Sign Up</button>
                    <button class="btn btn-dark" onclick="window.location='signin.php';">Already have an account? Sign In</button>
                </div>
            </div>
            <!-- content -->

            <!-- footer -->
            <div class="col-12 text-center mt-4">
                <p>&copy; 2022 SoftLeaRNER.lk || All Rights Reserved</p>
            </div>
            <!-- footer -->
        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>
