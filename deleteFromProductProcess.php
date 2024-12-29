<?php

require "connection.php";

if(isset($_GET["id"])){
    $cid = $_GET["id"];

    $cart_rs = Database::SEARCH("SELECT * FROM `product` WHERE `id`='".$cid."'");
    $cart_data = $cart_rs->fetch_assoc();


   

  
    Database::iud("DELETE FROM `product` WHERE `id` ='".$cid."'");

    echo ("success");

}else{
    echo("something went wrong");
}



?>