<!DOCTYPE html>
<html>
    <head>
        <link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript">
            function func()
            {
                var x = prompt("Enter Password");
                if(x != "password")
                {
                    window.location.assign("../");
                }
            }
        </script>
    </head>
    <body onload="func()">
        <div id="container">
            <div id="head">
                <div id="logo"><img src="logo.png" /></div>
            </div>
            <div id="body">
                <br>
                <div id="wc"><h1 align="center">Welcome to Admin Panel</h1></div>
                <div id="links">
                    <table align="center" cellspacing="45">
                        <tr>
                            <td><a href="forum/"><img src="forum.jpg" /></a></td>
                            <td><a href="blog/"><img src="blog.jpg" /></a></td>
                        </tr>
                        <tr align="center">
                            <td><a href="forum/">Forum</a></td>
                            <td><a href="blog/">Blog</a></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div id="footer">
                Copyrights &copy; <?php echo date("Y"); ?> Think Smart Inc.
            </div>
        </div>
    </body>
</html>