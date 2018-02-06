<?php

require 'include/config.php';

if($_GET['p'] == 'u')
{
    $user = $link -> prepare("SELECT * FROM user WHERE user_username = '$_GET[u]'; ");
    $user -> execute();
    $getData = $user -> fetch(PDO::FETCH_ASSOC);
    $expertise = $link -> prepare("INSERT INTO experts VALUES('$getData[user_name]','$getData[user_username]','$getData[user_password]','$getData[user_email]','$getData[user_spl]','$getData[reputation]/2','a');");
    $expertise -> execute();
    $userDel = $link -> prepare("DELETE FROM user WHERE user_username = '$_GET[u]';");
    $userDel -> execute();
    header("Location: ./experts.php");
    exit;
}

if($_GET['p'] == 'e')
{
    $expert = $link -> prepare("SELECT * FROM experts WHERE expert_username ='$_GET[u]'; ");
    $expert -> execute();
    $getData = $expert -> fetch(PDO::FETCH_ASSOC);
    $normalize = $link -> prepare("INSERT INTO user VALUES('$getData[expert_name]','$getData[expert_username]','$getData[expert_password]','$getData[expert_email]','$getData[expert_spl]','$getData[reputation]/2','a','0');");
    $normalize -> execute();
    $userDel = $link -> prepare("DELETE FROM experts WHERE expert_username = '$_GET[u]';");
    $userDel -> execute();
    header("Location: ./users.php");
    exit;
}