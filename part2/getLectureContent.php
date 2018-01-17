<?php
	include "connectDB.php";
	session_start();

	include "loadFiles.php";

	$index = $_REQUEST['index'];

	$general = $lectureXML->general;
	$courseID = $general->courseID;
	$courseName = $general->courseName;

	$index = (int)$index;
	$chapter = $lectureXML->chapter;
	$presentChapter = $chapter[$index];

	$chapterNumber = $presentChapter->chapterNumber;
	$chapterTopic = $presentChapter->chapterTopic;

	echo "<h3>Chapter $chapterNumber $chapterTopic";

	foreach ($presentChapter->topics as $t) {
		$topic = $t->topic;
		// $paragraph = $t->paragraph;

		echo "<h4>$topic</h4>";
		foreach ($t->paragraph as $p) {
			echo "<p>$p</p>";
		}
	}

	mysqli_close($con);

?>