<?php
	include "connectDB.php";

	if(isset($_POST['submit'])){

		$userName = $_POST["username"];
		$password = $_POST["password"];

		$sql = "SELECT userID FROM userInfo WHERE userName = '$userName' AND password = '$password'";
		
		$result = mysqli_query($con, $sql);

		if(mysqli_num_rows($result) == 0){
			echo "<div class = 'content'>";
			echo "User do not exist, or you enter a wrong username/password <br>";
		    echo "<a href = 'register.html'>Register</a></div></body></html>";	
		    echo "</div>";
		}

		if(mysqli_num_rows($result) > 0){
			$row = $result->fetch_assoc();
			echo "User Exists";
			session_start();
			$_SESSION['userName'] = $userName;
			header("location: welcome.php");
		}
		mysqli_close($con);
	}
?>
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
		<h1>Sign In</h1>
		<p>Please fill in all fields and click Sign In</p>
	</div>

	<div class="content">
		<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
			<div>
				<label class="label">Username:</label>
				<input class = "textField" maxlength="10" type = "text" name = "username">
			</div>

			<div>
				<label class="label">Password:</label>
				<input class = "textField" maxlength="10" type="password" name="password">
			</div>
			
			<div>
				<input type="reset" class = "button" name="reset" value = "Reset">
				<input type="submit" class = "button" name="submit" value = "Sign-In">
			</div>
		</form>
	</div>

	<div class="footer">COMP466 Assignment2</div>


</body>
</html>