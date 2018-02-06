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
  <div id="body">
                <form action="processSignup.php" method="POST" class="signin">
            <table align="center"> 
                <tr>
                    <td colspan="2">
                        <div style="color: red;">
                                                    </div>
                    </td>
                </tr>
                <tr>
                    <td align="left"><label for="name">Name*</label></td>
                    <td>
                        <input type="text" name="name" id="name" class="data" required="required" autofocus="true" /><br>
                    </td>
                </tr>
                <tr>
                    <td align="left"><label for="username">Username*</label></td>
                    <td>
                        <input type="text" name="username" id="username" required="required" class="data" /><br>
                    </td>
                </tr>
                <tr>
                    <td align="left"><label for="passowrd">Password*</label></td>
                    <td>
                        <input type="password" name="password" id="password" required="required"  class="data"/><br>
                    </td>
                </tr>
                <tr>
                    <td align="left"><label for="confPass">Confirm Password*</label></td>
                    <td>
                        <input type="password" name="confPass" id="confPass" required="required" class="data" /><br>
                    </td>
                </tr>
                <tr>
                    <td align="left"><label for="email">EMail*</label></td>
                    <td>
                        <input type="email" name="email" id="email" required="required" class="data" /><br>
                    </td>
                </tr>
                <tr>
                    <td align="left">Specialization(if any)</td>
                    <td>
                        <select id="category" name="category" class="data">
                            <option value="no">Nil</option>
                                                        <option value="j2se" class="data">Core Java (J2SE)</option>
                                                        <option value="php" class="data">PHP</option>
                                                    </select>
                    </td>
                </tr>
                <tr>
                    <td align="left"><label for="captcha">Enter the Number*</label><img src="captcha.php" /></td>
                    <td>
                        <input type="text" name="captcha" id="captcha" required="required" class="data" /><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Register" id="register" class="submit"/></td>
                </tr>
            </table>
        </form>
            </div>  </div>
  

</html>
