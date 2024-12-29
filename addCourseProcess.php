  <?php

session_start();
require "connection.php";

$email = $_SESSION["au"]["email"];

$t1 = $_POST["t1"];
$t2 = $_POST["t2"];
$yl = $_POST["yl"];
$c = $_POST["c"];
$re = $_POST["re"];
$desc = $_POST["desc"];
$w = $_POST["w"];
$price = $_POST["cost"];
$l = $_POST["l"];
$h = $_POST["h"];

 if(empty($t1)){
    echo ("Please Enter Title 1");
}else if(empty($t2)){
    echo ("Please Enter Title 2.");
}else if(empty($yl)){
    echo ("Couldn't be empty this column.");
}else if(empty($c)){
    echo ("Couldn't be empty this column.");
}else if(empty($re)){
    echo ("Couldn't be empty this column.");
}else if(empty($desc)){
    echo ("Please Enter a Description.");
}else if(empty($price)){
    echo ("Please Enter any Price.");
}else if(empty($w)){
    echo ("Couldn't be empty this column.");
}else if(empty($l)){
    echo ("Couldn't be empty this column.");
}else if(empty($h)){
    echo ("Couldn't be empty this column.");
}else{

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    $status = 1;

    Database::iud("INSERT INTO `product`
    (`price`,`description`,`title`,`title 2`,`datetime_added`,
    `status_id`,`you_learn`,`requirements`,`user_email`,`tot_hours`,`lessons`) VALUES 
    ('".$price."','".$desc."','".$t1."','".$t2."','".$date."','".$status."',
    '".$yl."','".$re."','".$email."','".$h."','".$l."')");

    

    $product_id = Database::$connection->insert_id;

    $length = sizeof($_FILES);

    

        for($x = 0; $x < $length;$x++){
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
                    Database::iud("INSERT INTO `image`(`image_code`,`product_id`) VALUES ('".$file_name."','".$product_id."')");

                }
            }
        
    
        else{
            echo ("File type not allowed!");
        }
    
       
    
    }
    echo ("Product saved successfully");
}
    ?>