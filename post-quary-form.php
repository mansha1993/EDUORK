<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$user_name = $_POST['user_name'];
$email = $_POST['email'];
$user_phone = $_POST['user_phone'];
$user_course = $_POST['user_course'];
$user_startdate = $_POST['user_startdate'];
$user_enddate = $_POST['user_enddate'];

$site_owners_email = 'hello@eduork.com'; // Replace this with your own email address
$site_owners_name = 'Query Form'; // replace with your name

if (!$error) {

   $mail = new PHPMailer();

   $mail->From = $email;
   $mail->Subject = "Contact Us";
   $mail->AddAddress($site_owners_email, $site_owners_name);
   $mail->Body = 'Name: '.$user_name."\r\n".'Email id: '.$email."\r\n".'Phone No: '.$user_phone."\r\n".'Course: '.$user_course."\r\n".'User Strtdate: '.$user_startdate."\r\n".'User End Date: '.$user_enddate;

   $mail->Send();
   echo  "<script type='text/javascript'>alert('submitted successfully!')</script>";
   header ("refresh:0; url=index.html");
} # end if no error
else {

   $response = (isset($error['user_name'])) ? "<div class='alert-box alert'>" . $error['user_name'] . "</div> \n" : null;
   $response .= (isset($error['email'])) ? "<div class='alert-box alert'>" . $error['email'] . "</div> \n" : null;
    $response .= (isset($error['user_phone'])) ? "<div class='alert-box alert'>" . $error['user_phone'] . "</div> \n" : null;
    $response .= (isset($error['user_course'])) ? "<div class='alert-box alert'>" . $error['user_course'] . "</div> \n" : null;
    $response .= (isset($error['user_startdate'])) ? "<div class='alert-box alert'>" . $error['user_startdate'] . "</div> \n" : null;
   $response .= (isset($error['user_enddate'])) ? "<div class='alert-box alert'>" . $error['user_enddate'] . "</div>" : null;

   echo $response;
} # end if there was an error sending
?>
