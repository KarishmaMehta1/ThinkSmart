<?php

$username = $_POST['username'];
$password = $_POST['password'];

require './include/config.php';

$checkLogin = $link -> prepare("SELECT * FROM user WHERE user_username = :username AND user_password = :password");
$checkLogin -> bindParam(':username', $username);
$checkLogin -> bindParam(':password', $password);
$checkLogin -> execute();
if($checkLogin -> rowCount() == 1)
{
    $result = $checkLogin -> fetch(PDO::FETCH_ASSOC);
    if($result['status'] == 'i' && $result['code'] == 0)
    {
        header("Location: ./signin.php?error=Your account has been deactivated.");
        exit;
    }
    if($result['status'] == 'i' && $result['code'] != 0)
    {
        header("Location: ./signin.php?error=Verify your email to activate account.");
        exit;
    }
    else
    {
        session_start();
        $_SESSION['type'] = "user";
        $_SESSION['name'] = $result['user_name'];
        $_SESSION['username'] = $result['user_username'];
       // require 'include/ip.php';//
        header("Location: ./index.php");
        exit;
    }
}
else
{
    $checkLogin = $link -> prepare("SELECT * FROM experts WHERE expert_username = :username AND expert_password = :password");
    $checkLogin -> bindParam(':username', $username);
    $checkLogin -> bindParam(':password', $password);   
    $checkLogin -> execute();
    if($checkLogin -> rowCount() == 1)
    {
        $result = $checkLogin -> fetch(PDO::FETCH_ASSOC);
        if($result['status'] == 'i')
        {
            header("Location: ./signin.php?error=Your account has been deactivated.");
            exit;
        }
        else
        {
            session_start();
            $_SESSION['type'] = "expert";
            $_SESSION['name'] = $result['expert_name'];
            $_SESSION['username'] = $result['expert_username'];
            require 'include/ip.php';
            header("Location: ./index.php");
            exit;
        }
    }
    
    header("Location: ./signin.php?error=Invalid username and/or password.");
    exit;

    
    }