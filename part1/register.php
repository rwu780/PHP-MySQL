<?php
	include "connectDB.php";

	if(isset($_POST['submit'])){

		$userName = trim($_POST["username"]);
		if($userName == ''){
			echo "<div class = 'content'>";
			echo "You did not enter anything<br>";
		    echo "</div>";
		    exit;
			
		}

		$sql = "SELECT userID FROM userInfo WHERE userName = '$userName'";
		$result = mysqli_query($con, $sql);

		if(mysqli_num_rows($result) > 0){
			echo "<div class = 'content'>";
			echo "Sorry, username already exists, click to retry<br>";
			echo "<a href = 'register.html'>Register</a>";
			echo "</div>";
			exit;
		}
		else{
			$password = trim($_POST["password"]);
			if($password == ''){
				echo "<div class = 'content'>";
				echo "You did not enter anything<br>";
			    echo "</div>";
			    exit;
			}

			$sql = "INSERT INTO userInfo (userName, password) VALUES('$userName','$password')";

			if (mysqli_query($con, $sql)) {
			    echo "New record created successfully";
			    session_start();
			    $_SESSION['userName'] = $userName;
			    header("location: welcome.php");

			} else {
				echo "<div class = 'content'>";
			    echo "Sorry, unknown error occurs, please try again <br>";
			    echo "<a href = 'register.html'>Register</a>";
			    echo "</div>";
			    exit;
			}
		}
		$con->close();
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
		<h1>Register</h1>
		<p>Please fill in all fields and click Register</p>
	</div>

	<div class = "content">
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
				<input type="submit" class = "button" name="submit" value = "Register">
			</div>
		</form>
	</div>

	<div class="footer">COMP466 Assignment2</div>

</body>
</html>