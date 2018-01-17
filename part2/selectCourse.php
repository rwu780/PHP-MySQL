<?php 
	include "connectDB.php";
	session_start();

	$sql = "SELECT name, description FROM courseInfo";

	$result = mysqli_query($con, $sql);

	if(mysqli_num_rows($result) == 0){
		die("Unable to load course<br>");
	}

	if(mysqli_num_rows($result) > 0){
		while($row = $result->fetch_assoc()){
			$courseName = $row['name'];
			$description = $row['description'];

			$combined = $courseName." ".$description;

			echo "<option value = '$courseName'>$combined</option>";
		};
	}

	mysqli_close($con);
 ?>