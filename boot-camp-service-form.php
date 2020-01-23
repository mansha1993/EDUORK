<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];
$mobile = $_POST['mobile'];
$user_remark = $_POST['user_remark'];
$your_requrmt = $_POST['your_requrmt'];
$no_of_days = $_POST['no_of_days'];
$day_user = $_POST['day_user'];
$month_user = $_POST['month_user'];
$year_user = $_POST['year_user'];
$country_user = $_POST['country_user'];
$image_code_val = $_POST['image_code_val'];
$lead_source = $_POST['lead_source'];

$site_owners_email = 'hello@eduork.com'; // Replace this with your own email address
$site_owners_name = 'Query Form'; // replace with your name

if (!$error) {

   $mail = new PHPMailer();

   $mail->From = $email;
   $mail->Subject = "Contact Us";
   $mail->AddAddress($site_owners_email, $site_owners_name);
   $mail->Body = 'Name: '.$user_name."\r\n".'Email id: '.$user_email."\r\n".'Phone No: '.$mobile."\r\n".'Message: '.$user_remark .'Requirement: '.$your_requrmt."\r\n".
   'No of days: '.$no_of_days.
   "\r\n".'Day User: '.$day_user.
   "\r\n".'Months User: '.$month_user."\r\n"
   .'Year User:'.$year_user."\r\n"
   .'Country User:'.$country_user."\r\n"
   .'Image Code:'.$image_code_val."\r\n"
   .'Lead Source:'.$lead_source."\r\n";

   $mail->Send();
   echo  "<script type='text/javascript'>alert('submitted successfully!')</script>";
   header ("refresh:0; url=index.html");
} # end if no error
else {

   $response = (isset($error['name'])) ? "<div class='alert-box alert'>" . $error['name'] . "</div> \n" : null;
   $response .= (isset($error['user_email'])) ? "<div class='alert-box alert'>" . $error['user_email'] . "</div> \n" : null;
    $response .= (isset($error['mobile'])) ? "<div class='alert-box alert'>" . $error['mobile'] . "</div> \n" : null;
    $response .= (isset($error['courses'])) ? "<div class='alert-box alert'>" . $error['courses'] . "</div> \n" : null;
    $response .= (isset($error['enqtype'])) ? "<div class='alert-box alert'>" . $error['enqtype'] . "</div> \n" : null;
   $response .= (isset($error['user_remark'])) ? "<div class='alert-box alert'>" . $error['user_remark'] . "</div>" : null;
   $response .= (isset($error['your_requrmt'])) ? "<div class='alert-box alert'>" . $error['your_requrmt'] . "</div>" : null;
   $response .= (isset($error['no_of_days'])) ? "<div class='alert-box alert'>" . $error['no_of_days'] . "</div>" : null;
   $response .= (isset($error['day_user'])) ? "<div class='alert-box alert'>" . $error['day_user'] . "</div>" : null;
   $response .= (isset($error['month_user'])) ? "<div class='alert-box alert'>" . $error['month_user'] . "</div>" : null;
   $response .= (isset($error['year_user'])) ? "<div class='alert-box alert'>" . $error['year_user'] . "</div>" : null;
   $response .= (isset($error['country_user'])) ? "<div class='alert-box alert'>" . $error['country_user'] . "</div>" : null;
   $response .= (isset($error['image_code_val'])) ? "<div class='alert-box alert'>" . $error['image_code_val'] . "</div>" : null;
   $response .= (isset($error['lead_source'])) ? "<div class='alert-box alert'>" . $error['lead_source'] . "</div>" : null;

   echo $response;
} # end if there was an error sending
?>
