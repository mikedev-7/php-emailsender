

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$mail = new PHPMailer(true);

try {
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $location = $_POST['location'];
        $comment = $_POST['comment'];
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'eihmenormike@gmail.com';               
        $mail->Password   = '';                             
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 587;                                    
    
        //SENDER
        $mail->setFrom($email,  $name);
    
        $mail->addAddress($email, 'Joe User');     
        //Add a recipient
        $mail->addAddress('michaeltimi14@gmail.com');               //Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $location;
        $mail->Body    = $comment;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';

    }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
     

   ?>

<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="utf-8">
       <link rel="stylesheet"  href="style.css">
       <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
       <link rel="stylesheet" href="file:///E:/fontawesome/css/all.css">
   </head>
   <body>
    <div id="form">
        <h1>Send Message</h1>
        <div id="name">
            <input type="email" placeholder="Your Name" id="names">
            <input type="email" placeholder="Your Email" id="email-address">
        </div>
        <div id="location">
            <input type="email" placeholder="Location" id="location">
        </div>
        <div id="comment">
            <input type="email" placeholder="Comment" id="long-text">
        </div>
        <div id="submit">
            <input type="submit" value="Send Message">
        </div>
    </div>

   </body>
   </html>