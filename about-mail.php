<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$courses = $_POST['courses'];
$enqtype = $_POST['enqtype'];
$message = $_POST['message'];

$site_owners_email = 'hello@eduork.com'; // Replace this with your own email address
$site_owners_name = 'Query Form'; // replace with your name

if (!$error) {

   $mail = new PHPMailer();

   $mail->From = $email;
   $mail->Subject = "Contact Us";
   $mail->AddAddress($site_owners_email, $site_owners_name);
   $mail->Body = 'Name: '.$name."\r\n".'Email id: '.$email."\r\n".'Phone No: '.$mobile."\r\n".'Course: '.$courses."\r\n".'Enquery Type: '.$enqtype."\r\n".'Message: '.$message;

   $mail->Send();
   echo  "<script type='text/javascript'>alert('submitted successfully!')</script>";
   header ("refresh:0; url=index.html");
} # end if no error
else {

   $response = (isset($error['name'])) ? "<div class='alert-box alert'>" . $error['name'] . "</div> \n" : null;
   $response .= (isset($error['email'])) ? "<div class='alert-box alert'>" . $error['email'] . "</div> \n" : null;
    $response .= (isset($error['mobile'])) ? "<div class='alert-box alert'>" . $error['mobile'] . "</div> \n" : null;
    $response .= (isset($error['courses'])) ? "<div class='alert-box alert'>" . $error['courses'] . "</div> \n" : null;
    $response .= (isset($error['enqtype'])) ? "<div class='alert-box alert'>" . $error['enqtype'] . "</div> \n" : null;
   $response .= (isset($error['message'])) ? "<div class='alert-box alert'>" . $error['message'] . "</div>" : null;

   echo $response;
} # end if there was an error sending
?>
