
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
<div class="bg-warning">
<hr/>
<span><a href="#"> <i class="bi bi-house-fill"></i></a> &nbsp; Dashboard</span>
<hr/>
</div>
<span><a href="users.php" ><i class="bi bi-people-fill"></i></a> &nbsp; Users</span>
<hr/>


<span><a href="products.php"><i class="bi bi-gift-fill  "></i></a> &nbsp; Courses</span>
<hr/>
<span><a href="dashboard.php"><i class="bi bi-journal-check"></i></a> &nbsp; Messages</span>
<hr/>
<span><a href="Invoice.php"><i class="bi bi-file-text "></i></a> &nbsp; Invoices</span>
<hr/>
<span><a href="home.php"><i class="bi bi-bullseye"></i></a> &nbsp; My Softlearner</span>
<hr/>
<span ><i class="bi bi-arrow-bar-right "></i> &nbsp; <a href="adminSignin.php">Exit</a></span>
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
   <i class="bi bi-house-fill" style="font-size: 50px;"></i></a> &nbsp; <span style="font-size: 25px;">Dashboard</span>
</div>
                                       
                                                </div>
                                                </div>
                                                </div>
                                                <br/>
                                                <div class="col-12 col-lg-12">
                                                    <div class="row">
                                                    <div class="col-12 col-lg-4">
                                                    <div class="row">

                                               <span> 
                                               <div class="offset-1 col-10 col-lg-8 my-3 rounded bg-body">
                            <div class="row g-1">
                                <div class="col-12 text-center">
                                    <label class="form-label fs-4 fw-bold ">Mostly Sold Item</label>
                                </div>
                                <?php

                                            $today = date("Y-m-d");
                                            $thismonth = date("m");
                                            $thisyear = date("Y");

                                            $a = "0";
                                            $b = "0";
                                            $c = "0";
                                            $e = "0";
                                            $f = "0";

                                            $invoice_rs = Database::search("SELECT * FROM `invoice`");
                                            $invoice_num = $invoice_rs->num_rows;

                                            for ($x = 0; $x < $invoice_num; $x++) {
                                                $invoice_data = $invoice_rs->fetch_assoc();

                                               

                                                $d = $invoice_data["date"];
                                                $splitDate = explode(" ", $d); //separate date from time
                                                $pdate = $splitDate[0]; //sold date

                                                if ($pdate == $today) {
                                                    $a =  $invoice_num;
                                                   
                                                }

                                                $splitMonth = explode("-", $pdate); //separate date as year,month & date
                                                $pyear = $splitMonth[0]; //year
                                                $pmonth = $splitMonth[1]; //month

                                                if ($pyear == $thisyear) {
                                                    if ($pmonth == $thismonth) {
                                                        $b = $b + $invoice_data["total"];
                                                        
                                                    }
                                                }
                                            }

                                            ?>
                                

                                <?php

$freq_rs = Database::search("SELECT `product_id`,COUNT(`product_id`) AS `value_occurence` 
FROM `invoice` WHERE `date` LIKE '%" . $today . "%' GROUP BY `product_id` ORDER BY 
`value_occurence` DESC LIMIT 1");

$freq_num = $freq_rs->num_rows;
if ($freq_num > 0) {
    $freq_data = $freq_rs->fetch_assoc();

    $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $freq_data["product_id"] . "'");
    $product_data = $product_rs->fetch_assoc();

    $image2_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $freq_data["product_id"] . "'");
    $image2_data = $image2_rs->fetch_assoc();

    
?>

          <li>
         
    <div class="col-12 text-center shadow">
        <img src="<?php echo $image2_data["image_code"]; ?>" class="img-fluid rounded-top" style="height: 200px;" />
    </div>
    <div class="col-12 text-center my-3">
        <span class="fs-5 fw-bold"><?php echo $product_data["title"]; ?></span><br />
       
        <span class="fs-6">Rs <?php echo $product_data["price"]; ?> .00</span>
    </div>
<?php

} else {
?>
    <div class="col-12 text-center shadow">
        <img src="resource/empty.svg" class="img-fluid rounded-top" style="height: 250px;" />
    </div>
    <div class="col-12 text-center my-3">
        <span class="fs-5 fw-bold">-----</span><br />
      <span class="fs-6">No Product Found!</span>
    </div>
<?php
}

