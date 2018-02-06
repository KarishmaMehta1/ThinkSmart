<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Think Smart | Blog</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-georgia.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="menu_nav">
        <ul>
          <li><a href="index.php"><span>Home Page</span></a></li>
          <li><a href="#"><span>Forum</span></a></li>
          <li><a href="#"><span>About Us</span></a></li>
          <li><a href="#"><span>Contact Us</span></a></li>
<li style="margin-left: 4em;"><a href="signin.php">Sign In</a></li>
                        
        </ul>
      </div>
      <div class="logo">
        <h1><a href="index.php"><img src="../img/logo.png" height=80 width=200/></a></h1>
      </div>
      <div class="clr"></div>
     
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
     
      <?php
	  	
		require '../include/config.php';
		$viewPosts = $link -> prepare("SELECT * FROM blog_posts where cat_id='$_GET[id]' ORDER BY datetime DESC;");
		$viewPosts -> execute();
		while($result = $viewPosts->fetch(PDO::FETCH_ASSOC))
		{
			?>
            
            <div class="article">
	          <h2><a href="./viewPost.php?post_id=<?php print $result['post_id']; ?>"><?php print $result['post_title']; ?></a></h2>
    	      <div class="clr"></div>
        		  <p><?php print $result['post']; ?></p>
		          <p>Tagged: <a href="#">
                  <?php
				  	$getcategory=$link->prepare("select * from category where cat_id='$result[cat_id]';");
					$getcategory->execute();
					$res=$getcategory->fetch(PDO::FETCH_ASSOC);
					echo $res['cat_name'];
		?>
				  
                  
          			<p><a href="#"><strong>Comments (<?php echo $result['comments'];?>)</strong></a> <span>&nbsp;&bull;&nbsp;</span> <?php print $result['datetime']; ?></p>
        	</div>
            
            <?php
		}
		
	  ?>
      </div>
      <div class="sidebar">
        
        <div class="gadget">
          <h2 class="star"><span>Category</span></h2>
          <div class="clr"></div>
<?php
                  require 'include/config.php';
		$getcat=$link->prepare("select * from category;");
                $getcat->execute();
               while($getc=$getcat->fetch(PDO::FETCH_ASSOC))
                {
?>
<a href="getcat.php?id=<?php echo $getc['cat_id'];?>"><?php print $getc['cat_name'];?></a><br>
<?php

}


?>
            
        </div>
  
      </div>
      <div class="clr"></div>
    </div>
  </div>
<?php
	require 'include/footer.php';
?>
</div>
</body>
</html>
