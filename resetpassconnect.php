<?php
// Load the PHPMailer library
require_once 'vendor/autoload.php';

// Generate a 6-digit random OTP
$otp = rand(100000, 999999);

// Set up the PHPMailer object
$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server address
$mail->SMTPAuth = true;
$mail->Username = 'Shafalmujeebm2728'; // Replace with your Gmail address
$mail->Password = 'Shafal@123'; // Replace with your Gmail password
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->setFrom('Shafalmujeebm2728@gmail.com', 'Shafal Mujeeb'); // Replace with your name and email address
$mail->addAddress($_POST['email']); // Replace with the user's email address
$mail->isHTML(true);
$mail->Subject = 'Your OTP for resetting your password';
$mail->Body = 'Your OTP is: ' . $otp;

// Send the email
if ($mail->send()) {
  echo 'Email sent successfully';
} else {
  echo 'Email could not be sent';
}
?>

