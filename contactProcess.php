<?php
session_start();


require "connection.php";
require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

$subject = $_POST["subject"];
$message = $_POST["message"];


 if(isset($_SESSION["u"])){

    

    $email = $_SESSION["u"]["email"];
    $name = $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"];

    if(empty($subject)){
        echo ("Please enter a subject");
    }else if(empty($message)){
        echo ("Enter your message");
    }else{
           

            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kumarithilan47@gmail.com';
            $mail->Password = 'jafonqkhurxekqal';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('kumarithilan47@gmail.com', 'Contact with users');
            $mail->addReplyTo('kumarithilan47@gmail.com', 'Contact with users');
            $mail->addAddress('dewminimoksha40@gmail.com');
            $mail->isHTML(true);
            $mail->Subject = 'From Softlearner Team';
            $bodyContent = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact with users</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border: 1px solid #e0e0e0; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <div style="text-align: center; margin-bottom: 20px;">
            <img src="https://i.pinimg.com/236x/55/8a/95/558a95fa191c6efde5a75c1ab64b7f5e.jpg" alt="Account Blocked" style="width: 100px; border-radius: 50%;">
        </div>
        <h2 style="color: #333333; text-align: center; font-family: Tahoma, Geneva, Verdana, sans-serif;">Contact with users</h2>
        <p style="color: #555555; font-size: 16px; text-align: center;">From '.$name.' ,</p>
        <p style="color: #555555; font-size: 16px; text-align: center;"><b>Subject:</b> '.$subject .',</p>
         <p style="color: #555555; font-size: 16px; text-align: center;"><b>Message:</b> '.$message.',</p>
        <p style="color: #555555; font-size: 16px; text-align: center;">Please help them by replying immediately,  at: <a href="mailto:'.$email.'" style="color: #007bff; text-decoration: none;">'.$email.'</a></p>
        <p style="color: #555555; font-size: 16px; text-align: center;">Thank you,</p>
        <p style="color: #555555; font-size: 16px; text-align: center;">The User Management Team</p>
    </div>
</body>
</html>

';
            $mail->Body    = $bodyContent;
                if (!$mail->send()) {
                    echo 'Email sending failed';
                } else {
                    echo 'success';
                }

               

            }

}else{
    echo ("Something went wrong.");
}

?>