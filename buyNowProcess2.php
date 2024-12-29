<?php

session_start();
require "connection.php";

if(isset($_SESSION["u"])){

    $t = $_GET["t"];
   
    $umail = $_SESSION["u"]["email"];

    $array;
    $order_id = uniqid();

    

   
        $item = $product_data["title"];
        $amount = (int)$product_data["price"];
        $hash = strtoupper(
            md5(
                 "1221748" .
                 $order_id .
                 number_format($amount, 2, '.', '') .
                 "LKR" .
                 strtoupper(md5("MTgxNTI4NzE0MDg5OTE2ODYxMjYzMTE5NDg2NDE2MDAxMDU5Nzg="))
            )
            );

        $fname = $_SESSION["u"]["fname"];
        $lname = $_SESSION["u"]["lname"];
        $mobile = $_SESSION["u"]["mobile 01"];
     

        $array["id"] = $order_id;
        $array["item"] = $item;
        $array["amount"] = $amount;
        $array["fname"] = $fname;
        $array["lname"] = $lname;
        $array["mobile 01"] = $mobile;
        $array["hash"] = $hash;
        $array["email"] = $umail;

        echo json_encode($array);

  
}else{
    echo ("1");
}

?>