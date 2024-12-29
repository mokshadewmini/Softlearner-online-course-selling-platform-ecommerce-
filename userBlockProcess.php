<?php

require "connection.php";
require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["email"])){

    $email = $_GET["email"];

    $product_rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."'");
    $product_num = $product_rs->num_rows;

    if($product_num == 1){

        $product_data = $product_rs->fetch_assoc();

        if($product_data["status_id"] == 1){
            Database::iud("UPDATE `user` SET `status_id`= '2' WHERE `email`='".$email."'");
           

            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kumarithilan47@gmail.com';
            $mail->Password = 'jafonqkhurxekqal';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('kumarithilan47@gmail.com', 'From Softlearner Team');
            $mail->addReplyTo('kumarithilan47@gmail.com', 'From Softlearner Team');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'From Softlearner Team';
            $bodyContent = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Blocked Notification</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border: 1px solid #e0e0e0; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <div style="text-align: center; margin-bottom: 20px;">
            <img src="https://i.pinimg.com/236x/a6/27/df/a627df548daa9fa419132af1e6bfd9ab.jpg" alt="Account Blocked" style="width: 100px; border-radius: 50%;">
        </div>
        <h2 style="color: #333333; text-align: center; font-family: Tahoma, Geneva, Verdana, sans-serif;">Account has been Blocked</h2>
        <p style="color: #555555; font-size: 16px; text-align: center;">Dear student,</p>
        <p style="color: #555555; font-size: 16px; text-align: center;">Your account has been blocked due to some restricted reason.</p>
        <p style="color: #555555; font-size: 16px; text-align: center;">For any inquiries, please contact us at: <a href="mailto:softlearner@gmail.com" style="color: #007bff; text-decoration: none;">softlearner@gmail.com</a></p>
        <p style="color: #555555; font-size: 16px; text-align: center;">Thank you,</p>
        <p style="color: #555555; font-size: 16px; text-align: center;">The Support Team</p>
        <div style="border-top: 1px solid #e0e0e0; margin-top: 20px; padding-top: 10px; text-align: center; font-size: 12px; color: #aaaaaa;">
            <p>&copy; 2024 SoftLeaRNER. All rights reserved.</p>
            <p>Wellawattha, Colombo 06, Sri Lanka </p>
        </div>
    </div>
</body>
</html>


';
            $mail->Body    = $bodyContent;
                if (!$mail->send()) {
                    echo 'Email sending failed';
                } else {
                    echo 'Success';
                }

                echo ("Deactivated"); 

        }else if($product_data["status_id"] == 2){
            Database::iud("UPDATE `user` SET `status_id`= '1' WHERE `email`='".$email."'");
            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kumarithilan47@gmail.com';
            $mail->Password = 'jafonqkhurxekqal';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('kumarithilan47@gmail.com', 'From Softlearner Team');
            $mail->addReplyTo('kumarithilan47@gmail.com', 'From Softlearner Team');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'From Softlearner Team';
            $bodyContent = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reactivate Your Account</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border: 1px solid #dddddd; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <div style="text-align: center; margin-bottom: 20px;">
            <img src="https://i.pinimg.com/236x/3c/9e/4b/3c9e4b32b67d641965915ee08db63844.jpg" alt="Reactivate Account" style="width: 100px; border-radius: 50%;">
        </div>
        <h2 style="color: #333333; text-align: center; font-family: Tahoma, Geneva, Verdana, sans-serif;">Reactivate Your Account</h2>
        <p style="color: #555555; font-size: 16px; text-align: center;">Dear student,</p>
        <p style="color: #555555; font-size: 16px; text-align: center;">Your account has been blocked due to some restricted reason. We would like to help you reactivate your account.</p>
        <p style="color: #555555; font-size: 16px; text-align: center;">To reactivate your account, please click the button below or contact us at: <a href="mailto:softlearner@gmail.com" style="color: #007bff; text-decoration: none;">softlearner@gmail.com</a></p>
        <div style="text-align: center; margin-top: 20px;">
            <a href="#" style="background-color: #007bff; color: #ffffff; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-size: 16px;">Reactivate Account</a>
        </div>
        <p style="color: #555555; font-size: 16px; text-align: center; margin-top: 20px;">Thank you,</p>
        <p style="color: #555555; font-size: 16px; text-align: center;">The Support Team</p>
        <div style="border-top: 1px solid #dddddd; margin-top: 20px; padding-top: 10px; text-align: center; font-size: 12px; color: #aaaaaa;">
            <p>&copy; 2024 SoftLeaRNER. All rights reserved.</p>
            <p>Wellawattha, Colombo 06, Sri Lanka </p>
        </div>
    </div>
</body>
</html>



';
            $mail->Body    = $bodyContent;
                if (!$mail->send()) {
                    echo 'Email sending failed';
                } else {
                    echo 'Success';
                }

            echo ("Activated");
        }

    }else{
        echo ("Cannot find the User. Please try again later.");
    }

}else{
    echo ("Something went wrong.");
}

?>