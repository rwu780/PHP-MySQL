<?php
	include "connectDB.php";
	session_start();

	$courseID = $_SESSION['course'];

	$sql = "SELECT description, detailDescription FROM courseInfo WHERE name = '$courseID'";

	$result = mysqli_query($con, $sql);

	if(mysqli_num_rows($result) == 0){
		die("Unable to load course<br>");
	}

	if(mysqli_num_rows($result) > 0){
		$row = $result->fetch_assoc();
		$description = $row['description'];
		$detailDescription = $row['detailDescription'];

		echo "<h3>$description</h3>";
		echo "<p>$detailDescription</p>";
	}

	mysqli_close($con);

?>