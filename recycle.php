<?php
  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'path/to/PHPMailer/src/Exception.php';
// require 'path/to/PHPMailer/src/PHPMailer.php';
// require 'path/to/PHPMailer/src/SMTP.php';
require 'vendor/autoload.php';
  
$mail = new PHPMailer(true);
  

$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "";
$mail->Password   = "";
$mail->IsHTML(true);
$mail->AddAddress("user@gmail.com", "Subhalaxmi Das");
$mail->SetFrom("user@gmail.com", "Subhalaxmi Das");
// $mail->AddReplyTo("destinatin.id@domain.com", "Recipient Display Name"); - Enable if this is different from the sender mail id.
// $mail->AddCC("destinatin.id@domain.com", "Sender Display Name"); - Add any CC 
$mail->Subject = "Test Email using PHP Mailer";
$content = "<b>This is a Test Email sent via SMTP Server using PHP mailer class.</b>";
$mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo "Error while sending Email.";
  var_dump($mail);
} else {
  echo "Email sent successfully";
}
?>

