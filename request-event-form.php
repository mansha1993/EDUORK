<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$user_names = $_POST['user_names'];
$user_emails = $_POST['user_emails'];
$user_phones = $_POST['user_phones'];
$domainlist = $_POST['domainlist'];
$Message_users = $_POST['Message_users'];

$site_owners_email = 'hello@eduork.com'; // Replace this with your own email address
$site_owners_name = 'Query Form'; // replace with your name

if (!$error) {
   $mail = new PHPMailer();
   $mail->From = $email;
   $mail->Subject = "Contact Us";
   $mail->AddAddress($site_owners_email, $site_owners_name);
   $mail->Body = 'Name: '.$user_names."\r\n".'Email id: '.$user_emails."\r\n".'Phone No: '.$user_phones."\r\n".'Enquery Type: '.$domainlist."\r\n".'Message: '.$Message_users;

   $mail->Send();
   echo  "<script type='text/javascript'>alert('submitted successfully!')</script>";
   header ("refresh:0; url=index.html");
} # end if no error
else {

   $response = (isset($error['user_names'])) ? "<div class='alert-box alert'>" . $error['user_names'] . "</div> \n" : null;
   $response .= (isset($error['user_emails'])) ? "<div class='alert-box alert'>" . $error['user_emails'] . "</div> \n" : null;
    $response .= (isset($error['user_phones'])) ? "<div class='alert-box alert'>" . $error['user_phones'] . "</div> \n" : null;
   
    $response .= (isset($error['domainlist'])) ? "<div class='alert-box alert'>" . $error['domainlist'] . "</div> \n" : null;
   $response .= (isset($error['Message_users'])) ? "<div class='alert-box alert'>" . $error['Message_users'] . "</div>" : null;

   echo $response;
} # end if there was an error sending
?>
