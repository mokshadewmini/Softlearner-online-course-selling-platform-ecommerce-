
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
        
    ?>
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

$freq_rs = Database::search("SELECT product.id, product.title, COUNT(invoice.product_id) AS value_occurence
FROM invoice 
INNER JOIN product  ON invoice.product_id = product.id
GROUP BY product.id, product.title
ORDER BY value_occurence DESC
LIMIT 1;");

$freq_num = $freq_rs->num_rows;
for ($x = 0; $x < $freq_num; $x++) {
    $freq_data = $freq_rs->fetch_assoc();

    
?>
<?php
}
?>
  <?php
                                            $user_rs = Database::search("SELECT * FROM `user`");
                                            $user_num = $user_rs->num_rows;
                                            ?>
                                           
                                          
                                           
          <li>
         
    
    
<?php


?>

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
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }
        .table thead th {
            background-color: #007bff;
            color: white;
        }
        .summary {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container" id="page">
    <h6><a href="dashboard.php"><-Back</a></h6>
    <h1 class="text-center">Monthly Revenue</h1>
    <div class="summary">
    
        <h3>Summary</h3>
        <p>Total Sales:Rs. <?php echo $b; ?>.00</p>
        <p>Total Units Sold: 8</p>
        <p>Top Courses: <?php echo $freq_data["title"]; ?></p>
    </div>

    <h3>Sales by Course</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Course</th>
                <th>Units Sold</th>
                <th>Revenue</th>
            </tr>
        </thead>
       
                                            

                                          
                                        
        <tbody>
            <tr>
                <td>You Tube Master Course For Beginners</td>
               
                <td>10</td>
                
                <td>Rs. 150 000/=</td>
            </tr>
            <tr>
                <td>Money making eBay Dropshipping Course</td>
               
                <td>8</td>
                
                <td>Rs. 70 000/=</td>
            </tr>
            <tr>
                <td>The Complete Advanced NFT Course</td>
               
                <td>6</td>
                
                <td>Rs. 55 000/=</td>
            </tr>
            <tr>
                <td>The Social Media Marketing Course</td>
               
                <td>4</td>
                
                <td>Rs. 60 000/=</td>
            </tr>
            <tr>
                <td>Ultimate Microsoft Office 365 Training Course</td>
               
                <td>0</td>
                
                <td>Rs. 0/=</td>
            </tr>
            <tr>
                <td>Building Your Freelancing Career Specialization</td>
               
                <td>7</td>
                
                <td>Rs. 70 000/=</td>
            </tr>
            <tr>
                <td>HTML, CSS, and Javascript for Web Developers</td>
               
                <td>6</td>
                
                <td>Rs. 60 000/=</td>
            </tr>
            <tr>
                <td>The Advanced Adobe PhotoShop course</td>
               
                <td>3</td>
                
                <td>Rs. 50 000/=</td>
            </tr>
            
        </tbody>
      
    </table>

    <h3>Sales by Region</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Region</th>
                <th>Units Sold</th>
                <th>Revenue</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Horana</td>
                <td>5</td>
                <td>Rs. 50 000/=</td>
            </tr>
            <tr>
                <td>Matara</td>
                <td>3</td>
                <td>Rs. 40 000/=</td>
            </tr>
            <tr>
                <td>Trinco</td>
                <td>7</td>
                <td>Rs. 60 000/=</td>
            </tr>
            <tr>
                <td>Anuradhapura</td>
                <td>10</td>
                <td>Rs. 80 000/=</td>
            </tr>
        </tbody>
    </table>
    
</div>
<button class="btn btn-dark me-2" onclick="printReport();"><i class="bi bi-printer-fill"></i> Print Report</button>
</body>
</html>

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
<script src="script.js"></script>
</body>
</html>
