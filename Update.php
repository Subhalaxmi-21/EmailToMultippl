<?php
    

    // // MYADDED CODE
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use League\OAuth2\Client\Provider\Google;
    require 'vendor/autoload.php';
    // error_reporting(0);
    session_start();
    $mail = new PHPMailer(true);
   
    $mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 0;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";

    $subject=$_POST['subject'];
    $body=$_POST['body'];
    
    $adrec=$_POST['adrec'];
    $names=$_SESSION['user'];
    // $csv= $_FILES['receipt']['name'];
    // $file = fopen("$csv", "r"); 
    $mail->Username   = $_SESSION['email'];
    $mail->Password   = $_SESSION['name'];
    if($_FILES['attach']['name']){
    $mail->AddAttachment($_FILES['attach']['tmp_name'] ,'uploads/' . $_FILES['attach']['name']);
    }
    $mail->IsHTML(true);
    $mail->SetFrom($_SESSION['email'], $_SESSION['user']);
    
    $mail->Subject = $subject;
    $mail->MsgHTML($body);
    if($adrec){
    $mail->addAddress($adrec);
    if(!$mail->send()){
        $_SESSION['error']="Pls try again!";
        
    }else{
        $_SESSION['error']="Email sent successfully!";
    }
    }
    // $mail->SetFrom($_SESSION['email'], $_SESSION['user']);
    
    // $mail->Subject = $subject;
  
    $address='';
    if( $_FILES['receipt']['name']){
        $csv= $_FILES['receipt']['name'];
        $file = fopen("$csv", "r");
        while (($data = fgetcsv($file)) !== false) {
            foreach ($data as $i) {
                $address .=  htmlspecialchars($i).","; 
                    
            }
        }
        $str=explode(",",$address);
        foreach($str as $key => $value){
            if($value){
            $mail->ClearAllRecipients();
            $mail->AddAddress(trim($value) );
            $mail->MsgHTML($body);
            if(!$mail->send()){
                $_SESSION['error']="Pls try again!";
                
            }else{
                $_SESSION['error']="Email sent successfully!";
            }
        }else{
            $val="hi";
        }
        
            // echo 'Message has been sent';
        } 

    // header("Location: update.php");
   
    fclose($file);
} 
    $mail->SmtpClose(); 
    // header('Location: Final.php');
    // exit();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">

    <title>EmailWeb</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>
<body class="bodycss">
    <!-- Header -->
    <header class="jumbotron headcss">
        <div class="container ">
            <div class="row justify-content-center align-self-center">
                <div class="col-md-6">
                    <h1>Tunica Labs</h1>
                </div>
                <div class="col-md-6">
                    <h4>Email and Message Broadcasting System</h4>
                </div>
            </div>  
        </div>
    </header>
   <!-- Body -->
    <div class="container text-sm-center ">
        <div class="row">
            <div class="col-sm-4">&nbsp;</div>
            <div class='col-sm-4 jumbotron main'>
                <h3  >Hello <?php echo $_SESSION['user'] ?>!</h3>
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSq85nM_mqPIwNv98rKduTCxaGlckt6D2raXXXbpqcMlgbE27o7jhg8rHtLmobdpNaqcho&usqp=CAU" alt="human" class="usersymb">
                <h4><?php echo $_SESSION['error']; ?></h4>
            </div>
            <div class="col-sm-4">&nbsp;</div>
        </div>
    </div>

<!-- footer -->
    <footer>
        <div class="footer container-fluid">
            <div class="row">
                <div class="col-sm-0 col-md-2"></div>
                <div class="col-sm-12 col-md-4">
                    <ul style="list-style: none;">
                        <li><h5>Contact</h5></li>
                        <li>
                            <a href="https://www.linkedin.com/company/tunica-labs-pvt.-ltd/?originalSubdomain=in"><i class="fab fa-linkedin">
                                </i>Tunica Labs Private Limited | LinkedIn
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/tunicalabs/"><i class="fab fa-facebook"></i>
                                Tunica Labs Pvt. Ltd. - Home | Facebook
                            </a>
                        </li>
                    </ul> 
                </div>
                <div class="col-sm-0 col-md-1"></div>
                <div class="col-sm-12 col-md-3">
                    <h5>Address</h5>
                    <address>
                        
                        B1105 ALLAMANDA,<br>
                        PRIDE PARK RESIDENCY NEAR R MALL,<br>
                        GODHBUNDER ROAD THANE <br>
                        Thane MH 400607 <br>
                        India
                        
                    </address>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </footer>
    
    <!-- GOOGLE1 LINE -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

