<?php

require 'include/config.php';

$post_id = $_GET['post_id'];

$delCmnt = $link -> prepare("DELETE FROM comments WHERE post_id='$post_id';");
$delCmnt -> execute();
$delSugs = $link -> prepare("DELETE FROM suggestions WHERE post_id='$post_id';");
$delSugs -> execute();
$delQues = $link -> prepare("DELETE FROM forum_posts WHERE post_id='$post_id';");
$delQues -> execute();

header("Location: ./Questions.php");
exit;

?>