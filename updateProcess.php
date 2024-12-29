<?php

session_start();
require "connection.php";

if(isset($_SESSION["p"])){

    $pid = $_SESSION["p"]["id"];

    $t1 = $_POST["t1"];
    $t2 = $_POST["t2"];
    $l = $_POST["l"];
    $h = $_POST["h"];
    $desc = $_POST["desc"];
    

    Database::iud("UPDATE `product` SET `title`='".$t1."',`title 2`='".$t2."',`lessons`='".$l."',
    `tot_hours`='".$h."',`description`='".$desc."' WHERE `id`='".$pid."'");

   

    if (isset($_FILES["image"])) {
        $image = $_FILES["image"];

        $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
        $file_ex = $image["type"];

        if (!in_array($file_ex, $allowed_image_extentions)) {
            echo ("Please select a valid image.");
        } else {

            $new_file_extention;

            if ($file_ex == "image/jpg") {
                $new_file_extention = ".jpg";
            } else if ($file_ex == "image/jpeg") {
                $new_file_extention = ".jpeg";
            } else if ($file_ex == "image/png") {
                $new_file_extention = ".png";
            } else if ($file_ex == "image/svg+xml") {
                $new_file_extention = ".svg";
            }

            $file_name = "resource/product/" . $_SESSION["p"]["id"] . "_" . uniqid() . $new_file_extention;

            move_uploaded_file($image["tmp_name"], $file_name);

                    
                    
                    Database::iud("INSERT INTO `image`(`image_code`,`product_id`) VALUES ('".$file_name."','".$pid."')");

                    echo ("success");

               

            }
        }
    

    else{
        echo ("File type not allowed!");
    }


    echo ("Product has been Updated!");

}

?>