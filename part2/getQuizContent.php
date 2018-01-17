<?php
	include "connectDB.php";
	session_start();

	include "loadFiles.php";

	$index = $_REQUEST['index'];

	$general = $quizXML->general;
	$courseID = $general->courseID;
	$courseName = $general->courseName;

	$index = (int)$index;
	$chapter = $quizXML->chapter;
	$quizs = $chapter[$index]->quiz;

	$i = 1;
	foreach ($quizs->questions as $q) {
		$question = $q->question;

		echo "<h3>Question $i: $question</h3>";

		$temp = 1;
		foreach ($q->option as $option) {
			echo "<input type = 'radio' name='option".$i."' value = '$temp'>";
			echo "<label>$option</label>";
			echo "<br>";
			$temp += 1;
		}
		$i += 1;
	}

	$i = 1;
	foreach ($quizs->questions as $q) {
		$answer = $q->answer;
		echo "<p>$i: $answer</p>";
		$i += 1;
	}

	mysqli_close($con);

?>