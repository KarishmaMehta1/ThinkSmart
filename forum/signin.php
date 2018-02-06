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
<!DOCTYPE html>
<html>
    <head>
        <link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="include/style.css">
    </head>
    <body>
        <div id="container">
            <div id="head">
                <div id="logo"><img src="images/logo.png" /></div>
	        <?php
                    require './include/navbar.php';
                ?>
            </div>
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