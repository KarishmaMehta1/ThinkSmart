<?php

require './include/config.php';

session_start();

if($_SESSION['type'] == 'user')
{  
    $verifyPassword = $link -> prepare("SELECT user_password FROM user WHERE user_username = '$_SESSION[username]';");
    $verifyPassword -> execute();
    $pswd = $verifyPassword -> fetch(PDO::FETCH_ASSOC);
    
    if($pswd['user_password'] == $_POST['opw'])
    {
        if($_POST['npw'] != $_POST['cnpw'])
        {
            header("Location: ./changePasswordForm.php?error=New Password and Confirm Password DO NOT match.");
            exit;
        }
        else
        {
            $updatePassword = $link -> prepare("UPDATE user SET user_password = '$_POST[npw]' WHERE user_username = '$_SESSION[username]';");
            $updatePassword -> execute();
            header("Location: ./profile.php");
            exit;
        }
    }
    else
    {
        header("Location: ./changePasswordForm.php?error=Wrong Password.");
        exit;
    }
}
if($_SESSION['type'] == 'expert')
{
    $verifyPassword = $link -> prepare("SELECT expert_password FROM experts WHERE expert_username = '$_SESSION[username]';");
    $verifyPassword -> execute();
    $pswd = $verifyPassword -> fetch(PDO::FETCH_ASSOC);

    if($pswd['expert_password'] == $_POST['opw'])
    {
        if($_POST['npw'] != $_POST['cnpw'])
        {
            header("Location: ./changePasswordForm.php?error=New Password and Confirm Password DO NOT match.");
            exit;
        }
        else
        {
            $updatePassword = $link -> prepare("UPDATE experts SET expert_password = '$_POST[npw]' WHERE expert_username = '$_SESSION[username]';");
            $updatePassword -> execute();
            header("Location: ./profile.php");
            exit;
        }
    }
    else
    {
        header("Location: ./changePasswordForm.php?error=Wrong Password.");
        exit;
    }
}