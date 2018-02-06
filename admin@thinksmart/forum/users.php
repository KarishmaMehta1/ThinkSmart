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
        <div id="container" style="width: 1200px;">
            <div id="head">
                <div id="logo"><img src="include/logo.png" /></div>
            </div>
            <div id="body">
                <table cellspacing="10" align="center">
                    <tr align="center">
                        <th>
                            Name
                        </th>
                        <th>
                            Specialization
                        </th>
                        <th>
                            Questions Asked
                        </th>
                        <th>
                            Questions Answered
                        </th>
                        <th>
                            Answers Voted
                        </th>
                        <th>
                            Reputation
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                    <?php
                        $getUser = $link -> prepare("SELECT * FROM user;");
                        $getUser -> execute();
                        while($userData = $getUser -> fetch(PDO::FETCH_ASSOC))
                        {
                            ?>
                            <tr align="center">
                                <td>
                                    <?php print $userData['user_name']; ?>
                                </td>
                                <td>
                                    <?php
                                        if(isset($userData['user_spl']))
                                        {
                                            $cat = $link -> prepare("SELECT cat_name FROM category WHERE cat_id = '$userData[user_spl]';");
                                            $cat -> execute();
                                            $getCat = $cat -> fetch(PDO::FETCH_ASSOC);
                                            print $getCat['cat_name'];
                                        }
                                        if($userData['user_spl'] == 'NULL')
                                        {
                                            print "NA";
                                        }
                                        else
                                        {
                                            print "NA";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $quesCount = $link -> prepare("SELECT post_id FROM forum_posts WHERE user_username = '$userData[user_username]';");
                                        $quesCount -> execute();
                                        print $quesCount -> rowCount();
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $quesAnsCount = $link -> prepare("SELECT voted FROM suggestions WHERE user_username = '$userData[user_username]';");
                                        $quesAnsCount -> execute();
                                        print $quesAnsCount -> rowCount();
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $quesAnsCount = $link -> prepare("SELECT voted FROM suggestions WHERE user_username = '$userData[user_username]' AND voted='t';");
                                        $quesAnsCount -> execute();
                                        print $quesAnsCount -> rowCount();
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $reput = $link -> prepare("SELECT reputation FROM user WHERE user_username = '$userData[user_username]';");
                                        $reput -> execute();
                                        $getReput = $reput -> fetch(PDO::FETCH_ASSOC);
                                        print $getReput['reputation'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $status = $link -> prepare("SELECT status FROM user WHERE user_username = '$userData[user_username]';");
                                        $status -> execute();
                                        $getStatus = $status -> fetch(PDO::FETCH_ASSOC);
                                        if($getStatus['status'] == 'a')
                                        {
                                            ?>
                                    <span style="color: green">Active</span>
                                    <?php
                                        }
                                        else
                                        {
                                            ?>
                                    <span style="color: red">Inactive</span>
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $status = $link -> prepare("SELECT status FROM user WHERE user_username = '$userData[user_username]';");
                                        $status -> execute();
                                        $getStatus = $status -> fetch(PDO::FETCH_ASSOC);
                                        if($getStatus['status'] == 'a')
                                        {
                                    ?>
                                    <a href="changeStatus.php?u=<?php print $userData['user_username']; ?>&s=i&p=u" style="text-decoration: none; color: red;">Inactivate</a>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                    <a href="changeStatus.php?u=<?php print $userData['user_username']; ?>&s=a&p=u" style="text-decoration: none; color: green;">Activate</a>
                                    <?php
                                        }
                                    ?>
                                    <span style="margin-left: 20px;"></span>
                                    <a href="changeType.php?u=<?php print $userData['user_username']; ?>&p=u" style="text-decoration: none; color: #0087c7;">Promote</a>
                                </td>
                            </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
            <div id="footer">
                <?php
                    require 'include/footer.php';
                ?>
            </div>
        </div>
    </body>
</html>