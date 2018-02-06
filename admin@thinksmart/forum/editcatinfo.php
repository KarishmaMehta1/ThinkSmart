<?php
require 'include/config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="include/style.css">
</head>
<body>
<div id="container">
    <div id="head">
        <div id="logo"><img src="include/logo.png" /></div>
    </div>
    <div id="body">
        <div id="content" style="width: 100%;">
            <table align="center" cellspacing="5">
                <tr>
                    <td>Category ID</td>
                    <td><input type="text" name="catid" required="true" /></td>
                </tr>

                <tr></tr>
                <tr></tr>
                <tr></tr>
            </table>
        </div>
    </div>
    <?php
    require './include/footer.php';
    ?>
</div>
</body>
</html>