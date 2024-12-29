<?php
session_start();
require "connection.php";


if(isset($_GET["id"])){

    $mid = $_GET["id"];
        

    $msg_rs = Database::SEARCH("SELECT * FROM `newmsg` WHERE `id`='".$mid."'");
    $msg_num = $msg_rs->num_rows;
    $msg_data = $msg_rs->fetch_assoc();

    if($msg_num == 0){
        echo ("Something went wrong. Please try again later.");
        } else {

            Database::iud("INSERT INTO `chat`(`newmsg_id`,`user_email`,`name`,`subject`,`message`,`joined_date`) 
    VALUES ('".$msg_data["id"]."','".$msg_data["user_email"]."','" . $msg_data["name"] . "','" . $msg_data["subject"] . "','" . $msg_data["message"] . "','" . $msg_data["joined_date"] . "')");
           
            Database::iud("DELETE FROM `newmsg` WHERE `id` ='".$msg_data["id"]."'");

            echo ("success");
        }

}else{
    echo("something went wrong");
}



?>