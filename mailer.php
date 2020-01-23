<?php
require('phpmailer/class.phpmailer.php');
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$Experience = $_POST['Experience'];
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = NONE;
$mail->SMTPSecure = "tls";
$mail->Port     = 587;
$mail->Username ="example@gmail.com";
$mail->Password = "password";
$mail->Host     = "smtp.gmail.com"; 
$mail->Mailer   = "smtp";
$mail->SetFrom("hello@eduork.com");
$mail->AddReplyTo($_POST["email"]);
$mail->AddAddress("hello@eduork.com");
   $mail->Subject = "Contact Us";
   $mail->Body = 'Name: '.$name."\r\n<br>".'Email id: '.$email."\r\n<br>".'Mobile No: '.$mobile."\r\n<br>".'Experience: '.$Experience;

   $mail->AltBody = '';

   foreach ($_FILES["attachment"]["name"] as $k => $v) {
      $mail->AddAttachment( $_FILES["attachment"]["tmp_name"][$k], $_FILES["attachment"]["name"][$k] );
  }

   $mail->IsHTML(true);

   if(!$mail->Send()) {
    echo "<p class='error'>Problem in Sending Mail.</p>";
   } else {

    header("location: test.html");
   }
   ?>

