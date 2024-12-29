<?php
session_start();
require "connection.php";


if(isset($_SESSION["u"])){

   

    $email = $_SESSION["u"]["email"];
    
    $array;

    $order_id = uniqid();

    $rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $email . "'");
    $num = $rs->num_rows;

    
        $total = "0";
       

        for ($x = 0; $x < $num; $x++) {
            $data = $rs->fetch_assoc();
            $rs1 = Database::search("SELECT * FROM `product` WHERE `id` = '" . $data["product_id"] . "'");
            $p = $rs1->fetch_assoc();

            

                $total += ($p["price"] * $data["qty"]);
                Database::iud("DELETE FROM `cart` WHERE `user_email`='".$email."'");
              
        }

        
        $item = "Selected Cart Items";
        $amount = ( (int)$total) ;

        $fname = $_SESSION["u"]["fname"];
        $lname = $_SESSION["u"]["lname"];
        $mobile = $_SESSION["u"]["mobile 01"];
      

        $array["id"] = $order_id;
        $array["item"] = $item;
        $array["amount"] = $amount;
        $array["fname"] = $fname;
        $array["lname"] = $lname;
        $array["mobile 01"] = $mobile;
        
        $array["email"] = $email;
        $array["hash"] = strtoupper(
            md5(
                "1221748" .
                $order_id .
                number_format($amount, 2, '.', '') .
                "LKR" .
                strtoupper(md5("MTgxNTI4NzE0MDg5OTE2ODYxMjYzMTE5NDg2NDE2MDAxMDU5Nzg="))
           )
        );;
        $array["status"] = "success";
        echo json_encode($array);

       
    
} else {
    echo ("1");
}
