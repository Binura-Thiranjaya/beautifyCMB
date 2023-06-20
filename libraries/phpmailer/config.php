<?php
if (!class_exists('PHPMailer\PHPMailer\Exception')) {
    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';
}

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;



$mail = new PHPMailer(true);
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
//Enable SMTP debugging.
$mail->SMTPDebug = 0;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "mail.englishwithearthsir.lk";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;     
$mail->Username = "welcome@englishwithearthsir.lk";                 
$mail->Password = "Welcome@4455";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to
$mail->Port = 587;                                   

$mail->From = "welcome@englishwithearthsir.lk";
$mail->FromName = "Earth LMS";

?>