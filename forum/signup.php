<?php
session_start();
if(!isset($_SESSION['type']) && !isset($_SESSION['name']) && !isset($_SESSION['username']))
{}
else
{
    header("Location: ./index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" type="text/css" href="include/style.css">
    </head>
    <body>
        <div id="container">
            <div id="head">
                <div id="logo"><img src="images/logo.png" /></div>
	        <?php
                    require './include/navbar.php';
                ?>
            </div>
            <div id="body">
                <form action="processSignup.php" method="POST" class="signin">
            <table align="center"> 
                <tr>
                    <td colspan="2">
                        <div style="color: red;">
                            <?php
                                if(isset($_GET['error']))
                                {
                                    print $_GET['error'];
                                }
                            ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td align="left"><label for="name">Name*</label></td>
                    <td>
                        <input type="text" name="name" id="name" class="data" required="required" autofocus="true" /><br>
                    </td>
                </tr>
                <tr>
                    <td align="left"><label for="username">Username*</label></td>
                    <td>
                        <input type="text" name="username" id="username" required="required" class="data" /><br>
                    </td>
                </tr>
                <tr>
                    <td align="left"><label for="passowrd">Password*</label></td>
                    <td>
                        <input type="password" name="password" id="password" required="required"  class="data"/><br>
                    </td>
                </tr>
                <tr>
                    <td align="left"><label for="confPass">Confirm Password*</label></td>
                    <td>
                        <input type="password" name="confPass" id="confPass" required="required" class="data" /><br>
                    </td>
                </tr>
                <tr>
                    <td align="left"><label for="email">EMail*</label></td>
                    <td>
                        <input type="email" name="email" id="email" required="required" class="data" /><br>
                    </td>
                </tr>
                <tr>
                    <td align="left">Specialization(if any)</td>
                    <td>
                        <select id="category" name="category" class="data">
                            <option value="no">Nil</option>
                            <?php
                                require './include/config.php';
                                $listCategories = $link -> prepare("SELECT * FROM category;");
                                $listCategories -> execute();
                                $result = $listCategories -> fetchAll(PDO::FETCH_ASSOC);
                                foreach ($result as $info)
                                {
                                    ?>
                            <option value="<?php echo $info['cat_id'];?>" class="data"><?php echo $info['cat_name'];?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="left"><label for="captcha">Enter the Number*</label><img src="captcha.php" /></td>
                    <td>
                        <input type="text" name="captcha" id="captcha" required="required" class="data" /><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Register" id="register" class="submit"/></td>
                </tr>
            </table>
        </form>
            </div>
            <?php
                require './include/footer.php';
            ?>
        </div>
    </body>
</html>