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
                <div id="content"></div>
                <?php
                    require './include/profileSidebar.php';
                ?>

                <div id="userdetails">
                    <?php

                        $fn='';
                        $un='';
                        $em='';
                        $spl='';
                        $rpt='';

                        require './include/config.php';

                        if($_SESSION['type'] == 'user')
                        {
                            $getUserDetails = $link -> prepare("SELECT * FROM user WHERE user_username = '$_SESSION[username]';");
                            $getUserDetails -> execute();
                            $result = $getUserDetails -> fetch(PDO::FETCH_ASSOC);
                            $fn = $result['user_name'];
                            $un = $result['user_username'];
                            $em = $result['user_email'];
                            if(!empty($result['user_spl']))
                            {
                                $spl = $result['user_spl'];
                            }
                            else
                            {
                                $spl = 'Nil';
                            }
                            $rpt = $result['reputation'];
                        }
                        if($_SESSION['type'] == 'expert')
                        {
                            $getExpertDetails = $link -> prepare("SELECT * FROM experts WHERE expert_username = '$_SESSION[username]';");
                            $getExpertDetails -> execute();
                            $result = $getExpertDetails -> fetch(PDO::FETCH_ASSOC);
                            $fn = $result['expert_name'];
                            $un = $result['expert_username'];
                            $em = $result['expert_email'];
                            $spl = $result['expert_spl'];
                            $rpt = $result['reputation'];
                        }
                    ?>

                    <table align="center" cellspacing="5">
                        <caption style="font-size: 1.6em;">Personal Details</caption>
                        <tr>
                            <td>Full Name</td>
                            <td><?php print $fn; ?></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td><?php print $un; ?></td>
                        </tr>
                        <tr>
                            <td>E-Mail ID</td>
                            <td><?php print $em; ?></td>
                        </tr>
                        <tr>
                            <td>Specialization</td>
                            <td><?php print $spl; ?></td>
                        </tr>
                        <tr>
                            <td>Reputation</td>
                            <td><?php print $rpt; ?></td>
                        </tr>
                    </table>
                </div>
                <div id="site">
                    <div id="forum"></div>
                    <div id="blog"></div>
                </div>
                <div style="clear: both;"></div>
                <div id="logindetails">
                    <table align="center" cellspacing="5">
                        <caption style="font-size: 1.6em;">Last Activity Details</caption>
                        <?php
                            $t='';   $ip='';
                            $getLastLogin = $link -> prepare("SELECT * FROM activity_log WHERE username = '$_SESSION[username]' ORDER BY datetime DESC LIMIT 1;");
                            $getLastLogin -> execute();
                            $row = $getLastLogin -> fetch(PDO::FETCH_ASSOC);
                            $ip = $row['ip'];
                            $loc = $row['location'];
                            $t = $row['datetime'];
                            $b = $row['browser'];
                            $w = $row['window'];
                        ?>
                        <tr>
                            <td>IP Address</td>
                            <td><?php print $ip; ?></td>
                        </tr>
                        <tr>
                            <td>Location</td>
                            <td><?php print $loc; ?></td>
                        </tr>
                        <tr>
                            <td>Time</td>
                            <td><?php print $t; ?></td>
                        </tr>
                        <tr>
                            <td>Web Browser</td>
                            <td><?php print $b; ?></td>
                        </tr>
                        <tr>
                            <td>Operating System</td>
                            <td><?php print $w; ?></td>
                        </tr>
                    </table>
                </div>

            </div>
            <?php
                require './include/footer.php';
            ?>
        </div>
    </body>
</html>