<?php

require './include/config.php';

session_start();

if($_SESSION['type'] == 'user')
{
    $updateEmail = $link -> prepare("UPDATE user SET user_email = '$_POST[email]' WHERE user_username = '$_SESSION[username]';");
    $updateEmail -> execute();
    header("Location: ./profile.php");
}
if($_SESSION['type'] == 'expert')
{
    $updateEmail = $link -> prepare("UPDATE experts SET expert_email = '$_POST[email]' WHERE expert_username = '$_SESSION[username]';");
    $updateEmail -> execute();
    header("Location: ./profile.php");
    exit;
}