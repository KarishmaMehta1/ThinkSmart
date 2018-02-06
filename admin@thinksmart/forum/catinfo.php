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
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Category Description</th>
                    <th>Experts</th>
                    <th>Unanswered Questions</th>
                    <th>Total Questions</th>
                    <th>Actions</th>
                </tr>

                <?php

                    $cat = $link -> prepare("SELECT * FROM category");
                    $cat -> execute();

                    while($getCat = $cat -> fetch(PDO::FETCH_ASSOC))
                    {
                        ?>
                        <tr align="center">
                            <td><?php print $getCat['cat_id']; ?></td>
                            <td><?php print $getCat['cat_name']; ?></td>
                            <td><?php print $getCat['cat_desc']; ?></td>
                            <td>
                                <?php
                                    $exp = $link -> prepare("SELECT expert_name FROM experts WHERE expert_spl = '$getCat[cat_id]';");
                                    $exp -> execute();
                                    print $exp -> rowCount();
                                ?>
                            </td>
                            <td>
                                <?php
                                    $unAnsQues = $link -> prepare("SELECT post_id FROM forum_posts WHERE solutions = 0;");
                                    $unAnsQues -> execute();
                                    print $unAnsQues -> rowCount();
                                ?>
                            </td>
                            <td>
                                <?php
                                    $totalQues = $link -> prepare("SELECT post_id FROM forum_posts WHERE cat_id = '$getCat[cat_id]';");
                                    $totalQues -> execute();
                                    print $totalQues -> rowCount();
                                ?>
                            </td>
                            <td>
                                <a href="editcatinfo.php?cat_id=<?php print $getCat['cat_id']; ?>" style="text-decoration: none; color: blue;">Edit</a>
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