<?php
	session_start();

	$courseID = $_POST['course'];
	$_SESSION['course'] = $courseID;
	include "getCourseFile.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>COMP466 Assignment2</title>
	<link rel="stylesheet" type="text/css" href="../shared/share.css">
	<script type="text/javascript">
		window.onload = function(){
			getCourseContent();
			showQuiz();
			showLecture();
		}
		function getCourseContent() {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					document.getElementById("courseContent").innerHTML = this.responseText;
				}
			}
			xmlhttp.open("GET", "getCourseContent.php?", true);
			xmlhttp.send();
		}

		function showQuiz(){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					document.getElementById("quizSelect").innerHTML = this.responseText;
				}
			}
			xmlhttp.open("GET", "getQuizIndex.php?", true);
			xmlhttp.send();
		}

		function showLecture(){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					document.getElementById("lectureSelect").innerHTML = this.responseText;
				}
			}
			xmlhttp.open("GET", "getLectureIndex.php?", true);
			xmlhttp.send();
		}

		function showQuizContent(){
			var selected = document.getElementById('quizSelect').selectedIndex;

			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					document.getElementById("quizContent").innerHTML = this.responseText;
					document.getElementById("quizContent").style.display = "block";

					document.getElementById("lectureContent").style.display = "none";
					document.getElementById("lectureContent").innerHTML = "";
				}
			}
			xmlhttp.open("GET", "getQuizContent.php?index=" + selected, true);
			xmlhttp.send();
		}

		function showLectureContent(){
			var selected = document.getElementById('lectureSelect').selectedIndex;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					document.getElementById("lectureContent").style.display = "block";
					document.getElementById("lectureContent").innerHTML = this.responseText;
					document.getElementById("quizContent").style.display = "none";
					document.getElementById("quizContent").innerHTML = "";

					
				}
			}
			xmlhttp.open("GET", "getLectureContent.php?index=" + selected, true);
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
		<h1>Welcome to <?php echo "$courseID"; ?>;</h1>

	</div>

	<div class="content">
		<p id = "courseContent"></p>

		<select id = "lectureSelect">
			<option></option>
		</select>

		<button onclick="showLectureContent()">Retrieve Lecture</button>

		<br>
		<select id = "quizSelect" name = "selectQuiz">
			<option></option>
		</select>
		


		<button onclick="showQuizContent()">Retrieve Quiz</button>
	</div>

	<div class = "content" id = "quizContent"></div>

	<div class="content" id = "lectureContent"></div>

	<div class="content"><a href="logout.php">Exit</a></div>

	<div class="footer">COMP466 Assignment2</div>

</body>
</html>









