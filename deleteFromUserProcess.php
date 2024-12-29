<?php

require "connection.php";

if(isset($_GET["email"])){
    $cid = $_GET["email"];

    

   

  
    Database::iud("DELETE FROM `user` WHERE `email` ='".$cid."'");

    echo ("success");

}else{
    echo("something went wrong");
}



?>