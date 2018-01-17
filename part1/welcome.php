<?php
	session_start();
	if(!isset($_SESSION['userName']) || empty($_SESSION['userName'])){
		header("location:login.php");
		exit;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>COMP466 Assignment2</title>
	<link rel="stylesheet" type="text/css" href="../shared/share.css">
	<script type="text/javascript" src = "welcome.js"></script>
	<script type="text/javascript">

		function deleteURLs(){

			var urls = document.getElementsByName("urls");
			var selected = [];

			for (var i = 0; i < urls.length; i++) {
				if(urls[i].checked == true){
					selected.push(urls[i].value);
				}
			}

			var values = JSON.stringify(selected);
			// alert(values);

			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					getURL();
				}
			}
			xmlhttp.open("GET", "deleteURL.php?old=" + values, true);
			xmlhttp.send();
		}
	</script>
</head>
<body onload="getURL()">
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
		<h1>Welcome <?php echo $_SESSION['userName']. " " . $_SESSION['userID']; ?></h1>
	</div>

	<div class="content">
		<p>To add, edit and delete your bookmarks, use the buttons below.</p>
		<p>To add or edit a bookmark, new bookmark must be active. And they can only be add/edit one at a time</p>
		<p id = "displayURL">
			<input type="checkbox" name="urls" value="">
		</p>

	</div>
	<div class="content">

		<p>
			Please enter a URL you want to add or edit<br>
		</p>

		
		<p>
			<button onclick="addURL()">Add</button>
			<button onclick="editURL()">Edit</button>
			<button onclick="deleteURLs()">Delete</button>
		</p>
	</div>
	<div class="content">
		<p><a href="logout.php">Sign Out</a></p>
	</div>

</body>
</html>