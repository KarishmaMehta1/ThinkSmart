<!DOCTYPE html>
<html>
    <head>
        <link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="include/style.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>
            $(document).ready(function()
                {
                    $("#postcomment").keyup(function(e)
                    {
                        var key = e.charCode || e.keyCode;
                        if(key == 13)
                        {
                            var data = $("textarea#postcomment").val();
                            $('textarea#postcomment').val(data+'<br>'+'\n');
                        }
                    })
                });
        </script>
    </head>
    <body>
        <div id="container">
            <div id="head">
                <div id="logo"><img src="images/logo.png" /></div>
	        <?php
                    session_start();
                    if(!isset($_SESSION['type']) && !isset($_SESSION['name']) && !isset($_SESSION['username']))
                    {
                        require './include/navbar.php';
                    }
                    else
                    {
                        require './include/navbarlogin.php';
                    }
                    $post_id = $_GET['post_id'];
                    require './include/config.php';
                    $getQuestion = $link -> prepare("SELECT * FROM forum_posts WHERE post_id = '$post_id';");
                    $getQuestion -> execute();
                    $incViews = $link -> prepare("UPDATE forum_posts SET views = views + 1 WHERE post_id = '$post_id'");
                    $incViews -> execute();
                    $result = $getQuestion -> fetch(PDO::FETCH_ASSOC);
                ?>
            </div>
            <div id="body">
                <div id="content">
                    <div id="vquestion">
                        <div id="vques">
                            <?php echo "Q. ".$result['headline']; ?>
                        </div>
                        <hr>
                        <div id="vinfo">
                            Posted by 
                            <a class="auth">
                                <?php
                                    $getAuthor = $link -> prepare("SELECT user_name FROM user WHERE user_username = '$result[user_username]';");
                                    $getAuthor -> execute();
                                    $resultAuthor = $getAuthor -> fetch(PDO::FETCH_ASSOC);
                                    echo $resultAuthor['user_name'];
                                ?>
                            </a>
                            under 
                            <a class="cat" href="">
                                <?php
                                    $getCategory = $link -> prepare("SELECT cat_name FROM category WHERE cat_id = '$result[cat_id]';");
                                    $getCategory -> execute();
                                    $resultCategory = $getCategory -> fetch(PDO::FETCH_ASSOC);
                                    echo $resultCategory['cat_name'];
                                ?>
                            </a>
                        </div>
                        <div style="clear: both;margin-bottom: 5px;"></div>
                        <div id="vdesc">
                            <?php echo $result['ques_desc']; ?>
                        </div>
                        <hr>
                        <div style="font-weight: 900">
                            <?php echo $result['solutions']; ?>
                            Comment(s) and 
                            <?php echo $result['suggestions']; ?>
                            Suggestion(s)</div>
                        <hr>
                        <div id="comments">
                            <div id="sugs"><a href="./viewQuestionComments.php?post_id=<?php echo $post_id; ?>">View Expert Comments</a></div>
                            <div style="clear:both;margin-bottom: 4px;"></div>
                            <?php
                                $getComments = $link -> prepare("SELECT * FROM suggestions WHERE post_id = $post_id ORDER BY datetime DESC;");
                                $getComments -> execute();
                                while ($ecmnt = $getComments -> fetch(PDO::FETCH_ASSOC))
                                {                         
                                    ?>
                            <div id="cmntbox">
                                <a class="authname">
                                    <?php
                                        $getCmntAuthor = $link -> prepare("SELECT user_name FROM user WHERE user_username = '$ecmnt[user_username]';");
                                        $getCmntAuthor -> execute();
                                        $resultCmntAuthor = $getCmntAuthor -> fetch(PDO::FETCH_ASSOC);
                                        echo $resultCmntAuthor['user_name'];
                                    ?>
                                </a> said:<br>
                                <?php
                                    print "$ecmnt[suggestion]";
                                ?>
                            </div>
                            <div style="margin-bottom: 5px;"></div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px;"></div>
                    <div id="postcomment">
                        <form action="saveComment.php" method="POST">
                            <input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
                            <fieldset>
                                <legend>Submit Comment</legend>
                                <textarea name="postcomment" id="postcomment" style="min-height: 15em;min-width: 50em;max-height: 15em;max-width: 50em;" required="required"></textarea>
                                <input type="submit" value="Submit Your Comment" style="background: transparent; background-color: #e0e0e0; padding: 3px;"/>
                            </fieldset>
                        </form>
                    </div>
                    <div style="clear:both;margin-bottom: 15px;"></div>
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