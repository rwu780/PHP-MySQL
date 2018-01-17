<?php
	session_start();
	include "connectDB.php";
	include "loadFiles.php";

	$general = $quizXML->general;
	$courseID = $general->courseID;
	$courseName = $general->courseName;


	foreach ($quizXML->chapter as $chapter) {
		$chapterNumber = $chapter->chapterNumber;
		$chapterTopic = $chapter->chapterTopic;
		
		echo "<option value = '$chapterNumber'>$chapterNumber $chapterTopic</option>";
	}

?>