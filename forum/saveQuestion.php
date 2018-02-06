<?php

session_start();

if(!isset($_SESSION['type']) && !isset($_SESSION['name']) && !isset($_SESSION['username']))
{
    header("Location: ../");
}

$headline = $_POST['headline'];
$ques_desc = $_POST['ques_desc'];
$category = $_POST['category'];

require './include/config.php';
$insertQuestion = $link -> prepare("INSERT INTO forum_posts(user_username, headline, ques_desc, cat_id) VALUES(:username, :headline, :ques_desc, :category);");
$insertQuestion -> bindParam(':username', $_SESSION['username']);
$insertQuestion -> bindParam(':headline', $headline);
$insertQuestion -> bindParam(':ques_desc', $ques_desc);
$insertQuestion -> bindParam(':category', $category);
$insertQuestion -> execute();

if($insertQuestion -> rowCount() == 1)
{
    header("Location: ./index.php");
    exit;
}
else
{
    echo 'kalesh';
}

?>