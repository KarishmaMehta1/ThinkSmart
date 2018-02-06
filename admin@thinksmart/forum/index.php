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
                <table align="center" class="summary">
                    <tr>
                        <td>Total Users<hr></td>
                        <td>
                            <?php
                                $countUser = $link -> prepare("SELECT status FROM user;");
                                $countUser -> execute();
                            ?>
                            <a href="users.php" style="text-decoration: none; color: black;">
                                <?php
                                    print $countUser -> rowCount();
                                ?>
                            </a>
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td>Total Experts<hr></td>
                        <td>
                            <a href="experts.php" style="text-decoration: none; color: black;">
                            <?php
                                $countExpert = $link -> prepare("SELECT status FROM experts;");
                                $countExpert -> execute();
                                print $countExpert -> rowCount();
                            ?>
                            </a>
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td>Total Questions Asked<hr></td>
                        <td>
                            <a href="Questions.php?q=all" style="text-decoration: none; color: black;">
                            <?php
                                $countTotalQues = $link -> prepare("SELECT post_id FROM forum_posts;");
                                $countTotalQues -> execute();
                                print $countTotalQues -> rowCount();
                            ?>
                            </a>
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td>Total Questions Answered<hr></td>
                        <td>
                            <a href="Questions.php?q=a" style="text-decoration: none; color: black;">
                            <?php
                                $countTotalQuesAns = $link -> prepare("SELECT post_id FROM forum_posts WHERE solutions > 0;");
                                $countTotalQuesAns -> execute();
                                print $countTotalQuesAns -> rowCount();
                            ?>
                            </a>
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td>Total Questions Unanswered<hr></td>
                        <td>
                            <a href="Questions.php?q=u" style="text-decoration: none; color: black;">
                            <?php
                                $countTotalQuesUnAns = $link -> prepare("SELECT post_id FROM forum_posts WHERE solutions = 0;");
                                $countTotalQuesUnAns -> execute();
                                print $countTotalQuesUnAns -> rowCount();
                            ?>
                            </a>
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td>Total Categories<hr></td>
                        <td>
                            <a href="catinfo.php" style="text-decoration: none; color: black;">
                            <?php
                                $countCategory = $link -> prepare("SELECT cat_id FROM category;");
                                $countCategory -> execute();
                                print $countCategory -> rowCount();
                            ?>
                            </a>
                            <hr>
                        </td>
                    </tr>
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