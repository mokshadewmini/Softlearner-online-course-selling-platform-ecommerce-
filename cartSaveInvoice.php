<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
   
    $total = "0";

    $crs = Database::search("SELECT * FROM  `cart` WHERE `user_email` = '".$_SESSION["u"]["email"]."'");
    $cnum = $crs->num_rows;

    for ($x = 0; $x < $cnum; $x++) {

        $cd = $crs->fetch_assoc();

        $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cd["product_id"] . "'");
        $product_data = $product_rs->fetch_assoc();

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        $total += ($product_data["price"] * $cd["qty"]);

                $order_id = uniqid(); 

                Database::iud("INSERT INTO `invoice`(`order_id`,`date`,`total`,`status`,`product_id`,`user_email`) VALUES 
                ('" . $order_id . "','" . $date . "','" . $total . "','0','" . $cd["product_id"] . "','" . $cd["user_email"] . "')");
           
    } 
    
  echo ("1");

}
