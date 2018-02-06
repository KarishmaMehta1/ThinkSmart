<?php

session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="include/style.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>
            $(document).ready(function()
                {
                    $("#ques_desc").keyup(function(e)
                    {
                        var key = e.charCode || e.keyCode;
                        if(key == 13)
                        {
                            var data = $("#ques_desc").val();
                            $('#ques_desc').val(data+'<br>'+'\n');
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
                
                    if(!isset($_SESSION['type']) && !isset($_SESSION['name']) && !isset($_SESSION['username']))
                    {
                        header("Location: ./signin.php?error=You must be Signed In to Ask Question.");
                        exit;
                    }
                    else
                    {
                        require './include/navbarlogin.php';
                    }
                
                ?>
            </div>
            <div id="body">
                <div id="content">
                    <div id="quesform">
                        <form action="saveQuestion.php" method="POST" class="aQF">
                            <table>
                                <tr>
                                    <td><label for="headline" style="font-size: 1.2em;" >Question Title</label></td>
                                    <td style="width: 83%;">
                                        <input type="text" name="headline" id="headline" required="required" class="data" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="ques_desc" style="font-size: 1.2em;">Describe Your Question</label></td>
                                    <td>
                                        <textarea id="ques_desc" name="ques_desc" required="required" class="data" style="min-height: 150px; max-height: 200px;"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="category" style="font-size: 1.2em;">Category</label></td>
                                    <td>
                                        <select id="category" name="category" class="data">
                                            <?php
                                                require './include/config.php';
                                                $getCategory = $link -> prepare("SELECT * FROM category;");
                                                $getCategory -> execute();
                                                while($row = $getCategory->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    ?>
                                            <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" value="Post Your Question" class="submit"/></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div style="clear:both;margin-bottom: 8px;"></div>
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