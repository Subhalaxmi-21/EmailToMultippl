<?php
    session_start();
    if (!isset($_SESSION['access_token'])) {
        header('Location: signin.php');
        exit();
    }
?>
<!-- Now need to input from signin -->
    
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
        <div class="container jumbotron main ">
        <h3 class="text-sm-right">Welcome <?php echo $_SESSION['givenName']." ".$_SESSION['familyName'] ?></h3>
        <h4 class="text-sm-right"> <a href="logout.php">Logout</a>  </h4>
        <h3 style="color: #7231A4; padding-left: 2.7%; padding-bottom: 1.5%;">Email related details</h3>
        <form>
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <label for="subject">Enter subject of email address :</label>
                    </div>
                    <div class="col-xs-12 col-sm-8"><input type="text" id='subject' name='subject' placeholder="E.g. Job opportunity "></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <label for="body">Enter body of email address : </label>
                    </div>
                    <div class="col-xs-12 col-sm-8"><textarea name="body" id="body" cols="40" rows="15" placeholder="Body of email..."></textarea></div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <label for="attach">Enter any attachment to mail : </label>
                    </div>
                    <div class="col-xs-12 col-sm-8"><input type="file" id="attach" name="attach"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <label for="attach">Enter an excel sheet of receipent's emailid: </label>
                    </div>
                    <div class="col-xs-12 col-sm-8"><input type="file" id="attach" name="attach"></div>
                </div>
                <br>
                <div class="flexs">
                    <button class="btn">Send</button>
                </div>
            </form>
        </div>


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
        

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
    </html>