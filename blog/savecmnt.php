<?php
require '../include/config.php';

$postid=$_POST['post_id'];
$username=$_SESSION['username'];
$comment=$_POST['comment'];
 
$savecmnt=$link->prepare("insert into comments('post_id','user_username','comment') values ('$postid','$username','$comment'));
$savecmnt->
