<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mail.thinksmart@gmail.com';                 // SMTP username
$mail->Password = 'thinksmart.mail';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'tls' also accepted

//mail.thinksmart@gmail.com
//thinksmart.mail

//$mail->From = 'phpbatch911@gmail.com';
$mail->FromName = 'Think Smart';
//$mail->addAddress('mail.thinksmart@gmail.com', 'Joe User');     // Add a recipient
//$mail->addAddress('mr.trendsetters@gmail.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Activate Account';
//$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

/*
if(!$mail->send()) 
{
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
else
{
    echo 'Message has been sent';
}
*/