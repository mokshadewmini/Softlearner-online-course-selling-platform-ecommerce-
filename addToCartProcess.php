<?php

session_start();
require "connection.php";

if(isset($_SESSION["u"])){
if(isset($_GET["id"])){
    
    $email = $_SESSION["u"]["email"];
    $pid = $_GET["id"];

    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='".$pid."' AND `user_email`='".$email."'");
    $cart_num = $cart_rs->num_rows;

    $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$pid."'");
    $product_data = $product_rs->fetch_assoc();


    if($cart_num == 1){

        $cart_data = $cart_rs->fetch_assoc();
        $current_qty = $cart_data["qty"];
        $new_qty = (int)$current_qty + 1;

        if($current_qty >= $new_qty){

            Database::iud("UPDATE `cart` SET `qty`='".$new_qty."' WHERE `product_id`='".$pid."' AND `user_email`='".$email."'");
            echo ("Product Updated");

        }else{
            echo ("you have already added this course");
        }

    }else{

        Database::iud("INSERT INTO `cart`(`product_id`,`user_email`,`qty`) VALUES ('".$pid."','".$email."','1')");
        echo ("success");

    }

}else{
    echo ("Something went wrong");
}
}else{
    echo ("Please Sign In or Register.");
}
?>