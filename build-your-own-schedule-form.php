<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
$coursename =$_POST['coursename'];
$SessionDuration  = $_POST['SessionDuration'];
$scheduletype  = $_POST['scheduletype'];
$timezone_list  = $_POST['timezone_list'];
$start_date  = $_POST['start_date'];
$start_time  = $_POST['start_time'];
$end_time  = $_POST['end_time'];
$session_duration  = $_POST['session_duration'];
$site_owners_email = 'hello@eduork.com'; // Replace this with your own email address
$site_owners_name = 'Query Form'; // replace with your name

if (!$error) {

   $mail = new PHPMailer();

   $mail->From = $email;
   $mail->Subject = "Contact Us";
   $mail->AddAddress($site_owners_email, $site_owners_name);
   $mail->Body = 
   'course name:'.$coursename ."\r\n".
   'Session Duration:'.$SessionDuration ."\r\n".
   'schedule type:'.$scheduletype."\r\n".
   'timezone list:'.$timezone_list ."\r\n".
   'start date:'.$start_date ."\r\n".
   'start time :'.$start_time  ."\r\n".
   'end time:'.$end_time ."\r\n".
   'session duration:'.$session_duration ."\r\n";

   $mail->Send();
   echo  "<script type='text/javascript'>alert('submitted successfully!')</script>";
   header ("refresh:0; url=index.html");
} # end if no error
else {

    $response = (isset($error['coursename'])) ? "<div class='alert-box alert'>" . $error['coursename'] . "</div> \n" : null;
    $response = (isset($error['SessionDuration'])) ? "<div class='alert-box alert'>" . $error['SessionDuration'] . "</div> \n" : null;
    $response = (isset($error['scheduletype'])) ? "<div class='alert-box alert'>" . $error['scheduletype'] . "</div> \n" : null;
    $response = (isset($error['timezone_list'])) ? "<div class='alert-box alert'>" . $error['timezone_list'] . "</div> \n" : null;
    $response = (isset($error['start_date'])) ? "<div class='alert-box alert'>" . $error['start_date'] . "</div> \n" : null;
    $response = (isset($error['start_time'])) ? "<div class='alert-box alert'>" . $error['start_time'] . "</div> \n" : null;
    $response = (isset($error['end_time'])) ? "<div class='alert-box alert'>" . $error['end_time'] . "</div> \n" : null;
    $response = (isset($error['session_duration'])) ? "<div class='alert-box alert'>" . $error['session_duration'] . "</div> \n" : null;
  

   echo $response;
} # end if there was an error sending
?>
