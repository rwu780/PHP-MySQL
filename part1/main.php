<!DOCTYPE html>
<html>
<head>
	<title>COMP466 Assignment2</title>
	<link rel="stylesheet" type="text/css" href="../shared/share.css">
</head>
<body>
	<header class="header">Bookmarking Web</header>
	<nav class = "sideMenu">
		<ul>
			<li><a href="../tma2.htm">TMA2 Cover Page</a></li>
			<li><a href="main.php">Main</a></li>
			<li><a href="signIn.php">Sign In</a></li>
			<li><a href="register.php">Register</a></li>
		</ul>
	</nav>

	<div class="content">
		<h1>Welcome Users</h1>
		<p>
			This is a bookmarking web application that can store your faviorate bookmarks.
		</p>
		<p>
			If you are already with us, sign in at the left menu bar and continue managing your book marks
		</p>
		<p>
			If you are new to this web, register at the left menu bar and start managing your bookmarks with us
		</p>
	</div>

	<div class="content">
		<h2>Most popular bookmarks</h2>
		<?php
			$con = mysqli_connect("sql208.epizy.com", "epiz_21387788", "O86pnzZO8x9L", "epiz_21387788_bookmarkingDB");

			//Check connection
			if(mysqli_connect_errno()){
				echo "Could not connect to MySQL: " .mysqli_connect_error();
			}


			$sql = "SELECT DISTINCT url FROM URL GROUP BY url ORDER BY count(url) DESC LIMIT 10";

			$result = mysqli_query($con, $sql);

			if(mysqli_num_rows($result)){
				while($row = mysqli_fetch_assoc($result)){
					$u = $row["url"];
					$format = "<li><a href = '%s'>%s</a></li>";
					echo sprintf($format, $u, $u);
				}
			}
			else{
				echo "0 Results";
			}

			mysql_close($con);
		?>
	</div>

	<div class="footer">COMP466 Assignment2</div>

</body>
</html>