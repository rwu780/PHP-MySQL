<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>COMP466 Assignment2</title>
	<link rel="stylesheet" type="text/css" href="../shared/share.css">
	<script type="text/javascript">
		window.onload = getCourseNumber;
		function getCourseNumber() {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					document.getElementById("selectCourse").innerHTML = this.responseText;
				}
			}
			xmlhttp.open("GET", "selectCourse.php?", true);
			xmlhttp.send();
		}
	</script>
</head>
<body>
	<header class="header">Online Learning System</header>
	<nav class = "sideMenu">
		<ul>
			<li><a href="../tma2.htm">TMA2 Cover Page</a></li>
			<li><a href="main.php">Main</a></li>
		</ul>
	</nav>

	<div class="content">
		<h1>Welcome Users</h1>
		<form action="course.php" method="POST">
			<p>
				This is a online learning system. You can scroll through a list of available course below.

				This application contain two parts: the lecture and the quiz. Once you selected your course, you will direct to a welcome page, where you can see a list of available chapters and quizs.
				
				Please select a course number of continue
			</p>

			<select id="selectCourse" name = "course">
				
			</select>
			<input type="submit" name="submit" value="Continue" />
		</form>
	</div>

	<div class="footer">COMP466 Assignment2</div>

</body>
</html>