?>

<div class="col-12">
    <div class="first-place"></div>
</div>
                               
                                <div class="col-12">
                                    <div class="first-place"></div>
                                </div>
                            </div>
                        </div>
                                               </span>
</div>
</div>
<div class="col-12 col-lg-4">
                                                    <div class="row">
                                                        
 <span><div class="card text-bg-primary mb-3" style="max-width: 18rem;">
  <div class="card-header"><i class="bi bi-cart-check-fill"></i>&nbsp;Today Sellings</div>
  <div class="card-body">
    <h1 class="card-title"><?php echo $pmonth; ?>&nbsp;courses</h1>
    <p class="card-text"></p>
  </div>
</div>
<div class="card text-bg-secondary mb-3" style="max-width: 18rem;">
  <div class="card-header"><i class="bi bi-cart-check-fill"></i>&nbsp;Monthly Sellings</div>
  <div class="card-body">
    <h1 class="card-title"><?php echo $a; ?> courses</h1>
    <p class="card-text"></p>
  </div>
</div>



<div class="card text-bg-info mb-3" style="max-width: 18rem;">
  <div class="card-header"><i class="bi bi-currency-exchange"></i>&nbsp;Monthly Earnings</div>
  <div class="card-body">
    <h1 class="card-title">Rs. <?php echo $b; ?> .00</h1>
    <p class="card-text"></p>
  </div>
</div>
<div class="card text-bg-danger mb-3" style="max-width: 18rem;">
  <div class="card-header"><i class="bi bi-currency-exchange"></i>&nbsp;Total Active Time</div>
  <div class="card-body">
  <p id="demo"></p>

<script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2029 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

// Get today's date and time
var now = new Date().getTime();
  
// Find the distance between now and the count down date
var distance = countDownDate - now;
  
// Time calculations for days, hours, minutes and seconds
var days = Math.floor(distance / (1000 * 60 * 60 * 24));
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  
// Output the result in an element with id="demo"
document.getElementById("demo").innerHTML = days + "d " + hours + "h "
+ minutes + "m " + seconds + "s ";
  
// If the count down is over, write some text 
if (distance < 0) {
  clearInterval(x);
  document.getElementById("demo").innerHTML = "EXPIRED";
}
}, 1000);

</script>
    
    <p class="card-text"></p>
  </div>
</div>
<div class="card text-bg-success mb-3" style="max-width: 18rem;">
  <div class="card-header"><i class="bi bi-arrow-down-right-circle-fill"></i>&nbsp;Total Engagements</div>
  <div class="card-body">
  <?php
                                            $user_rs = Database::search("SELECT * FROM `user`");
                                            $user_num = $user_rs->num_rows;
                                            ?>
                                           
                                           <h1><?php echo $user_num; ?> Members</h1>
                                           <?php
                                            $product_rs = Database::search("SELECT * FROM `product`");
                                            $product_num = $product_rs->num_rows;
                                            ?>
    <p class="card-text"></p>
  </div>
</div>
<div class="card text-bg-light mb-3" style="max-width: 18rem;">
  <div class="card-header"><i class="bi bi-member-fill"></i>&nbsp;Total Coures</div>
  <div class="card-body">
    <h1 class="card-title"><?php echo $product_num; ?><h5>Courses Available</h5></h1>
    <p class="card-text"></p>
  </div>
</div>
</span>
</div>
</div>
<div class="col-12 col-lg-4">
                                                    <div class="row">

                                               <span> <div class="" style="width: 30rem;">
                                               <p class="card-text "><h2>Total Sellings&nbsp;<i class="bi bi-bar-chart-line-fill"></i></h2></p>
  <?php

