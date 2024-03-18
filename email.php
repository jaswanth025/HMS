<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$email = $_GET['email'];
$name = $_GET['name'];
$doctor = $_GET['doctor'];
$disease = $_GET['disease'];
$slot = $_GET['slot'];
$online_meeting_type = $_GET['online_meeting_type'];

$e = $_GET['email'];
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'chodavarapujaswanthkumar@gmail.com'; 
    $mail->Password = 'dywe spbm rvqf samt';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('chodavarapujaswanthkumar@gmail.com', 'Hospital Team');
    $mail->addAddress($e); 

    $mail->isHTML(true);
    $mail->Subject = "Appointment Confirmation";
    $mail->Body = "Dear $name, <br><br>Your appointment has been successfully booked with Dr. $doctor for problem $disease at $slot on online $online_meeting_type. <br><br>The payment of 300 INR was successfully completed through Razorpay. <br> Payment ID: {$_GET['rp_payment_id']}.<br>Order ID: {$_GET['oid']}.<br>Signature: {$_GET['rp_signature']}.<br>Time of Payment: " . date('Y-m-d H:i:s') . "<br><br>Thank you for choosing our hospital.<br><br>Regards,<br>Hospital Team";

    $mail->send();
    header("Location: payment-success.php"); // Redirect to payment success page
    exit();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
