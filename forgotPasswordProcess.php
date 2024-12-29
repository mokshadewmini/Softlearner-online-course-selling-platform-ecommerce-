<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["e"])){

    $email = $_GET["e"];

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."'");
    $n = $rs->num_rows;

    if($n == 1){

        $code = uniqid();

        Database::iud("UPDATE `user` SET `verification_code`='".$code."' WHERE 
        `email`='".$email."'");

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kumarithilan47@gmail.com';
        $mail->Password = 'dvsvrddcnyrxoaiv';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('kumarithilan47@gmail.com', 'Forgot Password Verification Code');
        $mail->addReplyTo('kumarithilan47@gmail.com', 'Forgot Password Verification Code');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'eShop Forgot Password Verification Code';
        $bodyContent = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Verification</title>
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
            width: 300px;
            margin-bottom: 20px;
        }
        .email-content {
            margin-bottom: 20px;
            color: #333333;
            line-height: 1.6;
        }
        .verification-code {
            display: inline-block;
            background-color: #007bff;
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
        <img src="https://i.pinimg.com/564x/cd/51/b7/cd51b7b03e8a309245c2e1b1378e7313.jpg" alt="Logo" class="logo">
        <h2>Password Reset Request</h2>
        <div class="email-content">
            <p>Hello,</p>
            <p>We received a request to reset your password. Please use the verification code below to reset your password.</p>
            <div class="verification-code">'.$code.'</div>
            <p>If you did not request a password reset, please ignore this email or contact support if you have questions.</p>
            <p>Thank you,<br>The SoftLeaRNER Team</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 SoftLeaRNER. All rights reserved.</p>
            <p>Wellawattha, Colombo 06, Sri Lanka</p>
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
        echo ("Invalid Email address");
    }

}

?>