$yt_rs = Database::search("SELECT * FROM `invoice` WHERE `product_id`='".$product_data["id"]="1"."'");
                                            $yt_num = $yt_rs->num_rows;

                                            $eb_rs = Database::search("SELECT * FROM `invoice` WHERE `product_id`='".$product_data["id"]="3"."'");
                                            $eb_num = $eb_rs->num_rows;

                                            $dm_rs = Database::search("SELECT * FROM `invoice` WHERE `product_id`='".$product_data["id"]="8"."'");
                                            $dm_num = $dm_rs->num_rows;

                                            $fre_rs = Database::search("SELECT * FROM `invoice` WHERE `product_id`='".$product_data["id"]="7"."'");
                                            $fre_num = $fre_rs->num_rows;

                                            $web_rs = Database::search("SELECT * FROM `invoice` WHERE `product_id`='".$product_data["id"]="5"."'");
                                            $web_num = $web_rs->num_rows;

                                            $pho_rs = Database::search("SELECT * FROM `invoice` WHERE `product_id`='".$product_data["id"]="9"."'");
                                            $pho_num = $pho_rs->num_rows;

                                            $mic_rs = Database::search("SELECT * FROM `invoice` WHERE `product_id`='".$product_data["id"]="6"."'");
                                            $mic_num = $mic_rs->num_rows;

                                            $nft_rs = Database::search("SELECT * FROM `invoice` WHERE `product_id`='".$product_data["id"]="4"."'");
                                            $nft_num = $nft_rs->num_rows;
                                           




$query = "SELECT * FROM `product`";


$product_rs = Database::search($query);
$product_num = $product_rs->num_rows;



for ($x = 0; $x < $product_num; $x++) {
    $product_data = $product_rs->fetch_assoc();
                                                       

        
    }

  

    
?>


<html>

<head>

<link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="chart.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>



<canvas id="myChart" style="height: 5000px; width: 5000px;"></canvas>

<?php

echo "<input type='hidden' id= 'jan' value = '$yt_num' >";
echo "<input type='hidden' id= 'feb' value = '$eb_num' >";
echo "<input type='hidden' id= 'march' value = '$dm_num' >";
echo "<input type='hidden' id= 'april' value = '$fre_num' >";
echo "<input type='hidden' id= 'may' value = '$web_num' >";
echo "<input type='hidden' id= 'june' value = ' $pho_num' >";
echo "<input type='hidden' id= 'july' value = '$mic_num' >";
echo "<input type='hidden' id= 'aug' value = '$nft_num' >";

?>



<script>
    var jan = document.getElementById("jan").value;
    var feb = document.getElementById("feb").value;
    var march = document.getElementById("march").value;
    var april = document.getElementById("april").value;
    var may = document.getElementById("may").value;
    var june = document.getElementById("june").value;
    var july = document.getElementById("july").value;
    var aug = document.getElementById("aug").value;

   
  window.onload = function() {
    var randomScalingFactor = function() {
      return Math.round(Math.random() * 100);
    };
    var config = {
      type: 'pie',
      data: {
        datasets: [{
          data: [
            jan,
            feb,
            march,
            april,
            may,
            june,
            july,
            aug
          ],
          borderColor: "#fff",
          borderWidth: "3",
          hoverBorderColor: "#000",
          label: 'Monthly Sales Report',
          backgroundColor: [
            "#0190ff",
            "#56d798",
            "#ff8397",
            "#6970d5",
            "#f312cb",
            "#ff0060",
            "#ffe400",
            "black"
          ],
          hoverBackgroundColor: [
            "green",
            "green",
            "green",
            "green",
            "green",
            "green",
            "green",
            "green"
          ]
        }],
        labels: [
          'YouTube',
          'eBay',
          'Web Development',
          'Freelancing',
          'Social Media',
          'Photoshop',
          'Microsoft 365',
          'NFT Crypto'
        ]
      },
      options: {
        responsive: true
      }
    };
    var ctx = document.getElementById('myChart').getContext('2d');
    window.myPie = new Chart(ctx, config);
  };
</script>

</body>

</html>
</br>
  <div class="card-body text-center">
  <a href="revenue.php"><p>View Report</p></a>
  </div>
</div></span>
</div>
</div>


</div>
</div>
                                                </div>
                                                
                                                </div>
                                               
                                                    </div>
                                                </div>
                                                
                                               
                                                
                                                </div>
                                                
                                                </div>
                                                </div>
                                                </div><br/>
                                                
                                                
                                                
                                               
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
