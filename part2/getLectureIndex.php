<?php
	include "connectDB.php";
	session_start();

	include "loadFiles.php";


	// $quiz = simplexml_load_file($quizSource);

	$general = $lectureXML->general;
	$courseID = $general->courseID;
	$courseName = $general->courseName;

	foreach ($lectureXML->chapter as $chapter) {
		$chapterNumber = $chapter->chapterNumber;
		$chapterTopic = $chapter->chapterTopic;
		
		echo "<option value = '$chapterNumber'>$chapterNumber $chapterTopic</option>";
	}

	mysqli_close($con);

?>