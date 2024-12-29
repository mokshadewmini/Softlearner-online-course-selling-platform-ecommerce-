
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body >

    <div class="container-fluid">
        <div class="row">

        <?php include "aheader.php"; 
        
        $image_rs = Database::search("SELECT * FROM `profile_image_a` WHERE `email`='" . $email . "'");


    
    $image_data = $image_rs->fetch_assoc();
    $ad_rs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $email . "'");


    
    $ad_data = $ad_rs->fetch_assoc();
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
                                                <span><label class="text-sm-start">Hello, <?php echo $ad_data["fname"]; ?></label><br/><br/>
                                                <a href="aprofile.php"><button class="btn btn-primary text-white">View Profile </button></a>
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
<span><a href="dashboard.php"> <i class="bi bi-house-fill"></i></a> &nbsp; Dashboard</span>
<div class="bg-warning">
<hr/>

<span ><a href="users.php" ><i class="bi bi-people-fill"></i></a> &nbsp; Users</span>

<hr/>
</div>


<span><a href="products.php"><i class="bi bi-gift-fill  "></i></a> &nbsp; Courses</span>
<hr/>
<span><a href="dashboard.php"><i class="bi bi-journal-check"></i></a> &nbsp; Messages</span>
<hr/>
<span><a href="Invoice.php"><i class="bi bi-file-text "></i></a> &nbsp; Invoices</span>
<hr/>
<span><a href="home.php"><i class="bi bi-bullseye"></i></a> &nbsp; My Softlearner</span>
<hr/>
<span ><i class="bi bi-arrow-bar-right "></i> &nbsp; <a href="adminSignin.php">Exit</a></span>
                                                    <hr /><br /><br /><br />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-9 mt-3 mb-3 ">
                                <div class="row">
                                    <div class="offset-1 col-10 text-center">
                                        <div class="row justify-content-right">
                                            <div class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end">
                                                <i class="bi bi-people-fill" style="font-size: 50px;"></i></a> &nbsp; <span style="font-size: 25px;">User Management</span>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="col-11 ">
                                        <div class="row">
                                        
                                            <div class="col-8">
                                            <br />
                                                <div class="input-group mb-3 ">
                                                    <input type="text" class="form-control" placeholder="Search Users" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-4 col-lg-4">
                                        <div class="row">
                                            <div class=" d-md-block mr-2"></div>
                                        </div>
                                        <button class="btn btn-dark me-2" onclick="printChart();"><i class="bi bi-printer-fill"></i> Print Report</button>
                                    </div>
                                </div>
                                
                                <hr />
                               
                                <div class="col-12 col-lg-8 justify-content-center" id="reportUsers">
                                    <div class="row ">
                                        <div class="" style="width: 60rem;">
                                            <p class="card-text ">
                                            <h3>Monthly User Contribution&nbsp;</h3>
                                            </p>
                                            <?php
                                            $yt_rs = Database::search("SELECT * FROM `invoice` WHERE `product_id`='" . $product_data["id"] = "1" . "'");
                                            $yt_num = $yt_rs->num_rows;
                                            $eb_rs = Database::search("SELECT * FROM `invoice` WHERE `product_id`='" . $product_data["id"] = "3" . "'");
                                            $eb_num = $eb_rs->num_rows;
                                            $dm_rs = Database::search("SELECT * FROM `invoice` WHERE `product_id`='" . $product_data["id"] = "8" . "'");
                                            $dm_num = $dm_rs->num_rows;
                                            $fre_rs = Database::search("SELECT * FROM `invoice` WHERE `product_id`='" . $product_data["id"] = "7" . "'");
                                            $fre_num = $fre_rs->num_rows;
                                            $web_rs = Database::search("SELECT * FROM `invoice` WHERE `product_id`='" . $product_data["id"] = "5" . "'");
                                            $web_num = $web_rs->num_rows;
                                            $pho_rs = Database::search("SELECT * FROM `invoice` WHERE `product_id`='" . $product_data["id"] = "9" . "'");
                                            $pho_num = $pho_rs->num_rows;
                                            $mic_rs = Database::search("SELECT * FROM `invoice` WHERE `product_id`='" . $product_data["id"] = "6" . "'");
                                            $mic_num = $mic_rs->num_rows;
                                            $nft_rs = Database::search("SELECT * FROM `invoice` WHERE `product_id`='" . $product_data["id"] = "4" . "'");
                                            $nft_num = $nft_rs->num_rows;
                                            $query = "SELECT * FROM `product`";
                                            $product_rs = Database::search($query);
                                            $product_num = $product_rs->num_rows;
                                            $product_data = [];
                                            for ($x = 0; $x < $product_num; $x++) {
                                                $data = $product_rs->fetch_assoc();
                                                $product_data[$data['id']] = $data['title'];
                                            }
                                            $yt_num = $yt_rs->num_rows;
                                            $eb_num = $eb_rs->num_rows;
                                            $dm_num = $dm_rs->num_rows;
                                            $fre_num = $fre_rs->num_rows;
                                            $web_num = $web_rs->num_rows;
                                            $pho_num = $pho_rs->num_rows;
                                            $mic_num = $mic_rs->num_rows;
                                            $nft_num = $nft_rs->num_rows;
                                            ?>
                                            <canvas id="myChart"></canvas>
                                            <script>
                                                const labels = ['January', 'February', 'March', 'April', 'May', 'June'];
                                                const data = {
                                                    labels: labels,
                                                    datasets: [{
                                                        label: 'User involvement with the softlearner academy - 2024',
                                                        data: [<?php echo $yt_num; ?>, <?php echo $eb_num; ?>, <?php echo $dm_num; ?>, <?php echo $fre_num; ?>, <?php echo $web_num; ?>, <?php echo $pho_num; ?>, <?php echo $mic_num; ?>, <?php echo $nft_num; ?>],
                                                        backgroundColor: [
                                                            'rgba(255, 99, 132, 0.2)',
                                                            'rgba(54, 162, 235, 0.2)',
                                                            'rgba(255, 206, 86, 0.2)',
                                                            'rgba(75, 192, 192, 0.2)',
                                                            'rgba(153, 102, 255, 0.2)',
                                                            'rgba(255, 159, 64, 0.2)'
                                                        ],
                                                        borderColor: [
                                                            'rgba(255, 99, 132, 1)',
                                                            'rgba(54, 162, 235, 1)',
                                                            'rgba(255, 206, 86, 1)',
                                                            'rgba(75, 192, 192, 1)',
                                                            'rgba(153, 102, 255, 1)',
                                                            'rgba(255, 159, 64, 1)'
                                                        ],
                                                        borderWidth: 1
                                                    }]
                                                };
                                                const config = {
                                                    type: 'line',
                                                    data: data,
                                                    options: {
                                                        scales: {
                                                            y: {
                                                                beginAtZero: true
                                                            }
                                                        }
                                                    }
                                                };
                                                const myChart = new Chart(
                                                    document.getElementById('myChart'),
                                                    config
                                                );

                                                function printChart() {
                                                    const printWindow = window.open('', '', 'width=800,height=600');
                                                    printWindow.document.write('<html><head><title>Print Chart</title>');
                                                    printWindow.document.write('</head><body>');
                                                    printWindow.document.write('<canvas id="printChart" width="800" height="600"></canvas>');
                                                    printWindow.document.write('</body></html>');
                                                    printWindow.document.close();
                                                    printWindow.focus();

                                                    const printContext = printWindow.document.getElementById('printChart').getContext('2d');
                                                    new Chart(printContext, config);

                                                    setTimeout(() => {
                                                        printWindow.print();
                                                        printWindow.close();
                                                    }, 1000);
                                                }
                                            </script>
                                        
                                            </br>
                                                <script src="script.js"></script>
                                            </body>

                                            </html>
                                            <div class="card-body">

                                            </div>
                                        </div></span>
                                    </div>
                                </div>
                                <div class="row overflow-scroll">
                                    <table class="table table-bordered border-primary">

                                        <thead>
                                            <tr>
                                                <th scope="col">id</th>
                                                <th scope="col">email</th>
                                                <th scope="col">First name</th>

                                                <th scope="col">Last name</th>
                                                <th scope="col">profile pic</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php


                                            $query = "SELECT * FROM `user`";


                                            $product_rs = Database::search($query);
                                            $product_num = $product_rs->num_rows;



                                            for ($x = 0; $x < $product_num; $x++) {
                                                $product_data = $product_rs->fetch_assoc();
                                            ?>
                                                <tr>
                                                    <td><?php echo $x + 1; ?></td>
                                                    <td><?php echo $product_data["email"]; ?></td>
                                                    <td><?php echo $product_data["fname"]; ?></td>
                                                    <td><?php echo $product_data["lname"]; ?></td>

                                                    <td>
                                                        <div class="col-2  d-lg-block bg-light py-2" onmouseover="viewUserModal('<?php echo $product_data['email']; ?>');">
                                                            <?php


                                                            $user_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $product_data['email'] . "'");
                                                            $user_num = $user_rs->num_rows;
                                                            $user_data = $user_rs->fetch_assoc();

                                                            if ($user_num == 1) {

                                                            ?>

                                                                <img src="<?php echo $user_data["path"]; ?>" style="height: 80px;margin-left: 80px;" class="rounded-circle" />

                                                            <?php

                                                            } else {

                                                            ?>

                                                                <img src="resource/userprofile.svg" style="height: 80px;margin-left: 80px;" class="rounded-circle" />

                                                            <?php

                                                            }
                                                            ?>

                                                        </div>
                                                    </td>
                                                    <?php
                                                    $users_rs = Database::search("SELECT * FROM `user` ");
                                                    $users_num = $users_rs->num_rows;
                                                    $users_data = $users_rs->fetch_assoc();
                                                    ?>
                                                    <?php
                                                    $status_rs = Database::search("SELECT * FROM `status` WHERE `id`='" . $users_data['status_id'] . "'");
                                                    $status_num = $status_rs->num_rows;

                                                    $status_data = $status_rs->fetch_assoc();
                                                    ?>
                                                    <?php
                                                    $gender_rs = Database::search("SELECT * FROM `gender` WHERE `id`='" . $users_data['gender_id'] . "'");
                                                    $gender_num = $gender_rs->num_rows;

                                                    $gender_data = $gender_rs->fetch_assoc();
                                                    ?>







                                                </tr>


                                                <!-- modal 01 -->
                                                <div class="modal" tabindex="-1" id="viewUserModal<?php echo $product_data["email"]; ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title fw-bold text-success"><?php echo $product_data["fname"] . "&nbsp;" . $product_data["lname"]; ?></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="offset-4 col-4">
                                                                    <?php

                                                                    $product_img_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $product_data["email"] . "'");
                                                                    $product_img_data = $product_img_rs->fetch_assoc();

                                                                    ?>
                                                                    <img src="<?php echo $product_img_data["path"]; ?>" class="img-fluid d-block" style="height: 150px;" />
                                                                </div>
                                                                <div class="col-12">
                                                                  <br />

                                                                    <span class="fs-5 fw-bold">Joined Date :</span>&nbsp;
                                                                    <span class="fs-8" style="font-size: 17px;"><?php echo $product_data["joined_date"]; ?></span><br />
                                                                    <span class="fs-5 fw-bold">Gender :</span>&nbsp;
                                                                    <span class="fs-8" style="font-size: 17px;"><?php echo $gender_data["name"]; ?></span><br />
                                                                    <span class="fs-5 fw-bold">Mobile no :</span>&nbsp;
                                                                    <span class="fs-8" style="font-size: 17px;"><?php echo $product_data["mobile 01"]; ?></span><br />
                                                                    <span class="fs-5 fw-bold">Home Address :</span>&nbsp;
                                                                    <span class="fs-8" style="font-size: 17px;"><?php echo $product_data["address"]; ?></span><br />
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <?php

                                                                if ($product_data["status_id"] == 1) {
                                                                ?>
                                                                    <button id="ub<?php echo $product_data['email']; ?>" class="btn btn-dark" onclick="blockUser('<?php echo $product_data['email']; ?>');">Deactivate</button>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <button id="ub<?php echo $product_data['email']; ?>" class="btn btn-info" onclick="blockUser('<?php echo $product_data['email']; ?>');">Activate</button>
                                                                <?php

                                                                }

                                                                ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- modal 01 -->


                                        </tbody>
                                    <?php
                                            }

                                    ?>
                                    </table>
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
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>