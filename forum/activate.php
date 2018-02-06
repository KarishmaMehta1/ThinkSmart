<?php

require './include/config.php';

$code = $_GET['code'];

$count = $link -> exec("UPDATE user SET status = 'a', code = 0 WHERE code = $code;");

//echo 'Rows Affected : '.$count;

header("Location: ./signin.php");
exit;

?>