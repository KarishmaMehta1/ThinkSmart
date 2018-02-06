<div id="sidebar">
                    <h3>Categories</h3><hr>
                    <ul>
                        <?php
                            require './include/config.php';
                            $getCategory = $link -> prepare("SELECT * FROM category;");
                            $getCategory -> execute();
                            while($row = $getCategory->fetch(PDO::FETCH_ASSOC))
                            {
                        ?>
                        <li><a href="./viewCatQuestions.php?cat_id=<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></a></li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>