<?php
if(!isset($_SESSION)) 
{ 
  session_start(); 
} 
require 'scripts/PHPMailerAutoload.php';


$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'h.bhattarai2000@gmail.com';                 // SMTP username
$mail->Password = 'Him@l321';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to
$to=$_SESSION['email'];
$mail->setFrom('h.bhattarai2000@gmail.com', 'GADA Technology');
$mail->addAddress($to);     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Account Confirmation Message';
$mail->Body = "
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------<br><br><br><br>
Username:" .$_SESSION['username']."<br>
Password:" .$_SESSION['password']."<br><br><br><br><br>
------------------------
 
Please click this link to activate your account:----------------------<br><br><br><br>
http://localhost/GadaTechnology/verify.php?activation_code=".$_SESSION['activation_code']."&email=".$_SESSION['email']." "; // Our message above including the link




$mail->send();

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} 
?>




