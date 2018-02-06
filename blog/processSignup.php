<?php

session_start();

if(!isset($_SESSION['type']) && !isset($_SESSION['name']) && !isset($_SESSION['username']))
{}
else
{
    header("Location: ./index.php");
    exit;
}

require './include/config.php';

$checkUNAvailability = $link -> prepare("SELECT user_username FROM user WHERE user_username = '$_POST[username]';");
$checkUNAvailability -> execute();
if($checkUNAvailability -> rowCount() == 1)
{
    header("Location: ./signup.php?error=Username not available.");
    exit;
}

if($_POST['password'] != $_POST['confPass'])
{
    header("Location: ./signup.php?error=passwords do not match.");
    exit;
}

if($_SESSION["captchaCode"] != $_POST['captcha'])
{
    header("Location: ./signup.php?error=Captcha code does not match.");
    exit;
}

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$category = $_POST['category'];
$code = rand(100000,999999);

$insertUser = $link -> prepare("INSERT INTO user(user_name, user_username, user_password, user_email, user_spl, code) VALUES(:name, :username, :password, :email, :spl, :code);");
$insertUser -> bindParam(':name', $name);
$insertUser -> bindParam(':username', $username);
$insertUser -> bindParam(':password', $password);
$insertUser -> bindParam(':email', $email);
$insertUser -> bindParam(':spl', $spl);
$insertUser -> bindParam(':code', $code);
$insertUser -> execute();

if($insertUser -> rowCount() == 1)
{
    require './mail/mail.php';
    $mail->addAddress($email,$name);
    $mail->Body = "<b>Welcome, $name.</b><br>Click the below link to activate your account<br><a href=#?code=$code>Click Here to Activate</a>";
    if(!$mail->send()) 
    {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
    else
    {
        header("Location: ./signin.php?error=Verify your Email Id to activate your account.");
        exit;
    }
    
}
else
{
    echo 'kalesh';
}

?>