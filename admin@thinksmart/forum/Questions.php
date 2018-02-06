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
                            <th>Q ID</th>
                            <th>Question</th>
                            <th>Category</th>
                            <th>Asked By</th>
                            <th>Asked On</th>
                            <th>Solutions</th>
                            <th>Suggestions</th>
                            <th>Actions</th>
                        </tr>
                        <?php

                            $ques = "";

                            if($_GET['q'] == "all")
                            {
                                $ques = $link -> prepare("SELECT * FROM forum_posts ORDER BY datetime DESC;");
                            }

                            if($_GET['q'] == "u")
                            {
                                $ques = $link -> prepare("SELECT * FROM forum_posts WHERE solutions = 0 ORDER BY datetime DESC;");
                            }

                            if($_GET['q'] == "a")
                            {
                                $ques = $link -> prepare("SELECT * FROM forum_posts WHERE solutions > 0 ORDER BY datetime DESC;");
                            }

                            $ques -> execute();
                            while($getQues = $ques -> fetch(PDO::FETCH_ASSOC))
                            {
                                ?>
                                <tr>
                                    <td><?php print $getQues['post_id']; ?></td>
                                    <td><?php print $getQues['headline']; ?></td>
                                    <td>
                                        <?php
                                            $cat = $link -> prepare("SELECT cat_name FROM category WHERE cat_id = '$getQues[cat_id]';");
                                            $cat -> execute();
                                            $getCat = $cat -> fetch(PDO::FETCH_ASSOC);
                                            print $getCat['cat_name'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $name = $link -> prepare("SELECT user_name FROM user WHERE user_username = '$getQues[user_username]';");
                                            $name -> execute();
                                            $getName = $name -> fetch(PDO::FETCH_ASSOC);
                                            print $getName['user_name'];
                                        ?>
                                    </td>
                                    <td><?php print $getQues['datetime']; ?></td>
                                    <td><?php print $getQues['solutions']; ?></td>
                                    <td><?php print $getQues['suggestions']; ?></td>
                                    <td>
                                        <a href="viewQuestionComments.php?post_id=<?php print $getQues['post_id']; ?>" style="text-decoration: none; color: blue;">View</a>
                                        <span style="margin-left: 10px;"></span>
                                        <a href="deleteQuestion.php?post_id=<?php print $getQues['post_id']; ?>" style="text-decoration: none; color: red;">Delete</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>
            </div>
            <?php
                require './include/footer.php';
            ?>
        </div>
    </body>
</html>