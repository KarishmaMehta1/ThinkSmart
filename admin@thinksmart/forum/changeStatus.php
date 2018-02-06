<?php

require 'include/config.php';

if($_GET['p'] == 'u')
{
    $status = $link -> prepare("UPDATE user SET status = '$_GET[s]' WHERE user_username = '$_GET[u]';");
    $status -> execute();
    header("Location: ./users.php");
    exit;
}

if($_GET['p'] == 'e')
{
    $status = $link -> prepare("UPDATE experts SET status = '$_GET[s]' WHERE expert_username = '$_GET[u]';");
    $status -> execute();
    header("Location: ./experts.php");
    exit;
}

?>