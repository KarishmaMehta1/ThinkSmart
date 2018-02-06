<?php

session_start();
if(!isset($_SESSION['type']) && !isset($_SESSION['name']) && !isset($_SESSION['username']))
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
        require './include/navbarlogin.php';
        ?>
    </div>
    <div id="body">
        <div id="content">
            <div id="cp">
                <form action="changeEmail.php" method="POST" class="signin">
                    <table style="text-align: left; font-size: 0.85em;">
                        <tr>
                            <td colspan="2" style="color: red; font-size: 0.9em;" align="center">
                                <?php
                                if(isset($_GET['error']))
                                {
                                    print $_GET['error'];
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>E-Mail ID:</td>
                            <td>
                                <?php
                                    require 'include/config.php';
                                    $eid="";
                                    if($_SESSION['type'] == "user")
                                    {
                                        $getEmail = $link -> prepare("SELECT user_email FROM user WHERE user_username = '$_SESSION[username]';");
                                        $getEmail -> execute();
                                        $Email = $getEmail -> fetch(PDO::FETCH_ASSOC);
                                        $eid = $Email['user_email'];
                                    }
                                    if($_SESSION['type'] == "expert")
                                    {
                                        $getEmail = $link -> prepare("SELECT expert_email FROM experts WHERE expert_username = '$_SESSION[username]';");
                                        $getEmail -> execute();
                                        $Email = $getEmail -> fetch(PDO::FETCH_ASSOC);
                                        $eid = $Email['expert_email'];
                                    }


                                ?>
                                <input type="email" class="data" name="email" value="<?php print $eid; ?>" style="min-width: 250px;" required="required"/>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Change E-Mail ID" class="submit" style="width: 200px;"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <?php
        require './include/profileSidebar.php';
        ?>
    </div>
    <?php
    require './include/footer.php';
    ?>
</div>
</body>
</html>