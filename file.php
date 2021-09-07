<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use League\OAuth2\Client\Provider\Google;
require 'vendor/autoload.php';
// error_reporting(0);
session_start();
$mail = new PHPMailer(true);

$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 2;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";

$subject="Hello";
$body="Bosys";

// $adrec=$_POST['adrec'];
$names="Subhalaxmi Das";
// $csv= $_FILES['receipt']['name'];
$file = fopen("emails.csv", "r"); 
$mail->Username   = "";
$mail->Password   = "";

// $mail->AddAttachment($_FILES['attach']['tmp_name'] ,'uploads/' . $_FILES['attach']['name']);
$mail->IsHTML(true);
// $mail->addAddress($adrec);
$mail->SetFrom("subhalaxmi.das@somaiya.edu","Subhalaxmi Das");

$mail->Subject = $subject;

$address='';
while (($data = fgetcsv($file)) !== false) {
    foreach ($data as $value){
        $address .=  htmlspecialchars($value).","; 
            
    }
}
// echo $address;
$str=explode(",",$address);
// echo $str.value();
foreach($str as $key => $value){
    if($value){
    $mail->ClearAllRecipients();
    $mail->AddAddress(trim($value) );
    $mail->MsgHTML($body);
    if(!$mail->send()){
        echo "NO successfully";
    }else{
        echo "Sent successfully";
    }
}else{
    echo "Hi";
}
   
    // echo 'Message has been sent';
} 

    
    


fclose($file); 
$mail->SmtpClose(); 
echo "Success";

	// // Doubt in above code line
	// exit();

?>