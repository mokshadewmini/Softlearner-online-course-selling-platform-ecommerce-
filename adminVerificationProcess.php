<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST["e"])){
    $email = $_POST["e"];

    $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email`='".$email."'"); 
    $admin_num = $admin_rs->num_rows;

    if($admin_num > 0){

        $code = uniqid();

        Database::iud("UPDATE `admin` SET `verification_code`='".$code."' WHERE `email`='".$email."'");

        $mail = new PHPMailer; 
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kumarithilan47@gmail.com';
        $mail->Password = 'jafonqkhurxekqal';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('kumarithilan47@gmail.com', 'Admin verification');
        $mail->addReplyTo('kumarithilan47@gmail.com', 'Admin verification');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Admin verification code';
        $bodyContent = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Verification</title>
    <style>
        body {
            font-family:  Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
            text-align: center;
        }
        .logo {
            width: 200px;
            margin-bottom: 20px;
        }
        .email-content {
            margin-bottom: 20px;
            color: #333333;
            line-height: 1.6;
        }
        .verification-code {
            display: inline-block;
            background-color: #28a745;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 24px;
            letter-spacing: 2px;
            margin: 20px 0;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #aaaaaa;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <img src="https://i.pinimg.com/564x/0e/f8/b0/0ef8b08b7c3214a8d8df6212ede2a87d.jpg" alt="Logo" class="logo">
        <h2>Admin Verification Required</h2>
        <div class="email-content">
            <p>Hello,</p>
            <p>An administrative action requires verification. Please use the verification code below to proceed.</p>
            <div class="verification-code">'.$code.'</div>
            <p>If you did not request this action, please contact support immediately.</p>
            <p>Thank you,<br>The SoftLeaRNER Team</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 SoftLeaRNER. All rights reserved.</p>
            <p>Wellawattha, Colombo 06, Sri Lanka.</p>
        </div>
    </div>
</body>
</html>
';
        $mail->Body    = $bodyContent;
            if (!$mail->send()) {
                echo 'Verification code sending failed';
            } else {
                echo 'Success';
            }

        }else{
            echo ("You are not a valid user");
        }

}else{
    echo ("Email field should not be empty.");
}

?>