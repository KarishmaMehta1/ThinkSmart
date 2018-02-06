<?php
session_start();
if(!isset($_SESSION['type']) && !isset($_SESSION['name']) && !isset($_SESSION['username']))
{}
else
{
    header("Location: ./index.php");
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Think Smart | Blog</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-georgia.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="menu_nav">
        <ul>
          <li><a href="index.php"><span>Home Page</span></a></li>
          <li><a href="#"><span>Forum</span></a></li>
          <li><a href="#"><span>About Us</span></a></li>
          <li><a href="#"><span>Contact Us</span></a></li>

        </ul>
      </div>
      <div class="logo">
        <h1><a href="index.php"><img src="../img/logo.png" height=80 width=200/></a></h1>
      </div>
      <div class="clr"></div>
     
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
<!DOCTYPE html>
<html>
    <head>
        <link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="include/style.css">
    </head>
    <body>
        <div id="container">
            <div id="body">
                <form action="processSignin.php" method="POST" class="signin">
                    <table align="center">
                        <tr>
                            <td colspan="2">
                                <?php
                                    if(isset($_GET['error']))
                                    {
                                        echo $_GET['error'];
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="username">Username</label></td>
                            <td><input type="text" name="username" id="username" required="required" class="data" autofocus="true" /></td>
                        </tr>
                        <tr>
                            <td><label for="password">Password</label></td>
                            <td><input type="password" name="password" id="password" required="required" class="data" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Sign In" class="submit" /></td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="signup.php">Create New Account</a></td>
                        </tr>
                    </table>
                </form>
            </div>
            <?php
                require './include/footer.php';
            ?>
        </div>
    </body>

</html>