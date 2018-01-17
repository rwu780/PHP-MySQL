<?php
	include "connectDB.php";
	session_start();

	$courseID = $_SESSION['course'];
	$_SESSION['lectureSource'] = '';
	$_SESSION['quizSource'] = '';

	$sql = "SELECT source FROM lectureInfo WHERE courseName = '$courseID'";
	
	$result = mysqli_query($con, $sql);

	if(mysqli_num_rows($result) == 0){
		die("Unable to load course<br>");
	}
	else{
		$row = $result->fetch_assoc();
		$source = $row['source'];
		$_SESSION['lectureSource'] = $source;
	}

	$sql = "SELECT source FROM quizInfo WHERE courseName = '$courseID'";
	$result = mysqli_query($con, $sql);

	if(mysqli_num_rows($result) == 0){
		die("Unable to load course<br>");
	}
	else{
		$row = $result->fetch_assoc();
		$source = $row['source'];
		$_SESSION['quizSource'] = $source;
	}

	mysqli_close($con);

?>