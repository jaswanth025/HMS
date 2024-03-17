<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["submit"])){
    $mal = new PHPMailer(true);

    $mail->isSMTP();
    $mail->HOST='smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->username = '';//mail
    $mail->Password = '';
    $mail->SMTPSecure = 'ssl';
    $mail->POrt =  465;

    $mail->setFrom('');
    $mail->addAddress($_POST("email"));

    $mail->isHTML(true);

    $mail->Subject="";
    $mail->Body='';

    $mail->send();

echo " <script> alert('sent Successfully');</script>"

}