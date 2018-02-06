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
                <div id="data">
                    <div style="font-size: 1.8em; font-weight: bolder;">Category</div>
                    <hr>
                    <div id="catarea">
                        <table width="100%" cellspacing="20">
                            <?php
                                require './include/config.php';
                                $nfrows=0;
                                $limit=0;
                                $countCategory = $link -> prepare("SELECT * FROM category;");
                                $countCategory -> execute();
                                $count = $countCategory -> rowCount();
                                if($count%4 == 0)
                                {
                                    $nfrows = $count/4;
                                }
                                else
                                {
                                    $nfrows = ($count/4)+1;
                                }
                                while ($limit < $count)
                                {
                            ?>
                            <tr>
                                <?php
                                    $getCategory = $link -> prepare("SELECT * FROM category LIMIT ".$limit.",4;");
                                    $getCategory -> execute();
                                    while($row = $getCategory->fetch(PDO::FETCH_ASSOC))
                                    {
                                        ?>
                                <td width="25%">
                                    <a href="./viewCatQuestions.php?cat_id=<?php echo $row['cat_id']; ?>">
                                        <div id="catname">
                                            <?php echo $row['cat_name']; ?>
                                        </div>
                                        <hr>
                                        <div id="catdesc">
                                            <?php echo $row['cat_desc']; ?>
                                        </div>
                                    </a>
                                </td>
                                <?php
                                    }
                                ?>
                            </tr>
                            <?php
                                $limit = $limit+4;
                                }
                            ?>
                        </table>
                    </div>
                </div>
                <div style="clear:both;margin-bottom: 8px;"></div>
            </div>
            <?php
                require './include/footer.php';
            ?>
        </div>
    </body>
</html>