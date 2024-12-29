<?php

    require "connection.php";

    $ft = $_POST["fft"];
    $pid = $_POST["fpid"];
    $txt = $_POST["ftxt"];
    $email = $_POST["femail"];
    $fname = $_POST["ffname"];
    $lname = $_POST["flname"];
    
   

    
    
  

    $code = uniqid();

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `feedback` 
          
            (`type_id`,`feedback`,`date`,`user_email`,`product_id`,`fname`,`lname`) VALUES 
            ('" . $ft . "','" . $txt . "','" . $date . "','" . $email . "','" . $pid . "','" . $fname . "','" . $lname . "')");
            

            echo ("success");

    



?>