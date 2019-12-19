<!DOCTYPE html>
<html>
<head>
	<title>News Platform</title>
	<link rel="stylesheet" href="styles/style.css" media="all"/>
</head>
<body>
	<div class="container">
		<div class="head">
				<img id="logo" src="images/logo.png"/>
				<img id="banner" src="images/ad_banner.gif"/>

		
	</div>

		<div class="navbar">
				<ul id="menu">
					<?php
						include("config.php");
						
						$db=getDatabase();

						$sql="select * from category";

						$run_q=$db->executeQuery($sql);

						while($row_cat=$db->fetchArray($run_q)){

							$cat_id=$row_cat['cat_id'];

							$cat_title=$row_cat['cat_title'];

							echo"<li><a href='index.php?cat_id=$cat_id'>$cat_title</a></li>";

						}


					?>


				</ul>

				<div id="form">
					<form method="get" action="results.php" enctype="multipart/form-data">
						<input type="text" name="search_query"/>
						<input type="submit" name="submit" value="Search"/>
						

					</form>


				</div>
	</div>

		<div class="post_area">

<?php
		$get_post="select * from posts order by rand() limit 0,5";

		?>
	
	</div>

		<div class="sidebar">

		This is sidebar
	
	</div>

		<div class="footer">

		This is footer
	</div>


	</div>

</body>
</html>