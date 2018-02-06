<?php

session_start();

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
                
                    if(!isset($_SESSION['type']) && !isset($_SESSION['name']) && !isset($_SESSION['username']))
                    {
                        require './include/navbar.php';
                    }
                    else
                    {
                        require './include/navbarlogin.php';
                    }
                
                ?>
            </div>
            <div id="body">
                <div id="content">
                    <?php
                        require './include/config.php';
                        $getQuestions = $link -> prepare("SELECT * FROM forum_posts ORDER BY datetime DESC;");
                        $getQuestions -> execute();
                        while ($row = $getQuestions -> fetch(PDO::FETCH_ASSOC))
                        {
                            ?>
                    <div class="question">
                        <div class="info">Answers<br><?php echo $row['solutions']; ?><br>Views<br><?php echo $row['views']; ?></div>
                        <div class="details">
                            <div class="headline"><a href="./viewQuestionComments.php?post_id=<?php echo $row['post_id']; ?>"><?php echo $row['headline']; ?></a></div>
                            <div class="authcat">
                                <div class="category">
                                    <a href="./viewCatQuestions.php?cat_id=<?php echo $row['cat_id']; ?>">
                                    <?php
                                        $getCategory = $link -> prepare("SELECT cat_name FROM category WHERE cat_id = '$row[cat_id]';");
                                        $getCategory -> execute();
                                        $result = $getCategory -> fetch(PDO::FETCH_ASSOC);
                                        echo $result['cat_name'];
                                    ?>
                                    </a></div>
                                <div class="author">
                                    <p>Asked by: 
                                        <a href="">
                                            <?php
                                                $getAuthor = $link -> prepare("SELECT user_name FROM user WHERE user_username = '$row[user_username]';");
                                                $getAuthor -> execute();
                                                $result = $getAuthor -> fetch(PDO::FETCH_ASSOC);
                                                echo $result['user_name'];
                                            ?>
                                        </a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;margin-bottom: 8px;"></div>
                    <hr>
                    <?php
                        }
                    ?>
                </div>
                <?php
                    require './include/sidebar.php';
                ?>
            </div>
            <?php
                require './include/footer.php';
            ?>
        </div>
    </body>
</html>